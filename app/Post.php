<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
    protected $fillable = [
      'kind',
      'blog_id',
      'author_id',
      'replies_id',
      'published',
      'url',
      'self_link',
      'title',
      'content',
      'status',
    ];
}
