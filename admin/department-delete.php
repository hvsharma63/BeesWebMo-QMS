<?php
	$page_name = 'index';	
	
	include_once '../config.php';

    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];
        $dept->delete_deptdata($id);
        header('location: department.php');
    }
?>