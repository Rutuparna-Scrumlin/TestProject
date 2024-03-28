<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $table = 'roles';

	protected $casts = [
		'created_by' => 'int',
		'updated_by' => 'int',
	];

	protected $fillable = [
		'role_name',
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
