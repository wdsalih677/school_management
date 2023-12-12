<?php

namespace App\Models\parents;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class StuParent extends Model
{
    use HasTranslations;
    use HasFactory;
    protected $table = "stu_parents";
    protected $translatable = ['fa_name','mo_name','fa_job','mo_job'];
    protected $guarded = [];
}
