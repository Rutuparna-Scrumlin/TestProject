<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
	protected $table = 'timetables';

	protected $casts = [
		
	];

	protected $fillable = [
		'day',
		'from_time',
        'to_time',
		'sub_name',
		'status'
		
	];

	
}
