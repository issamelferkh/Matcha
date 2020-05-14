<!-- connection -->
<?php require_once("../config/connection.php"); ?>
<!-- session -->
<?php require_once("../include/session.php"); ?>
<!-- libft -->
<?php require_once("../include/libft.php"); ?>

<?php
	if(isset($_GET["user"]) && isset($_GET["action"]) && ($_SESSION["token"] === $_GET["token"])) {
		$user_p = $_SESSION["user_id"]; // principal user
		$user_o = htmlspecialchars(trim($_GET["user"])); // other user
		$_GET["action"] === "liked" ? $liked = 1 : $liked = 0;
		$_GET["action"] === "noped" ? $noped = 1 : $noped = 0;
		$_GET["action"] === "reported" ? $reported = 1 : $reported = 0;
		$_GET["action"] === "blocked" ? $blocked = 1 : $blocked = 0;

		// verif if user_p and user_o already exist -> yes update -> no insert
		$query = "SELECT * FROM like_table WHERE user_p=".$user_p." AND user_o = ".$user_o;
        $query = $db->prepare($query);
        $query->execute();
        $count = $query->rowCount();
        $la_case = $query->fetchAll(\PDO::FETCH_ASSOC);
        if ($count > 0) {
			// save report or block if already true
			$la_case[0]["reported"] == 1 ? $new_reported = 1 : $new_reported = $reported;
			$la_case[0]["blocked"] == 1 ? $new_blocked = 1 : $new_blocked = $blocked;

			$query = "UPDATE `like_table` SET `liked`=? ,`noped`=?, `reported`=?, `blocked`=? WHERE `user_p`=? AND `user_o`=? ";
			$query = $db->prepare($query);
			$query->execute([$liked,$noped,$new_reported,$new_blocked,$user_p,$user_o]);
		} else {
			$query2 = 'INSERT INTO `like_table` (`user_p`, `user_o`, `liked`, `noped`, `reported`, `blocked`) VALUES (?,?,?,?,?,?)';
			$query2 = $db->prepare($query2);
			$query2->execute([$user_p,$user_o,$liked,$noped,$reported,$blocked]);
		}

		// check if the users are connected and update it
		// check if user_p like user_o
		$query = "SELECT * FROM like_table WHERE user_p=".$user_p." AND user_o = ".$user_o;
        $query = $db->prepare($query);
        $query->execute();
        $count = $query->rowCount();
        $la_case = $query->fetchAll(\PDO::FETCH_ASSOC);
        if ($count > 0) {
			$la_case[0]["liked"] == 1 ? $flag1 = 1 : $flag1 = 0;
		}
		// check if user_o like user_p
		$query = "SELECT * FROM like_table WHERE user_o=".$user_p." AND user_p = ".$user_o;
        $query = $db->prepare($query);
        $query->execute();
        $count = $query->rowCount();
        $la_case = $query->fetchAll(\PDO::FETCH_ASSOC);
        if ($count > 0) {
			$la_case[0]["liked"] == 1 ? $flag2 = 1 : $flag2 = 0;
		}
		// update connected if user_p and user_o like each other
		if ($flag1 == 1 && $flag2 == 1) {
			echo "flag1=".$flag1." || flag2=".$flag2;
			$connected = 1;
			$query = "UPDATE `like_table` SET `connected`=? WHERE (`user_p`=? AND `user_o`=?) OR (`user_p`=? AND `user_o`=?)";
			$query = $db->prepare($query);
			$query->execute([$connected,$user_p,$user_o,$user_o,$user_p]);
		} 

		// update popularity
			// calcul total (likes + nopes)
			$query = 'SELECT * FROM `like_table` WHERE `user_o`="'.$user_o.'"';
			$query = $db->prepare($query);
			$query->execute();
			$total = $query->rowCount();
			// Avoid Division by zero
			$total == 0 ? $total = 1 : $total = $total;
			// calcul likes
			$query = 'SELECT * FROM `like_table` WHERE `user_o`="'.$user_o.'" AND `liked` = 1';
			$query = $db->prepare($query);
			$query->execute();
			$likes = $query->rowCount();
			// calcul popularity %
			$popularity = $likes/$total*100;
		// update popularity in user table
			$update_popularity = $db->query("UPDATE `user` SET `popularity` = $popularity WHERE `user_id` =".$user_o);

		header("Location: profile_detail.php?id=".$user_o);
	
} else {
	// 404
	// msg csrf detected !
	header('Location: index.php');
}
?>