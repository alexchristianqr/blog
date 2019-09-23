<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
   protected $table = 'subscriptions';
   protected $fillable = [
      'fullname',
      'email',
      'date_sent',
      'date_expired',
      'token',
      'confirmed',
      'sent',
      'status',
   ];
}
