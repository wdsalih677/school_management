<?php

namespace App\Http\Controllers\sections;

use App\Http\Controllers\Controller;
use App\Models\Grades\Grade;
use App\Models\schoolClass\SchoolClass;
use App\Models\sctions\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class sectionController extends Controller
{

    
    public function index()
    {
        $grades = Grade::with(['sections'])->get();
        $grade_lists = Grade::get();
        return view('sections.section' , compact('grades' , 'grade_lists'));
    }


    

    public function create()
    {
        //
    }


    

    public function store(Request $request)
    {
        // return $request;
        $rules = [
            'name_ar' => 'required',
            'name_en' => 'required',
        ];
        $messages = [
            'name_ar.required' => 'this fild is required',
            'name_en.required' => 'this fild is required',
        ];
        
        $validator = Validator::make($request->all() , $rules , $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        try{
            
            $sections = new Section();

            $sections->name = ['en' => $request->name_en , 'ar' => $request->name_ar];

            $sections->grade_id = $request->grade_id;

            $sections->class_id = $request->class_id;

            $sections->status = 0 ;

            $sections->save();

            toast(trans('main_trans.add_success'),'success');
            return redirect()->route('sections.index');

        }
        catch(\Exception $e)
        {

            return redirect()->back()->withError(['error' => $e->getMessage()]);

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
        // return $request;
        $rules = [
            'name_ar' => 'required',
            'name_en' => 'required',
        ];
        $messages = [
            'name_ar.required' => 'this fild is required',
            'name_en.required' => 'this fild is required',
        ];
        
        $validator = Validator::make($request->all() , $rules , $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        try{
            $sections = Section::findOrFail($request->id);
            $sections->name = ['en'=>$request->name_en , 'ar'=>$request->name_ar];
            $sections->grade_id = $request->grade_id;
            $sections->class_id = $request->class_id;
            $sections->status = $request->status;
            $sections->save();
            toast( trans('main_trans.edit_success') , 'success');
            return redirect()->route('sections.index');
        }
        catch(\Exception $e){
            // return $e;
            return redirect()->back()->withError(['error' => $e->getMessage()]);
        }
    }




    public function destroy($id)
    {
        
        Section::findOrFail($id)->delete();
        toast( trans('main_trans.delete_success') , 'success');
        return redirect()->route('sections.index');
    }

    public function getclasses($id)
    {
        $list_classes = SchoolClass::where("grade_id", $id)->pluck("name", "id");

        return $list_classes;
    }

}
