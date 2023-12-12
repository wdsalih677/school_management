<?php

namespace App\Models\religions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Religion extends Model
{
    use HasTranslations;
    use HasFactory;
    protected $table = "religions";
    protected $fillable = ['id','name'];
    protected $translatable = ['name'];
}
