<?php

	
include_once 'classes/class-user.php';
include_once 'classes/class-call.php';
include_once 'classes/class-department.php';
include_once 'classes/class-counter.php';
include_once 'classes/class-display.php';
include_once 'classes/class-marquee.php';

global $user,$call,$dept,$cnt,$disp,$mrq;

if( ! is_a( $user, 'User' ) )
	$user = new User();

if( ! is_a( $call, 'Call' ) )
	$call = new Call();

if( ! is_a( $dept, 'Department' ) )
	$dept = new Department();

if( ! is_a( $cnt, 'Counter' ) )
	$cnt = new Counter();

if( ! is_a( $disp, 'Display' ) )
	$disp = new Display();

if( ! is_a( $mrq, 'Marquee' ) )
	$mrq = new Marquee();
	

	
