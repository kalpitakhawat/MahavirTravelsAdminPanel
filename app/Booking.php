<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Booking extends Model
{
    protected $table = 'bookings';
    protected $fillable = [
       'c_id',
       'b_time_from',
       'b_time_to',
       'b_from',
       'b_to',
       'is_round_trip',
       'b_price',
       'b_status',
       'remarks',
       'created_at',
       'updated_at'
   ];
}
