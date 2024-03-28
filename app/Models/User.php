<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	protected $table = 'users';

	protected $casts = [
		
	];

	protected $fillable = [
		'emp_id',
		'role_name',
		'name',
		'user_name',
		'password',
        'email',
        'phone_no',
        'gender',
		'dob',
		'qualification',
		'deg_name',
		'join_dt',
		'adhar_no',
		'pan_no',
        'uan_no',
        'address',
		'status'
		
	];


}
