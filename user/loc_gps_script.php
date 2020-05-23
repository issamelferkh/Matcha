<?php require_once("../config/connection.php"); ?>
<?php require_once("../include/session.php"); ?>
<?php require_once("../include/libft.php"); ?>

<?php

// localisation with GPS
if (isset($_POST["lati"]) && isset($_POST["longi"])) {
	$lati = htmlspecialchars($_POST["lati"]);
	$longi = htmlspecialchars($_POST["longi"]);

	$query = "UPDATE `user` SET `lati` = ".$lati.", `longi`=".$longi." WHERE `user_id` =".$_SESSION['user_id'];
	$query = $db->prepare($query);
	$query->execute([$lati,$longi,$_SESSION['user_id']]);

}

// localisation with @ip if GPS disable
if (isset($_POST["action"])) {
    if($_POST["action"] === "noGPS") {
		$query = 'SELECT * FROM `user` WHERE `user_id`="'.$_SESSION['user_id'].'"';
		$query = $db->prepare($query);
		$query->execute();
		$la_case = $query->fetchAll(\PDO::FETCH_ASSOC);
		if ($la_case[0]['lati'] === NULL || $la_case[0]['longi'] === NULL) {
			$json = json_decode(file_get_contents('http://ip-api.com/json'));
			print_r($json);
			$lati = $json->lat;
			$longi =$json->lon;
			$query = "UPDATE `user` SET `lati` = ".$lati.", `longi`=".$longi." WHERE `user_id` =".$_SESSION['user_id'];
			$query = $db->prepare($query);
			$query->execute([$lati,$longi,$_SESSION['user_id']]);
		}
	}
}



?>

