<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
	protected $table = 'reg_counter';

	protected $casts = [
		
	];

	protected $fillable = [
		'counter',
		
		
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
