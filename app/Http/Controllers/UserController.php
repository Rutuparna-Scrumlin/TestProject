<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Staff;
use App\Models\Designation;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role ::where('status', '!=' , 'Deleted')->where('status', '!=' , 'Inactive')->pluck('role_name','role_id');
       // print_r($roles);exit;
       $staffs = Staff ::where('status', '!=' , 'Deleted')->where('status', '!=' , 'Inactive')->pluck('name','id');
       //print_r($staffs);exit;
        $designations = Designation::where('status', '!=' , 'Deleted')->where('status', '!=' , 'Inactive')->pluck('deg_name','id');
        $users = User::where('status', '!=' , 'Deleted')->get();
        
        return view('backend.user', compact('users','staffs','roles','designations'));
    }

    public function getStaffByDesignation($designationId)
    {
        $staffs = Staff::where('deg_name', $designationId)->get();
        return response()->json(['staffs' => $staffs]);
        
    }

    public function getStaffById($userId)
    {
        $staffs = Staff::where('emp_id', $userId)->get();
        return response()->json(['staff' => $staffs]);
    }
 
   

    public function saveData(Request $request)
    {
        //$newId = $this->getEmployeeid(); // Call the getEmployeeid() function to get $newId
        $valid = Validator::make($request->all(),[
            //'name' => 'required|max:50',
        ]);
        if($valid->fails()){
            return response()->json(['status' => false, 'message' => $valid->errors()->all()]);
        }
        if($request->mode == "add"){
           
    
            $save = User::create([
                'deg_name' => $request->deg_name,
                'name' => $request->name,
                'emp_id'=>$request->emp_id,
                'role_name' => $request->role_name,
                'user_name' => $request->user_name,
                'password' =>Hash::make($request->password),
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => null,
                'status'      => $request->status
            ]);
            if($save){
                return response()->json(['status' => true, 'message' => 'User saved Successfully']);
            }else{
                return response()->json(['status' => false, 'message' => "User cound not be created"]);
            }
        }
        if ($request->mode == "edit") {
           
        
            $updatecategory = User::where('id', $request->recordid)->update([
                'deg_name' => $request->deg_name,
                'name' => $request->name,
                'emp_id'=>$request->emp_id,
                'role_name' => $request->role_name,
                'user_name' => $request->user_name,
                'password' =>$request->password,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => null,
                'status'      => $request->status
            ]);
        
            return response()->json(["Status" => true, "message" => "User Updated Successfully"]);
        }
        
    }

    // /**
    //  * get data for editing
    //  */
    public function getData(string $id)
    {
        $user = User::where('id', $id)->first();
        return response()->json([$user]);
    }

    /**
     * delete data
     */
    public function deleteData(string $id)
    {
        $save = User::where('id',$id)
            ->update([
                'updated_at'  => date('Y-m-d H:i:s'),
                'status'      => 'Deleted'
            ]);

            if($save){
                return response()->json([
                    'status' => true,
                    'message' => 'User deleted',
                ]);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => "User could not be deleted.",
                ]);
            }
    }

    // public function login(Request $request)
    // {
    //     // Validate the login request
    //     $request->validate([
    //         'user_name' => 'required',
    //         'password' => 'required',
    //     ]);

    //     // Attempt to authenticate the user
    //     if (Auth::attempt(['user_name' => $request->user_name, 'password' => $request->password])) {
    //         // Authentication successful, redirect to intended location
    //         return redirect()->intended('/dashboard');
    //     } else {
    //         // Authentication failed, redirect back with error message
    //         return redirect()->back()->with('error', 'Invalid username or password');
    //     }
    // }
    
    
    

}
