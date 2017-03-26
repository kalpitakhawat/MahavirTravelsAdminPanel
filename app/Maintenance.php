<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
  protected $table = 'maintenance';
  public $timestamps = false;
    protected $fillable = [
       'v_id', 'notification_count', 'notified_at','status', 'milestone_count', 'milestone_meter' ,'description','completed_at'
   ];
}
