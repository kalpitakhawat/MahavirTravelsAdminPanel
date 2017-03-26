<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;
use App\Vehicle;

class VehicleController extends Controller
{
    public $_vt = ["car","family car","Mini Bus","Bus","Slipper Coach Bus","3x2 Bus","2x2 Bus"];
    public function index(){
		 $veh = Vehicle::all();
		 $i=1;
		 return view('pages.vehicle.view')->with("veh",$veh)->with("i",$i);
	}
    public function create( Request $request ){
    	$inputs = Input::all();
    	$t=time();
    	$inputs['created_at']=$t;
    	$inputs['updated_at']=$t; 
    	unset($inputs['_token']);
    	$insert_id = Vehicle::insertGetId($inputs);
        return redirect()->action('VehicleController@index');
    }
    public function edit(Request $request,$id){
        $v = Vehicle::where('v_id',$id)->first();
        //print_r($v);
        return view("pages.vehicle.edit")->with(["veh"=>$v, "_vt" => $this->_vt]);
    }
     public function update( Request $request ){
        $inputs = Input::all();
        $id=$inputs['v_id'];
        print_r($id);
        $t=time();
        $inputs['updated_at']=$t;
        unset($inputs['_token']);
        unset($inputs['v_id']);
        Vehicle::where('v_id',$id)->update($inputs);
        return redirect()->action('VehicleController@index');
    }
    public function delete(Request $request){
        $id=$request['v_id'];
        Vehicle::where('v_id', $id )->delete();
        return redirect()->action('VehicleController@index');
    }

}
