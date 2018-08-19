<?php

class Department{
	function __construct()
	{

	}

	public function deptdata($id)
	{
		global $wpdb;
		return $wpdb->get_row($wpdb->prepare("SELECT * FROM `department` WHERE id=%d",$id));
	}

	public function all_deptdata()
	{
		global $wpdb;
		return $wpdb->get_results("SELECT * FROM `department`");
	}
	
	public function increment_token($id)
	{
		global $wpdb;
		$wpdb->query($wpdb->prepare("UPDATE `department` SET `next_entry`=`next_entry`+1 WHERE id=%d",$id));
	}
}
?>