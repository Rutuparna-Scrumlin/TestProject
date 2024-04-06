<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Timetable;

class TimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
                $timetables = Timetable::where('status', '!=' , 'Deleted')->get();
                $subjects = Subject::where('status', '!=' , 'Deleted')->pluck('sub_name','id');
                //print_r($subjects);exit;
                return view('backend.timetable', compact('timetables','subjects'));
            
    }

    public function saveData(Request $request)
    {
        $valid = Validator::make($request->all(),[
            // 'name' => 'required|max:50',
        ]);
        
        if($request->mode == "add"){
            
            $save = Timetable::create([
                'day' => $request->day,
                'from_time' => $request->from_time,
                'to_time' => $request->to_time,
                'sub_name' => $request->sub_name,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => null,
                'status'      => $request->status
            ]);
            if($save){
                return response()->json(['status' => true, 'message' => 'Timetable saved Successfully']);
            }else{
                return response()->json(['status' => false, 'message' => "Timetable cound not be created"]);
            }
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
    

    
    
    

}
