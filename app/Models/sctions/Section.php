<?php

namespace App\Models\sctions;

use App\Models\Grades\Grade;
use App\Models\schoolClass\SchoolClass;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasTranslations;
    use HasFactory;
    protected $table = "sections";
    protected $fillable = ['name' , 'grade_id' , 'class_id' , 'status'];
    public $translatable = ['name'];

    

    public function schoolClasses(){

        return $this->belongsTo(SchoolClass::class , 'class_id');

    }
}
