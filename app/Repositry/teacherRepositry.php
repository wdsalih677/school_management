<?php
namespace App\Repositry;

use App\Models\genders\Gender;
use App\Models\specialties\Specialty;
use App\Models\teachers\Teacher;
use Illuminate\Support\Facades\Hash;

class teacherRepositry implements teacherRepositryInterface{
    public function getTeacher(){
        return Teacher::get();
        
    }
    public function getGender(){
        return Gender::get();
    }
    public function getSpecialty(){
        return Specialty::get();
    }
    public function setTeacher($request){
        try{
            $teachers = new Teacher();
            $teachers->name = ['en' => $request->name_en , 'ar' => $request->name_ar];
            $teachers->email = $request->email;
            $teachers->password = Hash::make('password');
            $teachers->joining_date = $request->joining_date;
            $teachers->gender_id = $request->gender_id;
            $teachers->specialty_id = $request->specialty_id;
            $teachers->address = $request->address;
            $teachers->save();
            toast(trans('main_trans.add_success'),'success');
            return redirect()->route('teachers.index');
        }
        catch(\Exception $e){
            // return redirect()->back()->withError(['error' => $e->getMessage()]);
            return $e;
        }
    }
}