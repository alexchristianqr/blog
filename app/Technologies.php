<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technologies extends Model
{
    protected $table = 'technologies';
    protected $fillable = [
        'name',
        'status',
    ];
}
