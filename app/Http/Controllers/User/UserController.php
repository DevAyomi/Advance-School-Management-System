<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function check(Request $request){

    	$request->validate([
    		'student_no' => 'required|exists:users,student_no',
    		'password' => 'required|min:5|max:30'
    	],

    	[
    		'student_no.exists' => 'This Student_no is not registered',
    	]);

    	$creds = $request->only('student_no', 'password');
    	if( Auth::guard('web')->attempt($creds)){
    		return redirect()->route('user.home');
    	}else{
    		return redirect()->route('user.login')->with('fail', 'Incorrect Credentials');
    	}
    }


    public function logout(){
    	Auth::guard('web')->logout();
    	return redirect('/');
    }
}
