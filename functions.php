<?php
// Write all functions here including add_action and all stuff

function print_rr( $content = "" ) {
	echo "<pre>";
	print_r( $content );
	echo "</pre>";
}


function date2mysql( $date = "", $is_only_date = false ) {		
	if ( $date == "" && $is_only_date ) {
		return "0000-00-00";
	} else if ( $date == "" && ! $is_only_date ) {
		return "0000-00-00 00:00:00";	
	}
	
	$date	= str_replace( "/", "-", $date );
	$date	= str_replace( ".", "-", $date );
	
	if ( $is_only_date ) {
		return date( "Y-m-d", strtotime( $date ) );
	} else {
		return date( "Y-m-d H:i:s", strtotime( $date ) );
	}
}

// Custome Code 


function view_date( $date = "" ) {		
	if ( $date == "" ) {
		return "";
	} 
	if ( $date == "0000-00-00" ||  $date == "0000-00-00 00:00:00" ) {
		return "";
	} 		
	$date	= str_replace( "/", "-", $date );
	$date	= str_replace( ".", "-", $date );
	
	return date( "d-m-Y", strtotime( $date ) );	
}




// Get Current Loged User All Information using Object 
if( ! function_exists( 'get_userinfo' ) ) {
	function get_userinfo( $user_id = "" ) {
		global $wpdb;
		
		if( ! $user_id )
			$user_id = $_SESSION['user_id']; 
		
		if( ! $user_id )
			return array();
			
		$userinfo	= $wpdb->get_row( $wpdb->prepare( "SELECT * FROM users WHERE user_id = %d", $user_id ) );
		
		return $userinfo;	 		
	}
}

// Make Word First Charecter Capital

function uc_words( $word = "" ) {
	global $wpdb;
	
	if( ! $word )
		return false;
	
	return ucwords( $word  ) ;
}

// for trim string

function TrimData( $array )	{
  return trim($array, ' \'"');
}




// Random Password Generate

function random_pass( $length = "6" )
{
		
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-=+?";
    $password = substr(str_shuffle( $chars ),0, $length );
	$password = "pron_".$password;
    return $password;
}




// Function to send email

function send_email($user_mail,$title,$content){

			$to			= $user_mail;
			$subject	= $title;						 
			$body 		= $content;							
			
			// This is headers
			$sender_name	= "pronostiok";
			$sender_email	= "test@test.com";
			$return_email	= "test@test.com";
		
			$headers 	 = "From: ".$sender_name." <".$sender_email.">" . "\r\n";
			$headers 	.= "Reply-To: ".$return_email."" . "\r\n";
			$headers 	.= "Return-Path: ".$return_email."\r\n";
			$headers  	.= "MIME-Version: 1.0\r\n";
			$headers 	.= "Content-type: text/html; charset: utf8\r\n";
			$headers 	.= "X-Mailer: PHP/" . phpversion()."\r\n";
			$headers 	.= "X-Priority: 1 (Highest)\n";
			$headers 	.= "X-MSMail-Priority: High\n";
			$headers 	.= "Importance: High\n";
			$attachments	= array();
			
			wp_mail( $to, $subject, $body, $headers, $attachments );			
				
			return  true;			
}