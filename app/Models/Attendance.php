<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
	protected $table = 'attendances';

	protected $casts = [
		'created_by' => 'int',
		'updated_by' => 'int',
	];

	protected $fillable = [
		'std_name',
		'roll_no',
        'status',
		'date',
        'created_by',
		'updated_by'
		
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
