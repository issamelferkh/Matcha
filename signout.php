<?php
	session_start();
	// Unset all of the session variables.
	$_SESSION = array();
	session_destroy();
	header("location:https://10.12.100.163/matcha/index.php");
