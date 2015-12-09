<?php

namespace App\Http\Controllers;


use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    




    public function listUsers()
    {
    	$users = User::all();

    	return view('admin.home', compact('users'));
    }
}
