<?php

namespace App\Models\teachers;

use App\Models\genders\Gender;
use App\Models\specialties\Specialty;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Teacher extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $table = "teachers";
    protected $guarded = [];
    protected $translatable =['name'];

    public function genders(){
        return $this->belongsTo(Gender::class , 'gender_id');
    }

    public function specialties(){
        return $this->belongsTo(Specialty::class , 'specialty_id');
    }
}
