<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;
use App\Booking;
use DB;
class BookingController extends Controller
{
    public function index(Request $request)
    {
    	$bkg = DB::table('bookings')->select("*")->join("customers","bookings.c_id","=","customers.c_id")->get();
		$i=1; 

		return view('pages.booking.view')->with("bkg",$bkg)->with("i",$i);
    }
    public function create(Request $request)
    {
    	$inputs = Input::all();
    	$t=time();
    	$inputs['b_status']="Booked";
    	$inputs['created_at']=$t;
    	$inputs['updated_at']=$t;
    	unset($inputs['_token']);
    	$insert_id = Booking::insertGetId($inputs);
        return redirect()->action('BookingController@index');

    }
    public function update(Request  $request)
    {
    	# code...
    }
    public function edit(Request  $request)
    {
    	# code...
    }
    public function delete(Request $request)
    {
    	$id=$request['b_id'];
        Booking::where('b_id', $id )->delete();
        return redirect()->action('BookingController@index');
    }
}
