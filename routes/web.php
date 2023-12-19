<?php

use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\schoolClass\SchoolClassController;
use App\Http\Controllers\sections\sectionController;
use App\Http\Controllers\students\studentController;
use App\Http\Controllers\teachers\TeacherController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
        Route::get('/', function () {
            return view('auth.login');
        });
        
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard');
        
        Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });

    // ******************************start grades rouutes**********************************//

        Route::resource('grades',GradeController::class);

    // ******************************end grades rouutes************************************//
    
    // ******************************start classroom rouutes**********************************//
    
        Route::resource('school_classrooms', SchoolClassController::class);

        Route::delete('delete_all_class' , [SchoolClassController::class ,'deleteAll'])->name('delete_all_class');

        Route::post('fillterClass' , [SchoolClassController::class , 'fillterClass'])->name('fillterClass');

        
        // ******************************end classroom routes************************************//
        
        // ******************************start sections rouutes**********************************//
        
        Route::resource('sections' , sectionController::class);

        Route::get('classes/{id}' , [sectionController::class , 'getclasses'])->name('classes');

        // ******************************end sections rouutes************************************//
        // ******************************start parents routes************************************//

        Route::view('stuParents','livewire.stu-parents.show-form')->name('stuParents');

        // *******************************end parents routes*************************************//
        // ******************************start teachers routes************************************//

        Route::resource('teachers' , TeacherController::class);

        // *******************************end teachers routes*************************************//
        // ******************************start students routes************************************//

        Route::resource('students' , studentController::class);

        // *******************************end students routes*************************************//
        
    });
require __DIR__.'/auth.php';