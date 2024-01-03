<?php

namespace App\Models\students;

use App\Models\genders\Gender;
use App\Models\Grades\Grade;
use App\Models\images\Image;
use App\Models\schoolClass\SchoolClass;
use App\Models\sctions\Section;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Student extends Model
{
    use HasFactory;
    use HasTranslations;
        protected $table = "students";
        protected $translatable = ['name'];
        protected $guarded = [];
    //function to get gender
    public function genders(){
        return $this->belongsTo(Gender::class , 'gender_id');
    }

    //function to get grade
    public function grades(){
        return $this->belongsTo(Grade::class , 'grade_id');
    }

    //function to get schoolClasses
    public function schoolClasses(){
        return $this->belongsTo(SchoolClass::class , 'class_id');
    }

    //function to get section 
    public function sections(){
        return $this->belongsTo(Section::class , 'section_id');
    }

    //realationship with images table to add students attachments
    public function images(){
        return $this->morphMany(Image::class, 'imageable');
    }
}
