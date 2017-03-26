<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;
use App\Vehicle;
use App\Driver;
use App\Trip;
use App\Booking;
use App\Customer;
class TripController extends Controller
{
    public function assign(Request $request)
    {
 		$vt=Vehicle::all();
 		$b_id=$request['b_id'];
 		$drv=Driver::all();
 		return view('pages.booking.trip.assigntrip')->with('_vt',$vt)->with('b_id',$b_id)->with('drv',$drv);
    }
    public function create(Request $request)
    {
    	$input=Input::all();
    	$id=$input['b_id'];
    	$t=time();
    	unset($input['_token']);
    	$t_id=Trip::insertGetId($input);
    	Booking::where('b_id',$id)->update(array('b_status'=>'Trip Assigned','updated_at'=>$t));
        return redirect()->action('BookingController@index');
    }
    public function runtrip(Request $request)
    {
 		$b_id=$request['b_id'];
 		return view('pages.booking.trip.runtrip')->with('b_id',$b_id);

    }
    public function run(Request $request)
    {
      $input=Input::all();
      $id=$input['b_id'];
      $t=time();
      unset($input['b_id']);
      unset($input['_token']);
      unset($input['updated_at']);
      print_r($input);
      $v=Trip::where('b_id', $id)->first();
      $v_id=$v->v_id;
      $vt=Vehicle::where('v_id', $v_id)->first();
      $max_fuel_capacity=floatval($vt->max_fuel_capacity);
      $filled_fuel=floatval($input['filled_fuel']);
      $filled_fuel=($max_fuel_capacity*$filled_fuel)/100;
      $input['filled_fuel']=$filled_fuel;
      Trip::where('b_id',$id)->update(array("v_start_meter" => $input['v_start_meter'] , "filled_fuel" => $input['filled_fuel'] , "fuel_at_trip" => $input['fuel_at_trip']));
      Booking::where('b_id',$id)->update(array('b_status'=>'Trip On The Way','updated_at'=>$t));

      Vehicle::where('v_id', $v_id)->update(array("last_meter"=>$input['v_start_meter']));
      return redirect()->action('BookingController@index');

    }
    public function completetrip(Request $request)
    {
        $b_id=$request['b_id'];
        return view('pages.booking.trip.completetrip')->with('b_id',$b_id);
    }
    public function complete(Request $request)
    {
        $input=Input::all();
        $id=$input['b_id'];
        $t=time();
        unset($input['b_id']);
        unset($input['_token']);
        unset($input['updated_at']);
        print_r($input);
        $v=Trip::where('b_id', $id)->first();
        $v_id=$v->v_id;
        $vt=Vehicle::where('v_id', $v_id)->first();
        $max_fuel_capacity=floatval($vt->max_fuel_capacity);
        $fuel_remaining=floatval($input['fuel_remaining']);
        $fuel_remaining=($max_fuel_capacity*$fuel_remaining)/100;
        $input['fuel_remaining']=$fuel_remaining;
        Trip::where('b_id',$id)->update($input);
        Booking::where('b_id',$id)->update(array('b_status'=>'Completed','updated_at'=>$t));

        Vehicle::where('v_id', $v_id)->update(array("last_meter"=>$input['v_end_meter']));
        return redirect()->action('BookingController@index');
    }
    public function info(Request $request)
    {
        $id=$request['b_id'];
        $bkg=Booking::where('b_id',$id)->get();
        $bkg=$bkg[0];
        $trp=(object) "";
        $vt=(object) "";
        $ct=(object) "";
        $dr=(object) "";
        $avg="";
        $c_id=$bkg['c_id'];
        $ct=Customer::where('c_id',$c_id)->get();

            $ct=$ct[0];
        if($bkg['b_status']!="Booked"){
            $trp=Trip::where('b_id',$id)->get();
            $trp=$trp[0];
            $v_id=$trp['v_id'];
             if ($bkg['b_status']=="Completed") {
                $dst= floatval($trp['v_end_meter'])-floatval($trp['v_start_meter']);
                $fuel=(floatval($trp['filled_fuel'])+floatval($trp['fuel_at_trip']))-floatval($trp['fuel_remaining']);
                $avg=0;
                try {
                    $avg=($dst/$fuel);
                }


                }


            $d_id=$trp['d_id'];


            $vt=Vehicle::where('v_id',$v_id)->get();

            $vt=$vt[0];


            $dr=Driver::where('d_id',$d_id)->get();
            $dr=$dr[0];
        }
        return view('pages.booking.trip.info')->with('bkg',$bkg)->with('trp',$trp)->with('ct',$ct)->with('vt',$vt)->with('dr',$dr)->with('avg',$avg);


    }

}
