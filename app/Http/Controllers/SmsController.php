<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MyHelpers;
//use Sms;
class SmsController extends Controller
{
    public function send(Request $request)
    {
    	$num=$request['number'];
    	$msg=$request['msg'];
    	//$r=sms::send($num,$msg);
    		$result=MyHelpers::sendSMS($num,$msg);
        	return view("pages.sms.result")->with(["r"=>$result->message]);
			
    }
    public function show(Request $request)
    {
    		$num=$request['c_mobile'];
        	return view("pages.sms.portal")->with(["num"=>$num]);
    }
}
