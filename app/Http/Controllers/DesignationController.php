<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Designation;

class DesignationController extends Controller
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
                $designations = Designation::where('status', '!=' , 'Deleted')->get();
                return view('backend.designation', compact('designations'));
               
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
                $existingDegName = Designation::where('status', '!=' , 'Deleted')->where('deg_name', ($request->deg_name))->first();
    
                if($existingDegName){
                    return response()->json(['status' => false, 'message' => "ERROR!! Designation Name already exists"]);
                }
            $save = Designation::create([
                'deg_name' => $request->deg_name,
                'description' => $request->description,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => null,
                'created_by' => 1, 
                'updated_by' => 1,
                'status'      => $request->status
            ]);
            if($save){
                return response()->json(['status' => true, 'message' => 'Designation saved Successfully']);
            }else{
                return response()->json(['status' => false, 'message' => "Designation cound not be created"]);
            }
        }
        if ($request->mode == "edit") {
            $existingUser = Designation::where(function ($query) use ($request) {
                $query->where('status', '!=', 'Deleted')
                    ->where(function ($q) use ($request) {
                        $q->where('deg_name', $request->deg_name);       
                    });
                })->get();
        
            if ($existingUser->isNotEmpty()) {
                foreach ($existingUser as $ex) {
                    if ($request->recordid != $ex->id) {
                        return response()->json(['status' => false, 'message' => "ERROR!! Designation Name already exists"]);
                    }
                }
            }
                // Both name and code are new, update both
                $save = Designation::where('id',$request->recordid)->update([
                    'deg_name' => $request->deg_name,
                    'description' => $request->description,
                    'created_at'  => date('Y-m-d H:i:s'),
                    'updated_at'  => null,
                    'created_by' => 1, 
                    'updated_by' => 1,
                    'status'      => $request->status
                ]);
                return response()->json(["status"=>true,"message"=>"Designation saved Successfully"]);

            // if($save){
            //     return response()->json(['status' => true, 'message' => 'Classroom saved Successfully']);
            // }else{
            //     return response()->json(['status' => false, 'message' => "Error saving data" ]);
             }
        }
     

    // /**
    //  * get data for editing
    //  */
    public function getData(string $id)
    {
        $designations = Designation::where('id', $id)->first();
        return response()->json([$designations]);
    }

    /**
     * delete data
     */
    public function deleteData(string $id)
    {
        $save = Designation::where('id',$id)
            ->update([
                'updated_at'  => date('Y-m-d H:i:s'),
                'status'      => 'Deleted'
            ]);

            if($save){
                return response()->json([
                    'status' => true,
                    'message' => 'Designation deleted',
                ]);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => "Designation could not be deleted.",
                ]);
            }
    }

    
    
    

}
