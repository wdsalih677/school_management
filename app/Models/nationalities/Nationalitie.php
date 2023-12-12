<?php

namespace App\Models\nationalities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Nationalitie extends Model
{
    
    use HasTranslations;
    use HasFactory;
    protected $table = "nationalities";
    protected $fillable = ['name'];
    protected $translatable = ['name'];
}
