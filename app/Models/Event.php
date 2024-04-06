<?php

namespace App\Models;
use Carbon\Carbon;
//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

	protected $casts = [
		
	];

	protected $fillable = [
        'title', 
        'start',
         'end'
		
	];
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
