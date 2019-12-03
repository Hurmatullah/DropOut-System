<?php

namespace App\Imports;

use App\Student;
use Maatwebsite\Excel\Concerns\ToModel;

class newImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            'id' => $row[0],
            'name' => $row[1],
            'father_name' => $row[2],
            'last_name' => $row[3],
            'grand_father_name' => $row[4],
            'school' => $row[5],
            'year' => $row[6],
            'kankor_score' => $row[7],
            'faculty' => $row[8],
            'province' => $row[9],
            'gender' => $row[10],
        ]);
    }
}
