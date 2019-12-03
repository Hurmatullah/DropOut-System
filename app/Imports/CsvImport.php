<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use App\User;

class CsvImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([

           'name'  =>  $row[0],
           'email' => $row[1],
           'father_name' => $row[3]
            
        ]);
    }
}
