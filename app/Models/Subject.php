<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
	protected $table = 'subjects';

	protected $casts = [
		'created_by' => 'int',
		'updated_by' => 'int',
	];

	protected $fillable = [
		'sub_name',
		'sub_code',
		'description',
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
