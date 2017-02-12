<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
  protected $table = 'drivers';
    protected $fillable = [
       'd_name',
       'd_licence_number',
       'd_mobile',
       'd_address',
       'created_at',
       'updated_at'
   ];
}
