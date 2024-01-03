<?php

namespace App\Http\Controllers\schoolClass;

use App\Http\Controllers\Controller;
use App\Http\Requests\schooClassRequest;
use App\Models\Grades\Grade;
use App\Models\schoolClass\SchoolClass;
use App\Models\sctions\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SchoolClassController extends Controller
{
    public function index()
    {
        $grades = Grade::get();
        $schoolClasses = SchoolClass::get();
        return view('classrooms.classroom',compact('grades','schoolClasses'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $rules = [
            'class_lists.*.name_ar'  => 'required|unique:school_classes,name->ar',
            'class_lists.*.name_en'  => 'required|unique:school_classes,name->en',
            'class_lists.*.grade_id' => 'required',
        ];
        $messages = [
            'name_ar.required'      => trans('main_trans.required_className_ar'),
            'name_en.required'      => trans('main_trans.required_className_en'),
            'grade_id.required'     => trans('main_trans.required_gradeNotes'),

            'name_ar.unique'        => trans('main_trans.unique_className_ar'),
            'name_en.unique'        => trans('main_trans.unique_className_en'),
        ];

        $validator = Validator::make($request->all(),$rules ,$messages);
        if($validator -> fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $class_lists = $request->class_lists;
        

        try{
            foreach($class_lists as $class_list){

                $schoolClasses = new SchoolClass();

                $schoolClasses->name = ['en' => $class_list['name_en'] , 'ar' => $class_list['name_ar'] ];

                $schoolClasses->grade_id = $class_list['grade_id'];

                $schoolClasses->save();
            }
            toast(trans('main_trans.add_success') , 'success');

            return redirect()->route('school_classrooms.index');
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
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
        $rules = [
            'class_lists.*.name_ar'  => 'required|unique:school_classes,name->ar,'.$id,
            'class_lists.*.name_en'  => 'required|unique:school_classes,name->en,'.$id,
            'class_lists.*.grade_id' => 'required|unique:school_classes,grade_id,'.$id,
        ];
        $messages = [
            'name_ar.required'      => trans('main_trans.requied_className_ar'),
            'name_en.required'      => trans('main_trans.requied_className_en'),
            'grade_id.required'     => trans('main_trans.requied_gradeNotes'),

            'name_ar.unique'        => trans('main_trans.unique_className_ar'),
            'name_en.unique'        => trans('main_trans.unique_className_en'),
            'grade_id.unique'       => trans('main_trans.unique_gradeNotes'),
        ];

        $validator = Validator::make($request->all(),$rules ,$messages);
        if($validator -> fails()){
            redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $class_lists = $request->class_lists;

        try{

            foreach($class_lists as $class_list){

                $schoolClasses = SchoolClass::findOrFail($request->id);

                $schoolClasses->update([

                    $schoolClasses->name = ['en' => $class_list['name_en'] , 'ar' => $class_list['name_ar']],

                    $schoolClasses->grade_id = $class_list['grade_id'],

                ]);

            }

            toast(trans('main_trans.edit_success'), 'success');

            return redirect()->route("school_classrooms.index");

        }

        catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }

    }

    public function destroy( Request $request ,$id)
    {
        $sections = Section::where('class_id',$request->id)->pluck('class_id');

        if($sections->count() == 0){

            SchoolClass::findOrFail($id)->delete();
    
            toast(trans('main_trans.delete_success') , 'success');
    
           return redirect()->route('school_classrooms.index');     
        }else{
            toast(trans('main_trans.deleteSectionHasClass'), 'error');
            return redirect()->route('school_classrooms.index');
        }

         
    }

    public function deleteAll(Request $request){

        $deleleAllId = explode(',',$request->delete_all_id);

        SchoolClass::whereIn('id',$deleleAllId)->delete();

        toast(trans('main_trans.delete_success') , 'success');

        return redirect()->route("school_classrooms.index");
    }

    public function fillterClass(Request $request){

        $grades = Grade::get();

        $searchClass = SchoolClass::where('grade_id' , $request->grade_id)->get();

        return view("classrooms.classroom" , compact('grades' , 'searchClass'));
    }
}
