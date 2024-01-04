<?php

namespace App\Http\Controllers\students;

use App\Http\Controllers\Controller;
use App\Imports\StudentImportClass;
use App\Models\bloods\Blood;
use App\Models\genders\Gender;
use App\Models\Grades\Grade;
use App\Models\images\Image;
use App\Models\nationalities\Nationalitie;
use App\Models\parents\StuParent;
use App\Models\schoolClass\SchoolClass;
use App\Models\sctions\Section;
use App\Models\students\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class studentController extends Controller
{
    
    public function index()
    {
        
        $students = Student::get();
        return view('students.index', compact('students'));
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
        DB::beginTransaction();
        try{
            $students                   = new Student();
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

            if($request->hasfile('photos')){
                foreach( $request->file('photos') as $file){
                    $name = $file->getClientOriginalName();
                    $file -> move( storage_path('app/attachments/students/'.$students->name) , $name );

                    $images = new Image();
                    $images->filename = $name;
                    $images->imageable_id = $students->id ;
                    $images->imageable_type = "App\Models\students";
                    $images->save();
                }
            }
            DB::commit();
            toast(trans('main_trans.add_success'),'success');
            return redirect()->route('students.index');
        }
        catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e ->getMessage()]);
        }
    }

   
    public function show($id)
    {
        $students = Student::findOrFail($id);
        $data['genders'] = Gender::get();
        $data['grades'] = Grade::get();
        $data['schoolClasses'] = SchoolClass::get();
        $data['sections'] = Section::get();
        $data['stu_parents'] = StuParent::get();
        $data['Nationalities'] = Nationalitie::get();
        $data['bloods'] = Blood::get();
        return view('students.showStudents',$data , compact('students'));
    }

    
    public function edit($id)
    {
        $data['genders'] = Gender::get();
        $data['grades'] = Grade::get();
        $data['schoolClasses'] = SchoolClass::get();
        $data['sections'] = Section::get();
        $data['stu_parents'] = StuParent::get();
        $data['Nationalities'] = Nationalitie::get();
        $data['bloods'] = Blood::get();
        $students = Student::findOrFail($id);
        return view('students.editStudents',$data , compact('students'));
    }

    
    public function update(Request $request, $id)
    {
        $students                   = Student::findOrFail($request->id);
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
        toast(trans('main_trans.edit_success'),'success');
        return redirect()->route('students.index');
    }

    
    public function destroy(Request $request)
    {
        Student::destroy($request->id);
        toast(trans('main_trans.delete_success'),'success');
        return redirect()->route('students.index');
    }
    public function getSchoolClass($id){
        $schoolClasses = SchoolClass::where("grade_id", $id)->pluck("name", "id");
        return $schoolClasses;
    }
    public function getSection($id){
        $sections = Section::where("class_id", $id)->pluck("name", "id");
        return $sections;
    }
    public function uploadStudents(Request $request){
        // return $request;
        try {
            
            if ($request->hasFile('studentData')) {
                $file = $request->file('studentData');
                $extension = $file->getClientOriginalExtension();
                $allowedExtensions = ['xls', 'xlsx'];
                if (!in_array($extension, $allowedExtensions)) {
                    throw new \Exception('Invalid file format. Please upload a valid Excel file.');
                }
                $fileName = '2023' . time() . '.' . $extension;
                $file->move(storage_path('app/students'), $fileName);
                Excel::import(new StudentImportClass, storage_path('app/students/' . $fileName));
                return redirect()->route('students.index')->with('success', 'Students imported successfully');
            } else {
                throw new \Exception('No file uploaded. Please choose a file to upload.');
            }
        }  
        catch(\Exception $e){
            return $e;
        }
    }
    public function download_attach($studentName , $fileName){
        return response()->download(storage_path('app/attachments/'.$studentName.'/'.$fileName));
    }

    public function upload_attachment(Request $request){
        if($request->hasFile('photo')){
            foreach( $request->file('photo') as $file){
                $name = $file->getClientOriginalName();
                $file -> move( storage_path('app/attachments/students/'.$request->student_name) , $name );

                $images = new Image();
                $images->filename = $name;
                $images->imageable_id = $request->student_id ;
                $images->imageable_type = "App\Models\students";
                $images->save();
            }
        }
    }
}