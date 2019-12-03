<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\superadmin;
use App\User;
use Auth;
use DB;
use Validator;
use Hash;

class uController extends Controller
{
    
	public function users(){

	    $users = DB::table('admins')->get();
	    return view('users' , compact('users'));

	}

	public function registeration(){

	    return view('registeration');

	}

	public function logout(){
	    Auth::guard('superadmin')->logout();
	    return redirect('/');
	}


	public function user_profile($id){

	    $select = DB::table('users')->where('id' , $id)->get();

	    return view('user_profile' , compact('select'));

	}


	public function u_profile(Request $request , $id){

		$update = User::find($id);
		$update->name = $request->input('name');
		$update->email = $request->input('email');
		$update->password = $request->input('password');

		 $update->save();

		  return redirect('users');


	}

	public function users_dr(){

		$users = DB::table('admins')->get();
		return view('users_dr' , compact('users'));


	}

	public function delete($id){

		DB::table('admins')->where('id', $id)->delete();

		 return redirect('users');


	}


}
