<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
	protected $table = 'staffs';

	protected $casts = [
		'created_by' => 'int',
		'updated_by' => 'int',
	];

	protected $fillable = [
		'emp_id',
		'name',
		'dob',
		'gender',
        'qualification',
        'email',
        'phone_no',
		'address',
        'join_dt',
        'deg_name',
        'adhar_no',
		'pan_no',
        'uan_no',
		'status'
		
	];

	// public function sub()
	// {
	// 	return $this->belongsTo(Subject::class);
	// }

	// public function hospital()
	// {
	// 	return $this->belongsTo(Hospital::class);
	// }
}
