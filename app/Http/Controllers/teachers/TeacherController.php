<?php

namespace App\Http\Controllers\teachers;

use App\Http\Controllers\Controller;
use App\Models\genders\Gender;
use App\Models\specialties\Specialty;
use App\Models\teachers\Teacher;
use App\Repositry\teacherRepositryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
   
    public function index()
    {
        $teachers = Teacher::get();
        $genders = Gender::get();
        $specialties = Specialty::get();
        return view('teachers.index',compact('teachers','genders','specialties'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all() ,
            [
                'email' => 'required|email|unique:teachers',
                'password' => 'required|min:4',
                'name_ar' => 'required',
                'name_en' => 'required',
                'joining_date' => 'required',
                'gender_id' => 'required',
                'specialty_id' => 'required',
                'address' => 'required'
            ] ,
            [
                'email.required' => 'this fild is required',
                'password.required' => 'this fild is required',
                'name_ar.required' => 'this fild is required',
                'name_en.required' => 'this fild is required',
                'joining_date.required' => 'this fild is required',
                'gender_id.required' => 'this fild is required',
                'specialty_id.required' => 'this fild is required',
                'address.required' => 'this fild is required',
            ]
        );

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

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
            return $e;
        }
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
        $validator = Validator::make($request->all() ,
            [
                'email' => 'required|email|unique:teachers,email,'.$request->id,
                'password' => 'required|min:4',
                'name_ar' => 'required',
                'name_en' => 'required',
                'joining_date' => 'required',
                'gender_id' => 'required',
                'specialty_id' => 'required',
                'address' => 'required'
            ] ,
            [
                'email.required' => 'this fild is required',
                'password.required' => 'this fild is required',
                'name_ar.required' => 'this fild is required',
                'name_en.required' => 'this fild is required',
                'joining_date.required' => 'this fild is required',
                'gender_id.required' => 'this fild is required',
                'specialty_id.required' => 'this fild is required',
                'address.required' => 'this fild is required',
            ]
        );

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        try{
            $teachers = Teacher::findOrFail($request->id);
            $teachers->name = ['en' => $request->name_en , 'ar' => $request->name_ar];
            $teachers->email = $request->email;
            $teachers->password = Hash::make('password');
            $teachers->joining_date = $request->joining_date;
            $teachers->gender_id = $request->gender_id;
            $teachers->specialty_id = $request->specialty_id;
            $teachers->address = $request->address;
            $teachers->save();
            toast(trans('main_trans.edit_success'),'success');
            return redirect()->route('teachers.index');
        }
        catch(\Exception $e){
            return redirect()->back()->withError(['error' => $e->getMessage()]);
        }
    }

 
    public function destroy($id)
    {
        try{
            Teacher::findOrFail($id)->delete();
            toast(trans('main_trans.delete_success'),'success');
            return redirect()->route('teachers.index');
        }
        catch(\Exception $e){
            return redirect()->back()->withError(['error' => $e->getMessage()]);
        }
    }
}
