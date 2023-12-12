<?php

namespace App\Models\parents;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentAttachment extends Model
{
    use HasFactory;

    protected $table = "parent_attachment";
    protected $guarded = [];
}
