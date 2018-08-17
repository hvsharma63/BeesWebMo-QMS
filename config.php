<?php
if( ! session_id() )
	@ session_start();
	
if( ! defined('SITE_URL') ) 	
	define('SITE_URL', 'http://localhost:81/altair');	// Write URL without /
	
if( ! defined('SITE_DIR') )
	define('SITE_DIR', __DIR__);		// This will return path without /
	
if( ! defined("SITE_TITLE") )
	define("SITE_TITLE", "BeesWebMo");	
	
if( ! defined("SITE_TITLE_SORT") )
	define("SITE_TITLE_SORT", "");	

if( ! defined('AJAX_URL') )
	define('AJAX_URL', SITE_URL . '/ajax.php');

if( ! defined('DB_HOST') )
	define('DB_HOST', "localhost");

if( ! defined('DB_USER') )
	define('DB_USER', "root");

if( ! defined('DB_PASSWORD') ) 
	define('DB_PASSWORD', "");

if( ! defined('DB_NAME') )
	define('DB_NAME', "pronostiok");
	
if( ! defined("AUTH_SALT") )
	define("AUTH_SALT", "RzX6*?HM#Lfb2JujZMyTWP.Kfp{FggQ+IVt~6:aMwO+ky=spPg,/g(wEf;Ek?*~/");	
		
if( ! class_exists('wpdb') )
	require_once SITE_DIR . '/wpcore/load.php';

require_once SITE_DIR . '/functions.php';
	
global $wpdb;

$error_code = array();

//Username, password, db name, server name
$wpdb	= new wpdb(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);

require_once SITE_DIR . "/load.php";	// Load all classes and functions

do_action( "init" );	