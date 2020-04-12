<!-- connection -->
<?php require_once("../config/connection.php"); ?>
<!-- session -->
<?php require_once("../include/session.php"); ?>

<?php

// from ipinfo

		$info = json_decode(file_get_contents("http://ipinfo.io/"), true);
		// print_r($info);
		// echo "</br>Loc: ".$info['loc'];
		// echo "</br>City: ".$info['city'];
		// return $info['loc'];

		if (!empty($info['loc'])) {
			$loc = $info['loc'];
			$query = "UPDATE `user` SET `loc`=? WHERE `user_id`=?";
			$query = $db->prepare($query);
			$query->execute([$loc,$_SESSION['user_id']]);
			$_SESSION["loc"] = $loc;
		}
