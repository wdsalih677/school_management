<?php

namespace App\Models\Grades;

use App\Models\sctions\Section;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Grade extends Model
{
    protected $table = "grades";

    protected $fillable = ['name','notes'];
    public $translatable = ['name'];
    

    
    use HasTranslations;
    use HasFactory;

    public function sections(){
        return $this->hasMany(Section::class , 'grade_id');
    }
}
