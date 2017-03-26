<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
	 protected $table = 'vehicles';
     protected $fillable = [
        'v_model', 'v_company', 'v_type', 'v_luggage', 'max_fuel-capacity' ,'v_max_passenger', 'last_meter', 'v_number', 'created_at', 'updated_at'
    ];

}
