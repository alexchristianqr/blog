<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Path extends Model
{

    protected $table = 'path';
    protected $fillable = [
        'name',
        'status',
    ];

}
