<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduledNumber extends Model
{
    

    protected $fillable = [
    	'number',
    	'schedule_id'
    ];



    public function scheduledMessage()
    {
    	return $this->belongsTo('App\ScheduledMessage');
    }
}
