<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }
    public function media()
    {
        return $this->hasMany(Media::class);
    }
}
