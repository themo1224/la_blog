<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsToMany(Category::class, 'post_category', 'post_id', 'category_id');
    }
    public function media()
    {
        return $this->belongsToMany(Media::class, 'media_post', 'post_id');
    }
    public function default()
    {
        return $this->belongsTo(Media::class, 'media_id', 'id');
    }
}
