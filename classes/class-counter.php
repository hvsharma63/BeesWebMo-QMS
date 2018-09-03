<?php

class Counter{

	function __construct()
	{

	}

	public function cntdata($id)
	{
		global $wpdb;
		return $wpdb->get_row($wpdb->prepare("SELECT * FROM `counter` WHERE counter_status=%d AND id=%d",0,$id));
	}
	
	public function all_cntdata()
	{
		global $wpdb;
		return $wpdb->get_results($wpdb->prepare("SELECT * FROM `counter` WHERE counter_status=%d",0));
    }	
    
    public function setCounterName($counterName){
        global $wpdb;
        return $wpdb->query($wpdb->prepare("INSERT INTO counter(counter_name) VALUES(%s)",$counterName));
	}
	
	public function chkCounterName($counterName){
		global $wpdb;
		return $wpdb->get_var($wpdb->prepare("SELECT Count(*) FROM `counter` WHERE counter_name=%s",$counterName));
	}

	public function setUpdatedName($oldId,$newCounterName){
		global $wpdb;
		$wpdb->query($wpdb->prepare("UPDATE `counter` SET counter_name=%s WHERE id=%d",$newCounterName,$oldId));
	}
	
	public function deleteCounter($id){
		global $wpdb;
		$wpdb->query($wpdb->prepare("DELETE FROM `counter` WHERE id=%d",$id));
	}

	public function today_served($counter){
		global $wpdb;
		return $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM `call_data` WHERE `token_date`=%s AND `call_status`=%d AND `counter`=%d",date('Y-m-d'),0,$counter));
	}

	public function yesterday_served($counter){
		global $wpdb;
		return $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM `call_data` WHERE `token_date`=%s AND `call_status`=%d AND `counter`=%d",date('Y-m-d',strtotime("-1 days")),0,$counter));
	}
}
?>