<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $table = 'drivers';
    protected $fillable = [
       'b_id',
       'v_id',
       'd_id',
       'b_to_b_vendor',
       'v_start_meter',
       'v_end_meter',
       'filled_fuel',
       'fuel_at_trip',
       'fuel_remaining',
       'v_fuel_avg',
       'payment_from_customer',
       'created_at',
       'updated_at'
   ];
}
