<?php

namespace App\Http\Controllers;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;
use Validator;
class AuthController extends Controller
{
    public function authenticate(Request $request)
    {

        $validator = Validator::make($request->all(), [
           'user_name'=> 'required|min:3',
           'password'=>'required',
        ]);
       if($validator->fails())
        {
        $errors =$validator->errors();
        $request->session()->flash('alert-danger','Errors! Please correct the following errors and submit again.');
        return back()->withErrors($errors)->withInput();

       }
       // dd($request->session());
        $username = $request->user_name;  
        $password = $request->password;

        // Query the database to validate the user credentials
        $user = User::where('user_name', $username)->first();

    if ($user) {
        // Check if the provided password matches the hashed password stored in the database
        if (Hash::check($password, $user->password)) {
            // Password is correct, proceed to login
            $request->session()->put('loginId', $user->id);
            return redirect('dashboard');
        } else {
            // Password is incorrect
            return back()->with('alert-danger', 'Invalid password.');
        }
    } else {
        // User not found
        return back()->with('alert-danger', 'This User Name is not found, please enter a valid user name.');
    }

    }

    public function logout(Request $request)
{
    // Flush the session data
    $request->session()->flush();

    // Add a success message
    $request->session()->flash('alert-success', 'Logout successful.');

    // Redirect to the login page
    return redirect('/');
}
    
}
