<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Document;
use Validator;

class documentController extends Controller
{
    
	public function add(Request $request){

		$validator = Validator::make($request->all() , [
			'name' => 'required',
			'year' => 'required',
			'dnumber' => 'required',
			'photo' => 'required'

		]);

		if ($validator->passes()) {
			
			$insert = new Document;
			$insert->name = $request->name;
			$insert->year = $request->year;
			$insert->document_number = $request->dnumber;

			if ($request->hasFile('photo')) {
				
				$file = $request->file('photo');
				$name = $file->getClientOriginalName();
				$filename = time() . '.' . $name;

				$file->move('uploads/Documents/' , $filename);

				$insert->photo = $filename;

			}

			$insert->save();

			return redirect('documents');

		}

		else{
			return redirect('add_documents')->withErrors($validator)->withInput();


		}



	}

	public function doc_search(Request $request){

		$s = $request->search;
		if ($s == "") {
		    
		    $select = DB::table('documents')->get();

		    return view('documents' , compact('select'));
		}
		else{
		        
		    $select = DB::table('documents')
		    ->where('name' , 'like' , '%'. $s . '%')
		    ->orWhere('year', 'like' , '%'.$s .'%')->paginate(1)->setPath('');
		    $pagination = $select->appends(array('search' => $request->search ));

		        return view('documents' , compact('select'));

		}
	}


	public function add_documents_dr(){

		return view('add_documents_dr');


	}

}
