<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Sms;
class SmsController extends Controller
{
    public function send(Request $request)
    {
    	$num=$request['number'];
    	$msg=$request['msg'];
    	//$r=sms::send($num,$msg);
    	$user_name="mahavir_";
		$password="mahavirtravelssms";
		$id="MAHAVR";
		$vars="user=".$user_name."&passwd=".$password."&senderId=".$id."&recipients=".$num."&message=".$msg;
		$result="";
		$curl=curl_init('http://api.smsbrain.in/1.2/appsms/send.php');

			curl_setopt($curl, CURLOPT_POST,true);
			curl_setopt($curl, CURLOPT_POSTFIELDS,$vars);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
			$result=curl_exec($curl);

			curl_close($curl);
			$result=json_decode($result);
			$result=$result->message;
        	return view("pages.sms.result")->with(["r"=>$result]);
			
    }
    public function show(Request $request)
    {
    		$num=$request['c_mobile'];
        	return view("pages.sms.portal")->with(["num"=>$num]);
    }
}
