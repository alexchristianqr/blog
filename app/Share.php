<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    protected $table = 'share';
    protected $fillable = [
        'post_id',
        'url',
        'status',
        'locale',
    ];
}
