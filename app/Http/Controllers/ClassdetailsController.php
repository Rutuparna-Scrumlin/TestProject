<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\Staff;
use App\Models\Classdetails;


class ClassdetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //if super admin for hospital admin restrict it
         
            // if(Auth::User()->role == "1"){
                $classrooms = Classroom::where('status', '!=' , 'Deleted')->pluck('room_name','clsrm_id');
                $classdetails = Classdetails::where('status', '!=' , 'Deleted')->get();
                // print_r($classdetails);exit;
                $staffs = Staff::where('status', '!=' , 'Deleted')->where('status', '!=' , 'Inactive') ->where('deg_name', 7)->pluck('name', 'id');
                //print_r($users);exit;
                return view('backend.classdetails', compact('classdetails','classrooms','staffs'));
                // print_r($teachers);exit;
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
            $existingClass = Classdetails::where('status', '!=' , 'Deleted')->where('room_name', $request->room_name)->first();

            if($existingClass){
                return response()->json(['status' => false, 'message' => "ERROR!! Class Name Or Room already exist"]);
            }
            $save = Classdetails::create([
                'cls_name' => $request->cls_name,
                'section' => $request->section,
                'room_name' => $request->room_name,
                'cls_teacher' =>$request->cls_teacher,
                'acc_yr' => $request->acc_yr,
                'strength' => $request->strength,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => null,
                'created_by' => 1, 
                'updated_by' => 1,
                'status'      => $request->status
            ]);
            if($save){
                return response()->json(['status' => true, 'message' => 'Classdetails saved Successfully']);
            }else{
                return response()->json(['status' => false, 'message' => "Classdetails cound not be created"]);
            }
        }
        if ($request->mode == "edit") {
            $existingUser = Classdetails::where(function ($query) use ($request) {
                $query->where('status', '!=', 'Deleted')
                    ->where(function ($q) use ($request) {
                        $q->Where('room_name', $request->room_name);         
                    });
                })->get();
        
            if ($existingUser->isNotEmpty()) {
                foreach ($existingUser as $ex) {
                    if ($request->recordid != $ex->id) {
                        return response()->json(['status' => false, 'message' => "ERROR!! Class Name Or Room already exist"]);
                    }
                }
            }
                // Both name and code are new, update both
                $updateclass = Classdetails::where('id', $request->recordid)->update([
                'cls_name' => $request->cls_name,
                'section' => $request->section,
                'room_name' => $request->room_name,
                'cls_teacher' =>$request->cls_teacher,
                'acc_yr' => $request->acc_yr,
                'strength' => $request->strength,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => null,
                'created_by' => 1, 
                'updated_by' => 1,
                'status'      => $request->status
                ]);
                return response()->json(["Status"=>true,"message"=>"Class Master Updated Successfully"]);
            }
        }

    // // /**
    // //  * get data for editing
    // //  */
    public function getData(string $id)
    {
        $classdetails = Classdetails::where('id', $id)->first();
        return response()->json([$classdetails]);
    }

    // /**
    //  * delete data
    //  */
    public function deleteData(string $id)
    {
        $save = Classdetails::where('id',$id)->delete();
            // ->update([
            //     'updated_at'  => date('Y-m-d H:i:s'),
            //     'status'      => 'Deleted'
            // ]);

            if($save){
                return response()->json([
                    'status' => true,
                    'message' => 'Classdetails deleted',
                ]);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => "Classdetails could not be deleted.",
                ]);
            }
    }

    // public function filter(Request $request)
    // {
    //     $hospitalInput = $request->hospital;
    //     $departmentIds = Hospital::where('id', '=', $hospitalInput)->where('status', '!=', 'Deleted')->pluck('department_ids')->first();
    
    //     if (!$departmentIds) {
    //         return response()->json(['message' => 'No departments found for the given hospital.']);
    //     }
    
    //     $departmentIdsArray = explode(',', $departmentIds);
    
    //     $departmentNames = Department::whereIn('id', $departmentIdsArray)->where('status', '!=', 'Deleted')->pluck('name','id');
      
    //     return response()->json(['departmentNames' => $departmentNames]);
    // }
    
    

}
