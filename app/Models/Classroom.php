<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
	protected $table = 'classrooms';

	protected $casts = [
		'created_by' => 'int',
		'updated_by' => 'int',
	];

	protected $fillable = [
		'floor_no',
		'room_name',
        'created_by',
		'updated_by',
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
