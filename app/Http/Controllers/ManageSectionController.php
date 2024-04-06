<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Classdetails;
use App\Models\Student;
use App\Models\Section;
use App\Models\ManageSection;



class ManageSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $managesections = ManageSection::where('status', '!=' , 'Deleted')->get();
       // return $managesections;
        $classdetail = Classdetails ::where('status', '!=' , 'Deleted')->where('status', '!=' , 'Inactive')->pluck('cls_name','id');
        $students = Student::where('status', '!=' , 'Deleted')->where('status', '!=' , 'Inactive')->pluck('std_name','std_id');
        $sections = Section::where('status', '!=' , 'Deleted')->where('status', '!=' , 'Inactive')->pluck('sec_name','sec_id');
        //$reg_no = $this->generateRegnNo(''); // Generate registration number for displaying in the form
        return view('backend.managesection', compact('managesections','students','classdetail','sections'));
    }

    public function saveData(Request $request)
    {

        if($request->mode == "add") {
            $save = ManageSection::create([
                'cls_name'=>$request->cls_name,
                'std_name'=>$request->std_name,
                'sec_name' => $request->sec_name,
                'roll_no' => $request->roll_no,
                'class' =>$request->class, 
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => null,
                'status'      => $request->status
            ]);
            if($save){
                    // Generate registration number
                    //$reg_no = $this->generateRegnNo('');
                return response()->json(['status' => true, 'message' => 'Student saved Successfully']);
            }else{
                return response()->json(['status' => false, 'message' => "Student cound not be created"]);
            }
        }
            
    }

    
//         if ($request->mode == "edit") {
//             $existingStudent = Student::where(function ($query) use ($request) {
//                 $query->where('status', '!=', 'Deleted')
//                     ->where(function ($q) use ($request) {
//                         $q->Where('adhar', $request->adhar);         
//                     });
//                 })->get();
        
//             if ($existingStudent->isNotEmpty()) {
//                 foreach ($existingStudent as $ex) {
//                     if ($request->recordid != $ex->id) {
//                         return response()->json(['status' => true, 'message' => "ERROR!! Student Adhaar already exist"]);
//                     }
//                 }
//             }else{
//                 $save = Student::where('std_id', $request->recordid)->update([
//                     'std_name'=>$request->std_name,
//                     'photo' => $request->photo,
//                     'dob' => $request->dob,
//                     'adhar' => $request->adhar,
//                     'class' =>$request->class,
//                     'roll_no' =>$request->roll_no, 
//                     'section' =>$request->section,
//                     'email' => $request->email,
//                     'address' => $request->address,
//                     'phone_no' => $request->phone_no,
//                     'fathers_name' =>$request->fathers_name,
//                     'f_adhar' => $request->f_adhar,
//                     'mothers_name' =>$request->mothers_name,
//                     'm_adhar' => $request->m_adhar,
//                     'emg_contact_no' =>$request->emg_contact_no,
//                     'g_email' =>$request->g_email,
//                     'per_address' => $request->per_address,
//                     'created_at'  => date('Y-m-d H:i:s'),
//                     'updated_at'  => null,
//                     'status'      => $request->status
//                 ]);
            
//                  return response()->json(["Status" => true, "message" => "Student Updated Successfully"]);
//             }
        
            
//          }
        
//     }

//     // /**
//     //  * get data for editing
//     //  */
    public function getData(string $id)
    {
        $ManageSections = ManageSection::where('id', $id)->first();
        return response()->json([$ManageSections]);
    }

//     /**
//      * delete data
//      */
//     public function deleteData(string $id)
//     {   
    
//         $save = Student::where('std_id',$id)
//             ->update([
//                 'updated_at'  => date('Y-m-d H:i:s'),
//                 'status'      => 'Deleted'
//             ]);

//             if($save){
//                 return response()->json([
//                     'status' => true,
//                     'message' => 'Student deleted',
//                 ]);
//             }else{
//                 return response()->json([
//                     'status' => false,
//                     'message' => "Student could not be deleted.",
//                 ]);
//             }
//     }  

// // *********************************************************************************
// private function generateRegnNo($reg_no)
// {
//     if ($reg_no != "") {
//         return $reg_no;
//     } else {
//         $count = Counter::select('counter')->first();
//         $upcount = ++$count->counter;
//         $formattedUpcount = sprintf('%04d', $upcount);
//         $currentYear = date('Y');
//         $reg_no = "STD-" . $currentYear . "-" . $formattedUpcount;
//         Counter::where('id', 1)->update(['counter' => $upcount]);
//         return $reg_no;
//     }
 //}

// *********************************************************************************

}
