<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Classdetails;
use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
use Session;

class DashboardController extends Controller
{
    
    

    public function index()
    {
        if(Session::has('loginId')){
            $data = User::where('id','=',Session::get('loginId'))->first();
            $totalStudents = Student::where('status', '!=' , 'Deleted')->where('status', '!=' , 'Inactive')->count();
            $totalSubjects = Subject::where('status', '!=' , 'Deleted')->where('status', '!=' , 'Inactive')->count();
            //print_r($totalSubjects);exit;
            $totalClasses = Classdetails::where('status', '!=' , 'Deleted')->where('status', '!=' , 'Inactive')->count();
            $totalStaffs = Staff::where('status', '!=' , 'Deleted')->count();
    
            return view('backend.dashboard', compact('totalStudents', 'totalSubjects', 'totalClasses', 'totalStaffs'));
        }
      
    }
   
    }  


