<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
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
                $roles = Role::where('status', '!=' , 'Deleted')->get();
                //print_r($roles);exit;
                return view('backend.role', compact('roles'));
               
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
            $existingRoleName = Role::where('status', '!=' , 'Deleted')->where('role_name', ($request->role_name))->first();

            if($existingRoleName){
                return response()->json(['status' => false, 'message' => "ERROR!! Role Name already exists"]);
            }
            $save = Role::create([
                'role_name' => $request->role_name,
                'description' => $request->description,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => null,
                'created_by' => 1, 
                'updated_by' => 1,
                'status'      => $request->status
            ]);
            if($save){
                return response()->json(['status' => true, 'message' => 'Role saved Successfully']);
            }else{
                return response()->json(['status' => false, 'message' => "Role cound not be created"]);
            }
         }
         if ($request->mode == "edit") {
            $existingUser = Role::where(function ($query) use ($request) {
                $query->where('status', '!=', 'Deleted')
                    ->where(function ($q) use ($request) {
                        $q->where('role_name', $request->role_name);       
                    });
                })->get();
        
            if ($existingUser->isNotEmpty()) {
                foreach ($existingUser as $ex) {
                    if ($request->recordid != $ex->role_id) {
                        return response()->json(['status' => false, 'message' => "ERROR!! Role Name already exists"]);
                    }
                }
            }
                // Both name and code are new, update both
                $save = Role::where('role_id',$request->recordid)->update([
                    'role_name' => $request->role_name,
                    'description' => $request->description,
                    'created_at'  => date('Y-m-d H:i:s'),
                    'updated_at'  => null,
                    'created_by' => 1, 
                    'updated_by' => 1,
                    'status'      => $request->status
                ]);
                return response()->json(["status"=>true,"message"=>"Role saved Successfully"]);

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
        $roles = Role::where('role_id', $id)->first();
        return response()->json([$roles]);
    }

    /**
     * delete data
     */
    public function deleteData(string $id)
    {
        $save = Role::where('role_id',$id)
            ->update([
                'updated_at'  => date('Y-m-d H:i:s'),
                'status'      => 'Deleted'
            ]);

            if($save){
                return response()->json([
                    'status' => true,
                    'message' => 'Role deleted',
                ]);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => "Role could not be deleted.",
                ]);
            }
    }

    
    
    

}
