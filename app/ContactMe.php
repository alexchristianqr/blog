<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactMe extends Model
{
   protected $table = 'contact_me';
   protected $fillable = [
      'fullname',
      'phone',
      'email',
      'message',
      'date_sent',
      'sent',
      'status',
   ];
}
