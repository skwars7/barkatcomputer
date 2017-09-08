<?php
	require_once("../model/modal.php");
	$modal=new modal;
	$conn=new Connection;
	$connection=$conn->connect();
	date_default_timezone_set("asia/calcutta");
	$dt=date('Y-m-d h:i:s');
	session_start();
?>