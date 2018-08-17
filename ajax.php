<?php
/**
 * WordPress Ajax Process Execution
 *
 * @package WordPress
 * @subpackage Administration
 *
 * @link https://codex.wordpress.org/AJAX_in_Plugins
 */

/**
 * Executing Ajax process.
 *
 * @since 2.1.0
 */
define( 'DOING_AJAX', true );

require_once "config.php";

/** Allow for cross-domain requests (from the front end). */
send_origin_headers();

// Require an action parameter
if ( empty( $_REQUEST['action'] ) )
	die( '0' );

@header( 'Content-Type: text/html; charset=UTF-8' );
@header( 'X-Robots-Tag: noindex' );

send_nosniff_header();
nocache_headers();

do_action( 'ajax_init' );

/**
 * Fires non-authenticated Ajax actions for logged-out users.
 *
 * The dynamic portion of the hook name, `$_REQUEST['action']`,
 * refers to the name of the Ajax action callback being fired.
 *
 * @since 2.8.0
 */
do_action( 'wp_ajax_' . $_REQUEST['action'] );

// Default status
die();