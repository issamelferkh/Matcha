<?php
	session_start();
	if((isset($_SESSION['username'])) && (isset($_GET['token'])) && ($_GET['token'] === $_SESSION['token'])) {
		// Unset all of the session variables.
		$_SESSION = array();
		session_destroy();
		header("location:https://10.12.100.163/camagru/home.php");
	} else {
		$msg = 'Sorry you can\'t do this !!!';
		header("location:https://10.12.100.163/camagru/user/gallery.php?msg=".$msg."");
	}
?>