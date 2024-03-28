<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	protected $table = 'students';

	protected $casts = [
		
	];

	protected $fillable = [
		'std_name',
		'reg_date',
		'reg_no',
		'photo',
		'dob',
        'adhar',
        'class',
		'fathers_name',
		'f_adhar',
		'mothers_name',
		'm_adhar',
        'g_phone_no',
		'email',
		'gur_name',
        'emg_contact_no',
        'address',
        'per_address',
		'status'
		
	];

	// public function department()
	// {
	// 	return $this->belongsTo(Department::class);
	// }

	// public function hospital()
	// {
	// 	return $this->belongsTo(Hospital::class);
	// }
}
