<?php

namespace App\Models\schoolClass;

use App\Models\Grades\Grade;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SchoolClass extends Model
{
    protected $table = "school_classes";
    protected $fillable = ['name','grade_id'];
    public $translatable = ['name'];

    use HasTranslations;
    use HasFactory;

    public function grades(){
        return $this->belongsTo(Grade::class , 'grade_id');
    }
}
