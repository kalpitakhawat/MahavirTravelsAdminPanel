<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = [
       'c_name',
       'c_mobile',
       'c_address',
       'created_at',
       'updated_at'
   ];
}
