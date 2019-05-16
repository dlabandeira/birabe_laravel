<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function show(){
    	$user = Auth::user();
    	return view('users.user', array(
    		'user' => $user,
    	));
    }
}
