<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
	protected $table = 'designations';

	protected $casts = [
		'created_by' => 'int',
		'updated_by' => 'int',
	];

	protected $fillable = [
		'deg_name',
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
