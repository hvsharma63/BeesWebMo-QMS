<?php

class Call{
	function __construct()
	{

	}

	public function calldata($id){
		global $wpdb;
		return $wpdb->get_results($wpdb->prepare("SELECT * FROM `call_data` WHERE call_active=%d AND id=%d",1,$id));
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
		$wpdb->query($wpdb->prepare("UPDATE `call_data` SET `user`=%d,`counter`=%d,`call_status`=%d WHERE `token_time`=%s",$user,$counter,0,$min_token));
		header('Location: call.php');
	}
	

	public function reject($user,$dept,$counter)
	{
		global $wpdb;
		$min_token=$wpdb->get_var($wpdb->prepare("SELECT MIN(token_time) FROM `call_data` WHERE `department`=%d AND `counter`=%d",$dept,0));
		$wpdb->query($wpdb->prepare("UPDATE `call_data` SET `user`=%d,`counter`=%d,`call_status`=%d WHERE `token_time`=%s",$user,$counter,1,$min_token));
		header('Location: call.php');
	}

	public function all_calldata(){
		global $wpdb;
		return $wpdb->get_results($wpdb->prepare("SELECT * FROM `call_data` WHERE call_active=%d",1));
	}
}

?>