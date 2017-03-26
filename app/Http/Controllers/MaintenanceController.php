<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Maintenance;

class MaintenanceController extends Controller
{
    public function complete(Request $request)
    {
      $m_id=$request['m_id'];
      return view('pages.vehicle.maintenance.complete')->with('m_id', $m_id);
    }
    public function docomplete(Request $request)
    {
      $input=Input::all();
      $m_id=$input['m_id'];
      unset($input['m_id']);
      unset($input['_token']);
      $input['status']="Completed";
      Maintenance::where('m_id',$m_id)->update($input);
      return redirect()->action('VehicleController@index');
    }
}
