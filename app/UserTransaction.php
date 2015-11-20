<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTransaction extends Model
{
    //

    protected $fillable = [
    	'user_id',
    	'message_units',
    	'receivers'
    ];
}
