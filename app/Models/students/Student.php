<?php

namespace App\Models\students;

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
}
