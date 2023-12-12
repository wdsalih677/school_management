<?php

namespace App\Models\bloods;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blood extends Model
{
    protected $table = "bloods";
    protected $fillable = ['id','name'];

    use HasFactory;
}
