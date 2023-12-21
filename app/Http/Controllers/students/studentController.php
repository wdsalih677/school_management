<?php

namespace App\Http\Controllers\students;

use App\Http\Controllers\Controller;
use App\Models\bloods\Blood;
use App\Models\genders\Gender;
use App\Models\Grades\Grade;
use App\Models\nationalities\Nationalitie;
use App\Models\parents\StuParent;
use App\Models\schoolClass\SchoolClass;
use App\Models\sctions\Section;
use App\Models\students\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class studentController extends Controller
{
    
    public function index()
    {
        return view('students.index');
    }

    
    public function create()
    {
        $data['grades'] = Grade::get();
        $data['stu_parents'] = StuParent::get();
        $data['genders'] = Gender::get();
        $data['Nationalities'] = Nationalitie::get();
        $data['bloods'] = Blood::get();
        return view('students.addStudent',$data);
    }

    
    public function store(Request $request)
    {
        $students = new Student();
        $students->name             = ['en' => $request->name_en , 'ar' =>$request->name_ar];
        $students->email            = $request->email ;
        $students->password         = Hash::make($request->password);
        $students->gender_id        = $request->gender_id;
        $students->nationality_id   = $request->nationality_id;
        $students->blood_id         = $request->blood_id;
        $students->date_birth       = $request->date_birth;
        $students->grade_id         = $request->garde_id;
        $students->class_id         = $request->class_id;
        $students->section_id       = $request->section_id;
        $students->parent_id        = $request->parent_id;
        $students->academic_year    = $request->academic_year;
        $students->save();
        toast(trans('main_trans.add_success'),'success');
        return redirect()->route('students.index');

    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
    public function getSchoolClass($id){
        $schoolClasses = SchoolClass::where("grade_id", $id)->pluck("name", "id");
        return $schoolClasses;
    }
    public function getSection($id){
        $sections = Section::where("class_id", $id)->pluck("name", "id");
        return $sections;
    }
}
