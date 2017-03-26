<?php
use App\Customer;
	class MyHelpers{
		public static function sendSMS($num='',$msg='')
		{
			$user_name="mahavir_";
			$password="mahavirtravelssms";
			$id="MAHAVR";
			$vars="user=".$user_name."&passwd=".$password."&senderId=".$id."&recipients=".$num."&message=".$msg;
			$curl=curl_init('http://api.smsbrain.in/1.2/appsms/send.php');
			curl_setopt($curl, CURLOPT_POST,true);
			curl_setopt($curl, CURLOPT_POSTFIELDS,$vars);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
			$result=curl_exec($curl);
			curl_close($curl);
			/*$r=json_decode($result);*/
			//$result=$result->message;
			/*$result='{"flag":true,"message":"sent successfully","data":{"batchId":"6247559"}}';*/
			$r=json_decode($result);
			return $r;
		}
		public static function cron()
		{
			/*$inputs['created_at']="";
    		$inputs['updated_at']="";
			$insert_id = Customer::insertGetId($inputs);*/
			$r=MyHelpers::sendSMS('9727331128','Test Message From Cron');
		}
	}
?>