<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Password_reset;
use Illuminate\Support\Str;
use Mail;
use App\Mail\ForgetPasswordMail;

class ForgotPasswordController extends Controller
{
    //

    public function PostForgot(Request $request){

    	$request->validate([
    		'email' => 'required|email',
    	]);

    	$admin = Admin::where('email', $request->email)->first();

    	if(!$admin){
    		return redirect()->back()->with('fail', 'User Not Found');
    	}else{

    		$reset_code = Str::random(200);
    		Password_reset::create([
    			'email'=>$request->email,
    			'token'=>$reset_code,
    		]);

    		Mail::to($request->email)->send(new ForgetPasswordMail($admin->name, $reset_code));

    		return redirect()->back()->with('success', 'Mail sent successfully');

    	}
    }
}
