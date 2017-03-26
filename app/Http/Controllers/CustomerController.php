<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Customer;
use App\Booking;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
    	 $cst = Customer::all();
		 $i=1;
		 return view('pages.customer.view')->with("cst",$cst)->with("i",$i);
    }
    public function create(Request $request)
    {
    	$inputs = Input::all();
    	$t=time();
    	$inputs['created_at']=$t;
    	$inputs['updated_at']=$t;
    	unset($inputs['_token']);
    	$insert_id = Customer::insertGetId($inputs);
        return redirect()->action('CustomerController@index');
    }
    public function update(Request $request)
    {
    	$inputs = Input::all();
        $id=$inputs['c_id'];
        print_r($id);
        $t=time();
        $inputs['updated_at']=$t;
        unset($inputs['_token']);
        unset($inputs['c_id']);
        Customer::where('c_id',$id)->update($inputs);
        return redirect()->action('CustomerController@index');
    }
    public function edit(Request $request,$id)
    {
    		$c = Customer::where('c_id',$id)->first();
        //print_r($v);
        return view("pages.customer.edit")->with(["cst"=>$c]);
    }
    public function delete(Request $request)
    {
      $id=$request['c_id'];
      Customer::where('c_id', $id )->delete();
      return redirect()->action('CustomerController@index');
    }
    public function info(Request $request)
    {
        $id=$request['c_id'];
        $cst=Customer::where('c_id',$id)->first();
        $i=1;
        $bkg=Booking::where('c_id',$id)->get();
        return view("pages.customer.info")->with('bkg',$bkg)->with("i",$i)->with('cst',$cst);

    }
}
