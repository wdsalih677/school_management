<?php

namespace App\Models\genders;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Gender extends Model
{
    protected $table = "genders";
    protected $guarded = [];
    public $translatable = ['name'];
    use HasTranslations;
    use HasFactory;
}
