<?php
// Write all functions here including add_action and all stuff

function print_rr( $content = "" ) {
	echo "<pre>";
	print_r( $content );
	echo "</pre>";
}

function base64url_encode( $data ) { 
	return rtrim( strtr( base64_encode( $data ), '+/', '-_' ), '=' ); 
}

function base64url_decode( $data ) { 
	return base64_decode( str_pad( strtr( $data, '-_', '+/' ), strlen( $data ) % 4, '=', STR_PAD_RIGHT ) ); 
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



// Get Current Date - Time  
function current_time( $timestamp = false ) {
	if( $timestamp )
		return time();
	else
		return date( "Y-m-d H:i:s" );				
}

// Get Current Date
function current_date() {
	return date( "Y-m-d" );				
}

//  Get Current IP Address
function get_ip() {
	return $_SERVER['REMOTE_ADDR']; 
}

// Get Current User  Agent Properties
function user_agent(){
	return $_SERVER['HTTP_USER_AGENT']; 
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


function makeThumbnail($sourcefile,$max_width, $max_height, $endfile, $type){
// Takes the sourcefile (path/to/image.jpg) and makes a thumbnail from it
// and places it at endfile (path/to/thumb.jpg).

// Load image and get image size.
   
//   
	switch($type){
		case'image/png':
		$img = imagecreatefrompng($sourcefile);
		break;
		case'image/jpeg':
		$img = imagecreatefromjpeg($sourcefile);
		break;
		case'image/gif':
		$img = imagecreatefromgif($sourcefile);
		break;
		default : 
		return 'Un supported format';
	}

	$width = imagesx( $img );
	$height = imagesy( $img );
	
	if ($width > $height) {
		if($width < $max_width)
			$newwidth = $width;
		
		else
		
		$newwidth = $max_width;	
		
		
		$divisor = $width / $newwidth;
		$newheight = floor( $height / $divisor);
	}
	else {
		
		 if($height < $max_height)
			 $newheight = $height;
		 else
			 $newheight =  $max_height;
		 
		$divisor = $height / $newheight;
		$newwidth = floor( $width / $divisor );
	}
	
	// Create a new temporary image.
	$tmpimg = imagecreatetruecolor( $newwidth, $newheight );

    imagealphablending($tmpimg, false);
    imagesavealpha($tmpimg, true);
	
	// Copy and resize old image into new image.
	imagecopyresampled( $tmpimg, $img, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
	
	// Save thumbnail into a file.
	
	//compressing the file
	
	
	switch($type){
		case'image/png':
			imagepng($tmpimg, $endfile, 0);
			break;
		case'image/jpeg':
			imagejpeg($tmpimg, $endfile, 100);
			break;
		case'image/gif':
			imagegif($tmpimg, $endfile, 0);
			break;	
	
	}
	
	// release the memory
   imagedestroy($tmpimg);
   imagedestroy($img);
   
   return true;
}

/****** Get Person Age Using Date Of Birth ********/
function get_age( $dob ) {

	$today = date("Y-m-d");
	$diff = date_diff(date_create($dob), date_create($today));
	return $diff->format('%y');
  
}



/* Store ajax and site url in script variable in all pages 
*  That helps to call ajax file while call operation using AJAX	
*/
function _define_js_variables( $page_name = "" ) {
	
	$defaults	= array(
		'ajax_url'  => AJAX_URL,
		'site_url'	=> SITE_URL
	);
						
	$defaults 	= apply_filters( 'defaults_js_variables', $defaults ); 
	
	if( ! $defaults || ! is_array( $defaults ) )
		return;
	

    echo '<script type="text/javascript">'. PHP_EOL;

	foreach( $defaults as $js_key => $js_var ){
		echo $js_key . ' = "' . $js_var . '";' . PHP_EOL;	
	}

	echo '</script>';							
}

add_action( 'after_haeder_scripts', '_define_js_variables', 10, 1 );


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