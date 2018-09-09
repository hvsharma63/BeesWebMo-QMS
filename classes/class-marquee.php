<?php

class Marquee{

	function __construct()
	{

	}

	public function set_values($title,$size,$color,$old_title,$old_size,$old_color){
		global $wpdb;

		$data=array(
			'title'=>$old_title,
			'size'=>$old_size,
			'color'=>$old_color
		);
		if($title!=""){
			$data['title']=$title;
		}
		if($size!=""){
			$data['size']=$size;
		}
		if($color!=""){
			$data['color']=$color;
		}
		
			
		$wpdb->update('marquee',$data,array('id'=>1));
		
	}

	public function get_values()
	{
		global $wpdb;
		return $wpdb->get_row($wpdb->prepare("SELECT * FROM `marquee` WHERE id=%d",1));
	}
}

?>