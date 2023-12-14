<?php

namespace App\Models\specialties;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Specialty extends Model
{
    protected $table = "specialties";
    protected $guarded = [];
    public $translatable = ['name'];
    use HasTranslations;
    use HasFactory;
}
