<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
	protected $table = 'sections';

	protected $casts = [

	];

	protected $fillable = [
		'sec_name',
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
