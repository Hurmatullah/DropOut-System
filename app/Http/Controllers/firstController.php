<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Imports\newImport;
use DB;
use Maatwebsite\Excel\Facades\Excel;

class firstController extends Controller
{
    

	public function import()
	{

		$data = DB::table('students')->paginate(5)->get();
			return view('index1' , compact('data'));

	}


	public function index()
	{

		return view('index');

	}


	public function importExcel()
	{

		Excel::import(new newImport , request()->file('file'));

		  return back();

	}


}
