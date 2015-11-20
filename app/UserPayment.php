<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPayment extends Model
{
    

    protected $fillable = [
    	'user_id', 
    	'ammout'
    ];
}
