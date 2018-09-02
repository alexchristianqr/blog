<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $table = 'portfolio';
    protected $fillable = [
        'name',
        'kind',
        'image',
        'galery',
        'description',
        'status',
    ];
}
