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
       //Restricting this view for operators (Only SuperAdmins should be able to view)
       if(Auth::user()->role ==='Admin'){

            $data['allData'] = Admin::all();
            return view('backend.admin.view_admin',$data);

       }else{
            return redirect('admin/error')->with('error', 'You are not allowed to access this page');
       }
    }


    public function AddAdmin(){
        //Restricting Operators from being able to edit operators (Only SuperAdmins should be edit opertors deatails)
       if(Auth::user()->role === 'Admin'){

            return view('backend.admin.add_admin');

       }else{
             return redirect('admin/error')->with('error', 'You are not allowed to access this page');
       }
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

        $notification = array(

            'message' => 'Operator Created Successfully',
            'alert-type' => 'success',

        );


        return redirect()->route('admin.view')->with($notification);
    }

    public function EditAdmin($id){

        $editdata = Admin::find($id);
        return view('backend.admin.edit_admin', compact('editdata'));
    }


    //Update Opertor Method
    public function UpdateOp(Request $request, $id){

        $data = Admin::find($id);
        $data->role = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;

        $save = $data->save();

        $notification = array(

            'message' => 'Operator Updated Successfully',
            'alert-type' => 'info',

        );


        return redirect()->route('admin.view')->with($notification);
    }


}


