<?php

class User{
	function __construct()
	{

	}

	public function userdata($id)
	{
		global $wpdb;
		return $wpdb->get_results($wpdb->prepare("SELECT * FROM `user` WHERE id=%d",$id));
	}

	public function all_userdata()
	{
		global $wpdb;
		return $wpdb->get_results("SELECT * FROM `user`");
	}	
}
?>