<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use DB;

class pdfController extends Controller
{
    //

    public function new(){

    	//$select = DB::table('documents')->get();

    	return view('new');

    }

	public function pdf(){

		$select = DB::table('documents')->pluck('name');
		$view = \View::make('new');
		$html_content = $view->render();

		PDF::SetTitle('samplePDF');
		PDF::AddPage();
		PDF::writeHTML($html_content , true , false , true , false, '');

		PDF::Output(public_path(uniqid().'_samplePDF.pdf'),'F');


		return redirect('export' , compact('select'));
	}



}
