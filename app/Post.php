<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
    protected $fillable = [
        'kind',
        'user_id',
        'tag_id',
        'path_id',
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
        'created_at',
        'updated_at',
    ];
}