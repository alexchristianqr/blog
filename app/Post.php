<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = 'post';
    protected $fillable = [
        'kind',
        'blog_id',
        'user_id',
        'author_id',
        'replies_id',
        'name',
        'description',
        'image',
        'published',
        'url',
        'self_link',
        'title',
        'content',
        'status',
    ];

}