<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Session;
use App;
class languageController extends Controller
{
	public function localization($locale){

		Session::put('locale' , $locale);

			return redirect('index7');


	}
}
