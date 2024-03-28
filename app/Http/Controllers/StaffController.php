<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\User;
use App\Models\Role;
use App\Models\Designation;


class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //if super admin for hospital admin restrict it
         
            // if(Auth::User()->role == "1"){
                
                $roles = Role ::where('status', '!=' , 'Deleted')->where('status', '!=' , 'Inactive')->pluck('role_name','role_id');
                $designations = Designation::where('status', '!=' , 'Deleted')->where('status', '!=' , 'Inactive')->pluck('deg_name','id');
                
                $staffs = Staff::where('status', '!=' , 'Deleted')->get();
                //print_r($staffs);exit;
                return view('backend.staff', compact('staffs','roles','designations'));
                
    }

    public function getEmployeeid()
    {

        $lastEmployee = Staff::latest('emp_id')->first();
        $lastId = $lastEmployee ? $lastEmployee->emp_id : 'EMP000';
        $nextId = str_pad(substr($lastId, 3) + 1, 3, '0', STR_PAD_LEFT);
        $newId = 'EMP' . $nextId;
        while (Staff::where('emp_id', $newId)->exists()) {
            $nextId = str_pad(substr($newId, 3) + 1, 3, '0', STR_PAD_LEFT);
            $newId = 'EMP' . $nextId;
        }

        return $newId;
    }

    public function saveData(Request $request)
    {   
        if ($request->emp_id != ''){
            $request->emp_id = $newId;
        }else{
            $newId = $this->getEmployeeid();
        }
        $newId = $this->getEmployeeid();
         // Call the getEmployeeid() function to get $newId
        $valid = Validator::make($request->all(),[
            //'name' => 'required|max:50',
        ]);
        if($valid->fails()){
            return response()->json(['status' => false, 'message' => $valid->errors()->all()]);
        }
        if($request->mode == "add"){
            $existingUser = Staff::where('status', '!=' , 'Deleted')
            -> where('email', $request->email)
            -> where('adhar_no', $request->adhar_no)
            -> where('pan_no', $request->pan_no)
            -> where('uan_no', $request->uan_no)->first();

            
            if($existingUser){
                return response()->json(['status' => false, 'message' => "ERROR!! User Name Or Email or Adhar or Pan or UAN already exist"]);
            }
            

            $save = Staff::create([
                'emp_id'=>$newId,
                'name' => $request->name,
                'email' => $request->email,
                'phone_no' => $request->phone_no,
                'gender' =>$request->gender,
                'dob' =>$request->dob, 
                'qualification' =>$request->qualification,
                'deg_name' => $request->deg_name,
                'join_dt' => $request->join_dt,
                'adhar_no' => $request->adhar_no,
                'pan_no' =>$request->pan_no,
                'uan_no' => $request->uan_no,
                'address' =>$request->address,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => null,
                'status'      => $request->status
            ]);
            if($save){
                return response()->json(['status' => true, 'message' => 'Staff saved Successfully']);
            }else{
                return response()->json(['status' => false, 'message' => "Staff cound not be created"]);
            }
        }
        if ($request->mode == "edit") {
            $existingUser = Staff::where(function ($query) use ($request) {
                $query->where('status', '!=', 'Deleted')
                    ->where(function ($q) use ($request) {
                        $q->Where('email', $request->email)
                            ->orWhere('adhar_no', $request->adhar_no)
                            ->orWhere('pan_no', $request->pan_no)
                            ->orWhere('uan_no', $request->uan_no);
                    });
            })->get();
            
            $isactive = Staff::where('status','=','Active')->select('emp_id')->get();
            // print_r($isactive);exit;
            foreach($isactive as $act){
                //print_r($act->emp_id);
                $foundact = User::where('emp_id','=',$act->emp_id)->where('status','=','Active')->value('emp_id');
                //print_r($foundact);
                if($foundact){
                    return response()->json(['status'=>'found','message'=>'Warning Staff Active on User Page']);
                }
            }
            //exit;

            if ($existingUser->isNotEmpty()) {
                foreach ($existingUser as $ex) {
                    if ($request->recordid != $ex->id) {
                        return response()->json(['status' => false, 'message' => "ERROR!! User Name Or Email or Adhar or Pan or UAN already exist"]);
                    }
                }
            }

            $updatecategory = Staff::where('id', $request->recordid)->update([
                            'emp_id' => $request->emp_id,
                            'name' => $request->name,
                            'email' => $request->email,
                            'phone_no' => $request->phone_no,
                            'gender' => $request->gender,
                            'dob' => $request->dob,
                            'qualification' => $request->qualification,
                            'deg_name' => $request->deg_name,
                            'join_dt' => $request->join_dt,
                            'adhar_no' => $request->adhar_no,
                            'pan_no' => $request->pan_no,
                            'uan_no' => $request->uan_no,
                            'address' => $request->address,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => null,
                            'status' => $request->status
                        ]);
            return response()->json(['Status'=>true,'Messgae'=>'Updated']);
        }
        
    }

    // /**
    //  * get data for editing
    //  */
    public function getData(string $id)
    {
        $staffs = Staff::where('id', $id)->first();
        return response()->json([$staffs]);
    }

    /**
     * delete data
     */
    public function deleteData(string $id)
    {
        $save = Staff::where('id',$id)
            ->update([
                'updated_at'  => date('Y-m-d H:i:s'),
                'status'      => 'Deleted'
            ]);

            if($save){
                return response()->json([
                    'status' => true,
                    'message' => 'Staff deleted',
                ]);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => "Staff could not be deleted.",
                ]);
            }
    }

    public function getName(Request $request){
        $name = Staff::where('deg_name','=',$request->designationId)->where('status' , '!=' ,'Deleted')->where('status' , '!=' ,'Inactive')->pluck('name','id');
        //print_r($name);exit;
        return response()->json(['name'=>$name]);
    }

    public function getEmpid(Request $request){
        $emp_id = Staff::where('id', '=', $request->userId)->pluck('emp_id','id');
        //print_r($emp_id);exit;
        return response()->json(['emp_id' => $emp_id]);
    }

    // public function getEmpid(Request $request){
    //     $emp_id = Staff::where('name', '=', $request->userId)->pluck('id')->toArray();
    
    //     if (!empty($emp_id)) {
    //         return response()->json(['emp_id' => $emp_id]);
    //     } else {
    //         return response()->json(['error' => 'No matching records found'], 404);
    //     }
    // }
    
    
    
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
