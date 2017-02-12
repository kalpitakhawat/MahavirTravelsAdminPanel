<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;
use App\Booking;
use App\Customer;

use DB;
class BookingController extends Controller
{
    public $_vt = ["car","family car","Mini Bus","Bus"];
    public function index(Request $request)
    {
    	$bkg = DB::table('bookings')->select('bookings.*','customers.c_name')->join("customers","bookings.c_id","=","customers.c_id")->get();
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
    	$inputs = Input::all();
        $id=$inputs['b_id'];
        print_r($id);
        $t=time();
        $inputs['updated_at']=$t;
        unset($inputs['_token']);
        unset($inputs['b_id']);
        Booking::where('b_id',$id)->update($inputs);
        return redirect()->action('BookingController@index');
    }
    public function edit(Request  $request,$id)
    {
    	$bkg = DB::table('bookings')->join('customers', function($join) {
                            $join->on('bookings.c_id', '=', 'customers.c_id');
                })->where('bookings.b_id', '=', $id)->get()->toarray();
        $bkg=(object) $bkg[0];
        //print_r($v);
        return view("pages.booking.edit")->with(["bkg"=>$bkg, "_vt" => $this->_vt]);
    }
    public function delete(Request $request)
    {
    	$id=$request['b_id'];
        Booking::where('b_id', $id )->delete();
        return redirect()->action('BookingController@index');
    }
    public function add(Request $request)
    {
        $id=$request['c_id'];
        $c = Customer::where('c_id',$id)->first();
        return view('pages.booking.add')->with("c",$c);

    }
}
