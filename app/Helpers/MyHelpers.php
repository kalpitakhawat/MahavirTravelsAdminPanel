<?php
use App\Customer;
use App\Vehicle;
use App\Maintenance;
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
			MyHelpers::checkMaintenance();
			MyHelpers::notify();
			//$r=MyHelpers::sendSMS('9727331128','Test Message From Cron');
		}
		public static function checkMaintenance()
		{
			$v=Vehicle::all();
			foreach ($v as $vt ) {
				$maintenance=Maintenance::where('v_id',$vt->v_id)->first();
				if ($maintenance==null) {
					$maintenance_at=intval($vt->maintenance_at);
					$lastmeter=intval($vt->last_mater);
					$milestone_count=intval($lastmeter/$maintenance_at);
					$milestone_meter=$milestone_count*$maintenance_at;
					$input=array("v_id"=>$vt->v_id,"notification_count"=>3,"notified_at"=>time(),"status"=>"Completed","milestone_count"=>$milestone_count,"milestone_meter"=>$milestone_meter,"description"=>"Initial","completed_at"=>time());
					$m_id=Maintenance::insertgetid($input);

				} else {
					$maintenance=Maintenance::where('v_id', $vt->v_id)->whereRaw('milestone_count = (select max(`milestone_count`) from maintenance where v_id='.$vt->v_id.')')->first();
					$previous_milestone_count=$maintenance->milestone_count;
					$maintenance_at=intval($vt->maintenance_at);
					$lastmeter=intval($vt->last_mater);
					$milestone_count=intval($lastmeter/$maintenance_at);
					if ($milestone_count>$previous_milestone_count) {
						$milestone_meter=$milestone_count*$maintenance_at;
						$input=array("v_id"=>$vt->v_id,"notification_count"=>0,"status"=>"Created","milestone_count"=>$milestone_count,"milestone_meter"=>$milestone_meter);
						$m_id=Maintenance::insertgetid($input);
					}
				}

			}
		}
		public static function notify()
		{
				$maintenance=Maintenance::where('notification_count', '<','3')->get();
				foreach ($maintenance as $m ) {
					$nt_count=intval($m->notification_count);
					if($nt_count==0){
						Maintenance::where('m_id',$m->m_id)->update(array('notified_at' => time() ,'status'=>'notified','notification_count'=>$m->notification_count+1 ));
					}
					else {
						Maintenance::where('m_id',$m->m_id)->update(array('notification_count'=>$m->notification_count+1 ));
					}
					$vid=$m->v_id;
					$veh=Vehicle::where('v_id',$vid)->first();
					$message="".$veh->v_company." ".$veh->v_model." ".$veh->v_number." is ready for maintenance.After maintenance Enter your maintenance log in the system";
					//echo $message;
					MyHelpers::sendSMS('7383145575',$message);
				}
		}
	}
?>
