<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Classroom;

class ClassroomController extends Controller
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
                $classrooms = Classroom::where('status', '!=' , 'Deleted')->get();
                //print_r($roles);exit;
                return view('backend.classroom', compact('classrooms'));
               
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
            $existingRoomname = Classroom::where('status', '!=' , 'Deleted')->where('room_name', ($request->room_name))->first();

            if($existingRoomname){
                return response()->json(['status' => false, 'message' => "ERROR!! Roomname already exists"]);
            }
            $save = Classroom::create([
                'floor_no' => $request->floor_no,
                'room_name' => $request->room_name,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => null,
                'created_by' => 1, 
                'updated_by' => 1,
                'status'      => $request->status
            ]);
            if($save){
                return response()->json(['status' => true, 'message' => 'Classroom saved Successfully']);
            }else{
                return response()->json(['status' => false, 'message' => "Classroom cound not be created"]);
            }
         }
         if ($request->mode == "edit") {
            $existingUser = Classroom::where(function ($query) use ($request) {
                $query->where('status', '!=', 'Deleted')
                    ->where(function ($q) use ($request) {
                        $q->where('room_name', $request->room_name);       
                    });
                })->get();
        
            if ($existingUser->isNotEmpty()) {
                foreach ($existingUser as $ex) {
                    if ($request->recordid != $ex->clsrm_id) {
                        return response()->json(['status' => false, 'message' => "ERROR!! Roomname already exists"]);
                    }
                }
            }
                // Both name and code are new, update both
                $save = Classroom::where('clsrm_id',$request->recordid)->update([
                'floor_no' => $request->floor_no,
                'room_name' => $request->room_name,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => null,
                'created_by' => 1, 
                'updated_by' => 1,
                'status'      => $request->status
                ]);
                return response()->json(["status"=>true,"message"=>"Classroom saved Successfully"]);

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
        $classrooms = Classroom::where('clsrm_id', $id)->first();
        return response()->json([$classrooms]);
    }

    /**
     * delete data
     */
    public function deleteData(string $id)
    {
        $save = Classroom::where('clsrm_id',$id)
            ->update([
                'updated_at'  => date('Y-m-d H:i:s'),
                'status'      => 'Deleted'
            ]);

            if($save){
                return response()->json([
                    'status' => true,
                    'message' => 'Classroom deleted',
                ]);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => "Classroom could not be deleted.",
                ]);
            }
    }

    
    
    

}
