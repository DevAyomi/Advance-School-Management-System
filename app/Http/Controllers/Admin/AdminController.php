<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function check(Request $request){
    	//Validate incomming inputs
    	$request->validate([
    		'email' => 'required|email|exists:admins,email',
    		'password' => 'required|min:5|max:30'
    	],

    	[
    		'email.exists' => 'This email does not exixst in admin table',
    	]);

    	$creds = $request->only('email','password');

    	if( Auth::guard('admin')->attempt($creds)){
    		return redirect()->route('admin.home');
    	}else{
    		return redirect('admin/login')->with('fail', 'Wrong Creds | This user is not an Admin');
    	}
    }


    public function logout(){
    	Auth::guard('admin')->logout();
    	return redirect('admin/login');
    }


    //User Management All Routes
    public function AdminView(){

        /*$allData = Admin::all();*/
        $data['allData'] = Admin::all();
        return view('backend.admin.view_admin',$data);
    }

    public function AddAdmin(){
        return view('backend.admin.add_admin');
    }


    public function AdminStore(Request $request){
        $validatedData = $request->validate([

            'email' => 'required|unique:users',
            'name' => 'required|'

        ]);

        $data = new Admin();
        $data->role = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);

        $save = $data->save();

        return redirect()->route('admin.view');
    }
}


