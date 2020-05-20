<?php		
	include_once('include/libft.php');
	session_start(); 

	if(isset($_GET["token"]) && ($_SESSION["token"] === $_GET["token"])) {
		$_SESSION = array(); // Unset all session variables.
		session_destroy(); // Destroys all data registered to a session
		ft_putmsg('primary','Thanks for using Matcha!','/home.php');
	} else {
		header("location:404.php");
	}
?>