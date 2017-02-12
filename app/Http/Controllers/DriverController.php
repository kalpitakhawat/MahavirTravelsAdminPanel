<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Driver;
use Illuminate\Support\Facades\Input;

class DriverController extends Controller
{
    public function create(Request $request)
    {
      $inputs = Input::all();
      $t=time();
      $inputs['created_at']=$t;
      $inputs['updated_at']=$t;
      unset($inputs['_token']);
      $insert_id = Driver::insertGetId($inputs);
        return redirect()->action('DriverController@index');
    }
    public function edit(Request $request,$id)
    {
       $d = Driver::where('d_id',$id)->first();
        //print_r($v);
        return view("pages.driver.edit")->with(["drv"=>$d]);
    }
    public function update(Request $request)
    {
      $inputs = Input::all();
      $id=$inputs['d_id'];
      print_r($id);
      $t=time();
      $inputs['updated_at']=$t;
      unset($inputs['_token']);
      unset($inputs['d_id']);
      Driver::where('d_id',$id)->update($inputs);
      return redirect()->action('DriverController@index');
    }
    public function index(Request $request)
    {
      $drv = Driver::all();
      $i=1; 
      date_default_timezone_set('Asia/Kolkata');
     return view('pages.driver.view')->with("drv",$drv)->with("i",$i);
    }
    public function delete(Request $request)
    {
       $id=$request['d_id'];
        Driver::where('d_id', $id )->delete();
        return redirect()->action('DriverController@index');
    }
}
