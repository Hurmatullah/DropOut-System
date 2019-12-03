<?php

namespace App;
use App\Document;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Student extends Model implements Auditable
{

	protected $fillable = [

		"name" , "father_name" , "last_name" , "grand_father_name",
		"school" , "year" , "kankor_score" , "faculty" , "province" , "gender"

	];

	use \OwenIt\Auditing\Auditable;


	public $table = "students";

	public function Document(){

		return $this->hasMany(Document::class);

	}

	public $timestamps = false;


}
