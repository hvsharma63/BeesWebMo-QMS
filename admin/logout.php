<?php
require_once '../config.php'; 

// logout function in User Class 
if( $user->logout() ) {
	@ header("Location: login.php");
} else {	
	@ header("Location: index.php");
}