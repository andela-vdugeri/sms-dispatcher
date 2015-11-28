<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class UserPayment extends Model
{
    

    protected $fillable = [
    	'user_id', 
    	'amount'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
