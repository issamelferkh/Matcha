<?php
	session_start();
	// Unset all session variables.
	$_SESSION = array();
	session_destroy();
	header("location:$url/index.php");
?>