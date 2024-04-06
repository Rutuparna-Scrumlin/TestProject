<?php
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Role;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StaffBackController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassdetailsController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ManageSectionController;
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\EventController;
//use App\Http\Middleware\AuthCheck;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('backend.login');
})->middleware('alreadyLoggedIn');

Route::get('/logout', [AuthController::class,'logout'])->name('logout');
// Route::get('/sdemo', function () {
//     return view('backend.sdemo');
// });

// Route::view('backend.student');
//Route::group(['middleware' => ['auth']], function () {
    //Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard')->middleware('isLoggedIn');
   
 //Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard')->middleware('isLoggedIn');
 //});

 Route::middleware(['isLoggedIn'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Add other routes that require the 'isLoggedIn' middleware here
    Route::get('user', [UserController::class,'index'])->name('user');
    Route::get('staff', [StaffController::class, 'index'])->name('staff');
    Route::get('student', [StudentController::class, 'index'])->name('student');
    Route::get('subject', [SubjectController::class, 'index'])->name('subject');
    Route::get('classdetails', [ClassdetailsController::class, 'index'])->name('classdetails');
    Route::get('section', [SectionController::class, 'index'])->name('section');
    Route::get('managesection', [ManageSectionController::class, 'index'])->name('managesection');
    Route::get('designation', [DesignationController::class, 'index'])->name('designation');
    Route::get('role', [RoleController::class, 'index'])->name('role');
    Route::get('classroom', [ClassroomController::class, 'index'])->name('classroom');
    Route::get('attendance', [AttendanceController::class, 'index'])->name('attendance');
    Route::view('timetable', 'timetable');
});



Route::post('/login', [AuthController::class,'authenticate']);
//Route::get('user', [UserController::class,'index']);
Route::get('/getStaffByDesignation/{designationId}', 'UserController@getStaffByDesignation');
Route::get('/getStaffById/{userId}', 'UserController@getStaffById');                                                                                            
//Route::get('user', [UserController::class, 'generateEmployeeId']);
Route::post('user/savedata', [UserController::class, 'saveData']);
Route::get('user/edit/{id}', [UserController::class, 'getData']);
Route::get('user/delete/{id}', [UserController::class, 'deleteData']);
// Route::get('user/getid', [UserController::class, 'getEmployeeid']);

//Route::get('staff', [StaffController::class, 'index']);
Route::post('staff/savedata', [StaffController::class, 'saveData']);
Route::get('staff/edit/{id}', [StaffController::class, 'getData']);
Route::get('staff/delete/{id}', [StaffController::class, 'deleteData']);
Route::get('staff/getid', [StaffController::class, 'getEmployeeid']);
Route::post('staff/staffname', [StaffController::class, 'getName']);
Route::post('staff/staffId', [StaffController::class, 'getEmpid']);





//Route::get('student', [StudentController::class, 'index']);
// Route::get('studentbkp', [StudentController::class, 'index']);
Route::post('student/savedata', [StudentController::class, 'saveData']);
 Route::post('student', [StudentController::class, 'generateRegnNo']);
Route::get('student/edit/{id}', [StudentController::class, 'getData']);
Route::get('student/delete/{id}', [StudentController::class, 'deleteData']);
Route::get('/getStudentsByClass/{classId}', [StudentController::class, 'getStudentsByClass']);
Route::post('managesection/stdname', [StudentController::class, 'getName']);



//Route::get('subject', [SubjectController::class, 'index']);
Route::get('/subjects', 'SubjectController@index')->name('subjects.index');
Route::post('subject/savedata', [SubjectController::class, 'saveData']);
Route::get('subject/edit/{id}', [SubjectController::class, 'getData']);
Route::get('subject/delete/{id}', [SubjectController::class, 'deleteData']);

//Route::get('classdetails', [ClassdetailsController::class, 'index']);
Route::post('classdetails/savedata', [ClassdetailsController::class, 'saveData']);
Route::get('classdetails/edit/{id}', [ClassdetailsController::class, 'getData']);
Route::get('classdetails/delete/{id}', [ClassdetailsController::class, 'deleteData']);


//Route::get('section', [SectionController::class, 'index']);
Route::post('section/savedata', [SectionController::class, 'saveData']);
Route::get('section/edit/{id}', [SectionController::class, 'getData']);
Route::get('section/delete/{id}', [SectionController::class, 'deleteData']);

//Route::get('managesection', [ManageSectionController::class, 'index']);

Route::post('managesection/savedata', [ManageSectionController::class, 'saveData']);

 Route::get('managesection/edit/{id}', [ManageSectionController::class, 'getData']);
// Route::get('section/delete/{id}', [SectionController::class, 'deleteData']);

//Route::get('designation', [DesignationController::class, 'index']);
Route::post('designation/savedata', [DesignationController::class, 'saveData']);
Route::get('designation/edit/{id}', [DesignationController::class, 'getData']);
Route::get('designation/delete/{id}', [DesignationController::class, 'deleteData']);

//Route::get('role', [RoleController::class, 'index']);
Route::post('role/savedata', [RoleController::class, 'saveData']);
Route::get('role/edit/{id}', [RoleController::class, 'getData']);
Route::get('role/delete/{id}', [RoleController::class, 'deleteData']);

//Route::get('classroom', [ClassroomController::class, 'index']);
Route::post('classroom/savedata', [ClassroomController::class, 'saveData']);
Route::get('classroom/edit/{id}', [ClassroomController::class, 'getData']);
Route::get('classroom/delete/{id}', [ClassroomController::class, 'deleteData']);

//Route::get('attendance', [AttendanceController::class, 'index']);
Route::post('attendance/save', [AttendanceController::class, 'saveData'])->name('attendance.save');
Route::get('attendance/getAttendanceData', [AttendanceController::class, 'getAttendanceData']);

Route::get('timetable', [TimetableController::class, 'index']);
Route::post('timetable/savedata', [TimetableController::class, 'saveData']);

Route::get('full-calender', [EventController::class, 'index']);
Route::post('full-calender-AJAX', [EventController::class, 'ajax']);

