<?php

namespace App\Http\Controllers\promotions;

use App\Http\Controllers\Controller;
use App\Models\Grades\Grade;
use App\Models\schoolClass\SchoolClass;
use App\Models\sctions\Section;
use Illuminate\Http\Request;

class promotionController extends Controller
{

    public function index()
    {
        $grades = Grade::get();
        return view('students.pormotions.stuPromotion' , compact('grades'));
    }


    public function create()
    {
        //
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
