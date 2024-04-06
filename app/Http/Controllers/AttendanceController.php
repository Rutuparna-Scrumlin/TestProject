<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Classdetails;
use App\Models\Student;
use App\Models\Attendance;
use App\Models\ManageSection;


class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //if super admin for hospital admin restrict it
         
            // if(Auth::User()->role == "1"){
                $managesections = ManageSection ::where('status', '!=' , 'Deleted')->where('status', '!=' , 'Inactive')->where('cls_name',1)->where('sec_name',1)->get();
                //print_r($managesections);exit;
                $students = Student::where('status', '!=' , 'Deleted')->where('status', '!=' , 'Inactive')->pluck('std_name','std_id');
                //print_r($students);exit;
               // $staffs = Staff::where('status', '!=' , 'Deleted')->get();

                return view('backend.attendance', compact('students','managesections'));
    }

    public function saveData(Request $request)
{
    // Decode the JSON data
    $attendanceData = json_decode($request->attendanceData, true);

    // Check if the data is an array or object
    if (!is_array($attendanceData)) {
        return response()->json(['error' => 'Invalid data format'], 400);
    }

    // Loop through each attendance record and save to database
    foreach ($attendanceData as $data) {
        Attendance::create([
            'std_name' => $data['student_name'],
            'roll_no' => $data['roll_no'],
            'status' => $data['status'],
            'date' => now(), // You may need to adjust this based on your requirements
            'created_at'  => date('Y-m-d H:i:s'),
            'updated_at'  => null,
            'created_by' => 1, 
            'updated_by' => 1,
        ]);
    }

    // Return success response
    return response()->json(['message' => 'Attendance saved successfully'], 200);
}





    public function getAttendanceData(Request $request)
    {
        // Logic to retrieve attendance data for the current date from the database
        $currentDate = date('Y-m-d');
        $attendanceData = Attendance::whereDate('created_at', $currentDate)->get();

        return response()->json($attendanceData);
    }
 
    
    

}
