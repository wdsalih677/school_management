<?php

namespace App\Models\images;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $fillables = ['filename' , 'imageable_id' , 'imageable_type'];
    use HasFactory;

    public function images(){
        return $this->morphTo();
    }
}
