<?php

namespace App;
use App\Student;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public $table = "documents";


    public function Student(){

    	return $this->belongsTo(Student::class);

    }

}
