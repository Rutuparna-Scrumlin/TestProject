<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ManageSection extends Model
{
	protected $table = 'manage_secs';

	protected $casts = [

	];

	protected $fillable = [
		'cls_name',
		'std_name',
		'sec_name',
		'roll_no',
		'status'
		
	];

	
}
