<?php

class Display{

	function __construct()
	{

	}

	public function disp_addtoken($token,$counter){
		global $wpdb;
		$data=array(
			'token' => $token,
			'counter' => $counter,
			'entry_time' => date('h:m:s')
		);
		$wpdb->insert('display',$data);
		$count=$wpdb->get_var("SELECT COUNT(*) FROM `display`");
		if($count>4)
		{
			$token=$wpdb->get_var("SELECT MIN(entry_time) FROM `display`");
			$wpdb->query($wpdb->prepare("DELETE FROM `display` WHERE `entry_time`=%s",$token));
		}
	}

	public function show_display(){
		global $wpdb;
		$token1=$wpdb->get_var("SELECT MAX(entry_time) FROM `display`");
		$token2=$wpdb->get_var($wpdb->prepare("SELECT MAX(entry_time) FROM `display` WHERE `entry_time`!=%s",$token1));

		$token3=$wpdb->get_var($wpdb->prepare("SELECT MAX(entry_time) FROM `display` WHERE `entry_time`!=%s AND `entry_time`!=%s",$token1,$token2));
		$token4=$wpdb->get_var($wpdb->prepare("SELECT MAX(entry_time) FROM `display` WHERE `entry_time`!=%s AND `entry_time`!=%s AND `entry_time`!=%s",$token1,$token2,$token3));


		if($token1!=""){
			$token1_row=$wpdb->get_row($wpdb->prepare("SELECT * FROM `display` WHERE `entry_time`=%s",$token1));	
		}
		else{
			$token1_row="NIL";
		}

		if($token2!=""){
			$token2_row=$wpdb->get_row($wpdb->prepare("SELECT * FROM `display` WHERE `entry_time`=%s",$token2));	
		}
		else{
			$token2_row="NIL";
		}

		if($token3!=""){
			$token3_row=$wpdb->get_row($wpdb->prepare("SELECT * FROM `display` WHERE `entry_time`=%s",$token3));	
		}
		else{
			$token3_row="NIL";
		}

		if($token4!=""){
			$token4_row=$wpdb->get_row($wpdb->prepare("SELECT * FROM `display` WHERE `entry_time`=%s",$token4));	
		}
		else{
			$token4_row="NIL";
		}


		return array(
			'current'=>$token1_row,
			'three'=>$token2_row,
			'two'=>$token3_row,
			'one'=>$token4_row
		);
		
	}


}

?>