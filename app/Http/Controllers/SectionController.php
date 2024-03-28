<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Section;

class SectionController extends Controller
{
    
    public function index()
    { 
        $sections = Section::where('status', '!=' , 'Deleted')->get();
        //print_r($roles);exit;
        return view('backend.section', compact('sections'));
    }

    public function saveData(Request $request)
    {
        $valid = Validator::make($request->all(),[
            // 'name' => 'required|max:50',
        ]);
        if($valid->fails()){
            return response()->json(['status' => false, 'message' => $valid->errors()->all()]);
        }
        if($request->mode == "add"){
            $existingSectionName = Section::where('status', '!=' , 'Deleted')->where('sec_name', ($request->sec_name))->first();

            if($existingSectionName){
                return response()->json(['status' => false, 'message' => "ERROR!! Section Name already exists"]);
            }
            $save = Section::create([
                'sec_name' => $request->sec_name,
                'status'      => $request->status
            ]);
            if($save){
                return response()->json(['status' => true, 'message' => 'Section saved Successfully']);
            }else{
                return response()->json(['status' => false, 'message' => "Section cound not be created"]);
            }
         }
         if ($request->mode == "edit") {
            $existingSectionName = Section::where(function ($query) use ($request) {
                $query->where('status', '!=', 'Deleted')
                    ->where(function ($q) use ($request) {
                        $q->where('sec_name', $request->sec_name);       
                    });
                })->get();
        
            if ($existingSectionName->isNotEmpty()) {
                foreach ($existingSectionName as $ex) {
                    if ($request->recordid != $ex->sec_id) {
                        return response()->json(['status' => false, 'message' => "ERROR!! Section Name already exists"]);
                    }
                }
            }
                // Both name and code are new, update both
                $save = Section::where('sec_id',$request->recordid)->update([
                    'sec_name' => $request->sec_name,
                    'status'      => $request->status
                ]);
                return response()->json(["status"=>true,"message"=>"Section saved Successfully"]);

             }
        }
     

    // /**
    //  * get data for editing
    //  */
    public function getData(string $id)
    {
        $sections = Section::where('sec_id', $id)->first();
        return response()->json([$sections]);
    }

    /**
     * delete data
     */
    public function deleteData(string $id)
    {
        $save = Section::where('sec_id',$id)
            ->update([
                'updated_at'  => date('Y-m-d H:i:s'),
                'status'      => 'Deleted'
            ]);

            if($save){
                return response()->json([
                    'status' => true,
                    'message' => 'Section deleted',
                ]);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => "Section could not be deleted.",
                ]);
            }
    }

    
    
    

}
