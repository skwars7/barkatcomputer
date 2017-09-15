<?php

	session_start();
	unset($_SESSION['Email']);
	unset($_SESSION['FirstName']);
	unset($_SESSION['ProfileImage']);
	unset($_SESSION['UserID']);
	header("location:index.php");
				        
?>