<?php

namespace App\Http\Controllers\Grades;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use App\Http\Requests\GradeRequest;
use App\Models\Grades\Grade;
use App\Models\schoolClass\SchoolClass;
use Illuminate\Http\Request;


class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::get();
        return view('grades.index',compact('grades'));
    }

    public function create()
    {
        //
    }

    public function store(GradeRequest $request)
    {
        // if(Grade::where('name->en', $request->name_en)->orWhere('name->ar',$request->name_ar)->exists()){
        //     toast(trans('main_trans.error_required'),'error');
        //     return redirect()->route('grades.index');
        // }
        try{
            $validated = $request->validated();
            $grades = new Grade();
            $grades->name = ['en'=> $request->name_en ,'ar'=> $request->name_ar];
            $grades->notes = $request->notes;
            $grades->save();
            toast(trans('main_trans.add_success'),'success');
            return redirect()->route('grades.index');
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

    public function update(GradeRequest $request, $id)
    {
        try{
            $validated = $request->validated();
        $grades = Grade::findOrFail($request->id);
        $grades->update([
            $grades->name = ['en'=> $request->name_en ,'ar'=> $request->name_ar],
            $grades->notes = $request->notes,
        ]);
        toast(trans('main_trans.edit_success'),'success');
        return redirect()->route('grades.index');
        }
        catch(\Exception $e){
            return redirect()->back()->withError(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        $schoolClass = SchoolClass::where('grade_id',$request->id)->pluck('grade_id');

        if($schoolClass -> count() == 0){

            Grade::findOrFail($request->id)->delete();

            toast(trans('main_trans.delete_success'),'success');

            return redirect()->route('grades.index'); 

        }else{
            toast(trans('main_trans.deleteGradeHasClassroom'),'error');
            return redirect()->route('grades.index');
        }
        
    }
}
