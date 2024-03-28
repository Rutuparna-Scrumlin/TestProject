<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //if super admin for hospital admin restrict it
         
            // if(Auth::User()->role == "1"){
            //     $hospitals = Hospital::where('status', '!=' , 'Deleted')->pluck('name','id');
                //$departments = Department::where('status', '!=' , 'Deleted')->pluck('name','id');
                $subjects = Subject::where('status', '!=' , 'Deleted')->get();
                return view('backend.subject', compact('subjects'));
               
            // }else{
            //     $chambers = Chamber::where("hospital_id", "=", Auth::User()->hospital_id )->where('status', '!=' , 'Deleted')->get();
            //     $hospitals = Hospital::where("id", "=", Auth::User()->hospital_id)->pluck('name','id');
            //     //$departments = Department::where("id", "=", Auth::User()->hospital_id)->where('status', '!=' , 'Deleted')->pluck('name','id');
            //     return view('backend.chambers', compact('chambers', 'hospitals'));
                
    
            // }
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
            $existingCode = Subject::where('status', '!=' , 'Deleted')->where('sub_code', ($request->sub_code))
            -> where('sub_name', $request->sub_name)->first();

            if($existingCode){
                return response()->json(['status' => false, 'message' => "ERROR!! Subject Name Or Code already exist"]);
            }
            $save = Subject::create([
                'sub_name' => $request->sub_name,
                'sub_code' => $request->sub_code,
                'description' => $request->description,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => null,
                'created_by' => 1, 
                'updated_by' => 1,
                'status'      => $request->status
            ]);
            if($save){
                return response()->json(['status' => true, 'message' => 'Subject saved Successfully']);
            }else{
                return response()->json(['status' => false, 'message' => "Subject cound not be created"]);
            }
        }
        if ($request->mode == "edit") {
            $existingUser = Subject::where(function ($query) use ($request) {
                $query->where('status', '!=', 'Deleted')
                    ->where(function ($q) use ($request) {
                        $q->where('sub_name', $request->sub_name)
                            ->orWhere('sub_code', $request->sub_code);         
                    });
                })->get();
        
            if ($existingUser->isNotEmpty()) {
                foreach ($existingUser as $ex) {
                    if ($request->recordid != $ex->id) {
                        return response()->json(['status' => false, 'message' => "ERROR!! Subject Name Or Code already exist"]);
                    }
                }
            }
                    // Both name and code are new, update both
                    $updatecategory = Subject::where('id', $request->recordid)->update([
                        'sub_name' => $request->sub_name,
                        'sub_code' => $request->sub_code,
                        'description' => $request->description,
                        'created_at'  => date('Y-m-d H:i:s'),
                        'updated_at'  => null,
                        'created_by' => 1, 
                        'updated_by' => 1,
                        'status'      => $request->status
                    ]);
                    return response()->json(["Status"=>true,"message"=>"Subject Master Updated Successfully"]);
                }
        }
     

    // /**
    //  * get data for editing
    //  */
    public function getData(string $id)
    {
        $subject = Subject::where('id', $id)->first();
        return response()->json([$subject]);
    }

    /**
     * delete data
     */
    public function deleteData(string $id)
    {
        $save = Subject::where('id',$id)
            ->update([
                'updated_at'  => date('Y-m-d H:i:s'),
                'status'      => 'Deleted'
            ]);

            if($save){
                return response()->json([
                    'status' => true,
                    'message' => 'Subject deleted',
                ]);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => "Subject could not be deleted.",
                ]);
            }
    }

    
    
    

}
