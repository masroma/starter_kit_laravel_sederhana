<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogsModel extends Model
{
    use HasFactory;

    protected $table = "blogs";

    protected $fillable = [
        'title_blogs',
        'slug_blogs',
        'image_blogs',
        'categories_id',
        'content_blogs'
    ];
}
