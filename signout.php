<?php
	include_once('include/libft.php');
	session_start();
	// Unset all session variables.
	$_SESSION = array();
	session_destroy();
	ft_putmsg('primary','Thanks for using Matcha!','/home.php');
?>