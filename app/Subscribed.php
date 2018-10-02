<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscribed extends Model
{
    protected $table='subscribed';
    protected $fillable=[
        'email'
    ];
}
