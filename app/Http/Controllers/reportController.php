<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use Excel;
use App\Exports\UsersExport;

class reportController extends Controller
{

	public function report(){

		$select = DB::table('students')->where('status' , 1)->get();

	    return view('report' , compact('select'));

	}


	public function search_for_report(Request $request){

		$faculty = $request->faculty;
		$province = $request->province;
		$year = $request->year;

		if ($faculty == "" || $province == "" || $year == "") {
		    
		    return view('report' , compact('select'));
		}

		else{

		    $select = DB::table('students')
		    ->Where('province' , 'like' , '%'. $request->province .'%')
		    ->where('faculty' , 'like' , '%'. $request->faculty .'%')
		    ->where('year' , 'like' , '%'. $request->year .'%')
		    ->where('status' , 1)
		    ->get(); 

		        return view('report' , compact('select'));
		}

	}


		public function exportExcel(){


		   return Excel::download(new UsersExport, 'dropedout.xlsx');


		}


		public function report_dr(){

			$select = DB::table('students')->where('status' , 1)->get();

			return view('report_dr' , compact('select'));


		}


}
