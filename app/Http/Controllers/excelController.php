<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Imports\newImport;
use DB;
use Maatwebsite\Excel\Facades\Excel;

class excelController extends Controller
{


    public function importExcel()
    {

    	Excel::import(new newImport , request()->file('file'));

    	  return redirect('index');

    }
}
