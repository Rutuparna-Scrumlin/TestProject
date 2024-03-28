<?php

namespace App\Http\Controllers;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        
        $username = $request->user_name;  
        $password = $request->password;

        // Query the database to validate the user credentials
        $user = User::where('user_name', $username)->first();
        
        if ($user && Hash::check($password, $user->password)) {
        $request->session()->put('loginId', $user->id);
        return response()->json(['success' => true]);
     }
 
        return response()->json(['success' => false]);
    }
    
}
