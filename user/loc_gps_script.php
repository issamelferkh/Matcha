<!-- connection -->
<?php require_once("../config/connection.php"); ?>
<!-- session -->
<?php require_once("../include/session.php"); ?>


<?php

if (isset($_POST)) {
	echo $_POST["loc"];
	echo $_POST["loc_var"];
	
}

?>