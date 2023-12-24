<?php

namespace App\Imports;

use App\Models\students\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class StudentImportClass implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $collec){
            // dd($collec);
            $students = new Student();
            $students->setTranslation('name' , 'en' , $collec[0] ?? '');
            $students->setTranslation('name' , 'ar' , $collec[1] ?? '');  
            $students->email = $collec[2]  ?? '';
            $students->password = bcrypt($collec[3] ?? '');
            $students->gender_id = $collec[4] ?? null;
            $students->nationality_id = $collec[5] ?? null;
            $students->blood_id = $collec[6] ?? null;
            $students->date_birth = $collec[7] ?? null;
            $students->grade_id = $collec[8] ?? null;
            $students->class_id = $collec[9] ?? null;
            $students->section_id = $collec[10] ?? null;
            $students->parent_id = $collec[11] ?? null;
            $students->academic_year = $collec[12] ?? null;
            // dd($students);
            $students->save();
        }
    }
}
