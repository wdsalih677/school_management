<?php

namespace App\Http\Controllers\students;

use App\Http\Controllers\Controller;
use App\Models\bloods\Blood;
use App\Models\genders\Gender;
use App\Models\nationalities\Nationalitie;
use App\Models\parents\StuParent;
use App\Models\schoolClass\SchoolClass;
use Illuminate\Http\Request;

class studentController extends Controller
{
    
    public function index()
    {
        //
    }

    
    public function create()
    {
        $data['schoolClasses'] = SchoolClass::get();
        $data['stu_parents'] = StuParent::get();
        $data['genders'] = Gender::get();
        $data['Nationalities'] = Nationalitie::get();
        $data['bloods'] = Blood::get();
        return view('students.addStudent',$data);
    }

    
    public function store(Request $request)
    {
        return $request;
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
}
