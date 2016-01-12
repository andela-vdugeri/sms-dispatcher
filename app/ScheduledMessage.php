<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduledMessage extends Model
{
    

    protected $fillable = [
    	'user_id',
    	'message',
    	'send_time'
    ];



    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function numbers()
    {
    	return $this->hasMany('App\ScheduledNumber');
    }
}
