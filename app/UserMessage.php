<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMessage extends Model
{
    //

    protected $fillable = [
    	'transaction_id',
    	'user_id',
    	'message'
    ];
}
