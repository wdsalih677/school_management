<?php

namespace App\Http\Controllers\teachers;

use App\Http\Controllers\Controller;
use App\Repositry\teacherRepositryInterface;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    protected $teacher , $gender , $specialty , $setTeacher , $updateTeacher , $deleteTeacher;
    
    public function __construct(
        teacherRepositryInterface $teacher ,
        teacherRepositryInterface $gender ,
        teacherRepositryInterface $specialty , 
        teacherRepositryInterface $setTeacher,
        teacherRepositryInterface $updateTeacher,
        teacherRepositryInterface $deleteTeacher,
    )
    {
        $this->teacher = $teacher;
        $this->gender = $gender;
        $this->specialty = $specialty;
        $this->setTeacher = $setTeacher;
        $this->updateTeacher = $updateTeacher;
        $this->deleteTeacher = $deleteTeacher;
    }

    public function index()
    {
        $teachers = $this->teacher->getTeacher();
        $genders = $this->gender->getGender();
        $specialties = $this->specialty->getSpecialty();
        return view('teachers.index',compact('teachers','genders','specialties'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        return $this->setTeacher->setTeacher($request);
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
        return $this->updateTeacher->updateTeacher($request);
    }

 
    public function destroy($id)
    {
        return $this->deleteTeacher->deleteTeacher($id);
    }
}
