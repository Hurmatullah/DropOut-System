<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Auth;
use Validator;
use App\superadmin;
use Hash;
use App\Student;

class generalController extends Controller
{

    public function __construct(){

        $this->middleware('auth:admin');

    }

    public function get_l(Request $request){

            $validation = Validator::make($request->all(),[
                'email'  => 'required',
                'password'  => 'required',
            ]);

            if ($validation->passes()) {
                $auth_result = Auth::guard('superadmin')->attempt([
                        'email'   => $request->email,
                        'password'   => $request->password,
                 ]);

                if ($auth_result) {
                    return redirect('index');
                }else{
                     Session::flash('error'  ," your email or password is wrong!");
                    return view('login1');
                }
            }else{
                return redirect('administration')->withErrors($validation)->withInput();
            }

    }

    public function g(Request $request){

        $validation = Validator::make($request->all() , [

            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'photo' => 'required',
            ]);
            if ($validation->passes()) {
                
                $user = new superadmin;
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                if ($request->hasFile('photo')) {
                    
                    $file = $request->file('photo');
                    $name = $file->getClientOriginalName();
                    $filename = time() . '.' . $name;

                    $file->move('uploads/Users/' , $filename);

                    $user->photo = $filename;

                }
                $user->save();
                return redirect('index');


            }
            else{

                return redirect('registeration')->withErrors($validation)->withInput();

            }


    }

    public function login(){

        return view('login1');

    }


    public function index(){

            
        $select = DB::table('students')->where('status' , 0)->limit(5)->get();
    	   
            return view('index' , compact('select'));

    }

    public function students(){

        
        $select = DB::table('students')->where('status' , 0)->paginate(5);
            return view('students' , compact('select'));
        
    }

    public function dropedout()
    {
        $select = DB::table('students')->where('status' , 1)->paginate(5);
        return view('dropedout' , compact('select'));

    }

    public function documents(){

        $select = DB::table('documents')->get();

    	return view('documents' , compact('select'));

    }

    public function index7(){

        $select = DB::table('students')->paginate(5);

        return view('index7' , compact('select'));

    }

    public function students_dr(){

        $select = DB::table('students')->where('status' , 0)->paginate(5);

        return view('studentsdr' , compact('select'));
    }

    public function dropedout_dr(){

        $select = DB::table('students')->where('status' , 1)->paginate(5);

            return view('dropedout_dr' , compact('select'));

    }

    public function black_list_dr(){

        $select = DB::table('students')->where('status' , 2)->paginate(5);

            return view('black_list_dr' , compact('select'));

    }

    public function black_list(){

        $select = DB::table('students')->where('status' , 2)->paginate(5);
            return view('black_list' , compact('select'));

    }

    public function drop(Request $request){

        $database = DB::table('students')->where('status' , 0);
        $drop = $request->drop;
        $user_name = Auth::user()->name;
        $student=Student::find($drop[0]);

        if ($database){

            $student->status= DB::table('students')->whereIn('id' , $drop)->update(['status' => 1]);
            $student->droped_by = $user_name;
            $student->save();

            return redirect('dropedout');        
        }
    }

    public function block(Request $request){

        $database = DB::table('students')->where('status' , 1);
        $block = $request->block;
        $user_name = Auth::user()->name;
        $student=Student::find($block[0]);
        if ($database){

            $student->status= DB::table('students')->whereIn('id' , $block)->update(['status' => 2]);
            $student->droped_by = $user_name;
            $student->save();

            return redirect('black_list');
        }
    }

    public function add_documents(){

        return view('add_documents');

    }

    public function upload(){

        return view('upload');


    }

    public function search(Request $request){

        $s = $request->search;
        if ($s == "") {
            
            $select = DB::table('students')->get();

            return view('students' , compact('select'));
        }
        else{

            $select = DB::table('students')
            ->orWhere('name' , 'like' , '%'. $request->search . '%')
            ->orWhere('father_name' , 'like' , '%'. $request->search . '%')
            ->orWhere('last_name' , 'like' , '%'. $request->search . '%')
            ->orWhere('province' , 'like' , '%'.$request->search.'%')
            ->orWhere('year' , 'like' , '%'.$request->search.'%')->paginate(1)->setPath('');
            $pagination = $select->appends(array('search' => $request->search ));

                return view('students' , compact('select'));
        }

    }

    public function search_dropout(Request $request){

        $s = $request->search;
        if ($s == "") {
            
            $select = DB::table('students')->get();

            return view('students' , compact('select'));
        }
        else{
                
            $select = DB::table('students')
            ->where('name' , 'like' , '%'. $s . '%')
            ->where('status',1)->paginate(1)->setPath('');
            $pagination = $select->appends(array('search' => $request->search ));

                return view('dropedout' , compact('select'));

        }

    }

    public function search_black(Request $request){

        $s = $request->search;
        if ($s == "") {
            
            $select = DB::table('students')->get();

            return view('students' , compact('select'));
        }
        else{
                
            $select = DB::table('students')
            ->Where('name' , 'like' , '%'. $request->search .'%')
            ->where('status',2)->paginate(1)->setPath('');
            $pagination = $select->appends(array('search' => $request->search ));

                return view('black_list' , compact('select'));

        }


    }

    public function indexps(){

        
        return view('indexps');


    }

    public function sys_logs(){

        $select = DB::table('students')->where('status' , 1)->get();

        return view('sys_logs' , compact('select'));

    }

    public function documents_dr(){

        $select = DB::table('documents')->get();
        return view('documents_dr' , compact('select'));

    }


    public function syslog_dr(){

        $select = DB::table('students')->where('status' , 1)->get();
        return view('syslog_dr' , compact('select'));

    }

    public function all_students_dr(){

        $select = DB::table('students')->where('status' , 0)->paginate(5);
        return view('studentsdr' , compact('select'));


    }

    public function upload_dr(){

        return view('upload_dr');


    }

    

}
