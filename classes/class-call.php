<?php

class Call{

	function __construct()
	{

	}

	public function calldata($id){
		global $wpdb;
		return $wpdb->get_results($wpdb->prepare("SELECT * FROM `call_data` WHERE call_active=%d AND id=%d",1,$id));
	}

	public function callSelectedData($id, $date){
		global $wpdb;
		return $wpdb->get_results($wpdb->prepare("SELECT * FROM `call_data` WHERE call_active=%d AND user=%d AND token_date = %s",1,$id,$date));
	}

	public function callMonthData($id, $sdate, $ldate){
		global $wpdb;
		if($id!=0){
			return $wpdb->get_results($wpdb->prepare("SELECT * FROM `call_data` WHERE call_active=%d AND department = %d AND token_date between %s and %s ",1,$id,$sdate,$ldate));
		}else{
			return $wpdb->get_results($wpdb->prepare("SELECT * FROM `call_data` WHERE call_active=%d AND token_date between %s and %s ",1,$sdate,$ldate));
		}
	}

	public function call_entry($dept,$number,$date,$time)
	{
		global $wpdb;
		$wpdb->query($wpdb->prepare("INSERT INTO `call_data` (`counter`,`department`,`number`,`token_date`,`token_time`) VALUES ('%d','%d','%s','%s','%s')",0,$dept,$number,$date,$time));
	}
	
	public function call_next($user,$dept,$counter)
	{
		global $wpdb;
		$min_token=$wpdb->get_var($wpdb->prepare("SELECT MIN(token_time) FROM `call_data` WHERE `department`=%d AND `counter`=%d",$dept,0));


		$wpdb->query($wpdb->prepare("UPDATE `call_data` SET `user`=%d,`counter`=%d,`call_status`=%d,`called_time` = %s,`called_date` = %s WHERE `token_time`=%s",$user,$counter,0,date('h:m:s'),date('Y-m-d'),$min_token));

		
	}
	

	public function reject($user,$dept,$counter)
	{
		global $wpdb;
		$min_token=$wpdb->get_var($wpdb->prepare("SELECT MIN(token_time) FROM `call_data` WHERE `department`=%d AND `counter`=%d",$dept,0));

		$wpdb->query($wpdb->prepare("UPDATE `call_data` SET `user`=%d,`counter`=%d,`call_status`=%d,`called_time` = %s,`called_date` = %s WHERE `token_time`=%s",$user,$counter,1,date('h:m:s'),date('Y-m-d'),$min_token));
		
		
	}

	public function all_calldata(){
		global $wpdb;
		return $wpdb->get_results($wpdb->prepare("SELECT * FROM `call_data` WHERE call_active=%d",1));
	}

	public function today_queue(){
		global $wpdb;
		return $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM `call_data` WHERE `token_date`=%s",date('Y-m-d')));
	}

	public function today_missed(){
		global $wpdb;
		return $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM `call_data` WHERE `token_date`=%s AND `call_status`=%d",date('Y-m-d'),1));
	}

	public function today_served(){
		global $wpdb;
		return $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM `call_data` WHERE `token_date`=%s AND `call_status`=%d",date('Y-m-d'),0));
	}

	public function queueData(){
		global $wpdb;
		return $wpdb->get_results($wpdb->prepare("SELECT * FROM `call_data` WHERE call_active=%d",1));
	}
}

?>