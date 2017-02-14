<?php

namespace App\Helpers;

class Sms {

    public static function send($num,$msg) {
    	$user_name="mahavir_";
		$password="mahavirtravelssms";
		$id="MAHAVR";
		$vars="user=".$user_name."&passwd=".$password."&senderId=".$id."&recipients=".$num."&message=".$msg;
		$result="";
		if ($_POST["submit"]==true) 
		{

			$curl=curl_init('http://api.smsbrain.in/1.2/appsms/send.php');

			curl_setopt($curl, CURLOPT_POST,true);
			curl_setopt($curl, CURLOPT_POSTFIELDS,$vars);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
			$result=curl_exec($curl);

			curl_close($curl);
		}
		 //http://api.smsbrain.in/1.2/appsms/send.php?user=smsbrain&passwd=smsbrain&senderId=SMSBRN&recipients=9999999999&message=hello 

        return $result;   
    }
}