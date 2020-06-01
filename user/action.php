<!-- connection -->
<?php require_once("../config/connection.php"); ?>
<!-- session -->
<?php require_once("../include/session.php"); ?>
<!-- libft -->
<?php require_once("../include/libft.php"); ?>

<?php

// check user id, action and token
if(isset($_GET["user"]) && isset($_GET["action"]) && ($_SESSION["token"] === $_GET["token"])) {
	$user_p = $_SESSION["user_id"]; // principal user
	$user_o = htmlspecialchars(trim($_GET["user"])); // other user
	$_GET["action"] === "liked" ? $liked = 1 : $liked = 0;
	$_GET["action"] === "noped" ? $noped = 1 : $noped = 0;
	$_GET["action"] === "reported" ? $reported = 1 : $reported = 0;
	$_GET["action"] === "blocked" ? $blocked = 1 : $blocked = 0;

// Add (like/nope/report/block) actions /////////////////////////////////////////////////////////////
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
		if ($_GET["action"] === "unblock")
			$new_blocked = 0;

		$query = "UPDATE `like_table` SET `liked`=? ,`noped`=?, `reported`=?, `blocked`=? WHERE `user_p`=? AND `user_o`=? ";
		$query = $db->prepare($query);
		$query->execute([$liked,$noped,$new_reported,$new_blocked,$user_p,$user_o]);
	} else {
		$query2 = 'INSERT INTO `like_table` (`user_p`, `user_o`, `liked`, `noped`, `reported`, `blocked`) VALUES (?,?,?,?,?,?)';
		$query2 = $db->prepare($query2);
		$query2->execute([$user_p,$user_o,$liked,$noped,$reported,$blocked]);
	}

// Add Like AND Like-Back notification /////////////////////////////////////////////////////////////
		// verif if action == like
		if ($liked === 1) {
			$query = "SELECT * FROM like_table WHERE user_p=".$user_o." AND user_o = ".$user_p." AND liked = 1";
			$query = $db->prepare($query);
			$query->execute();
			$count = $query->rowCount();
			$la_case = $query->fetchAll(\PDO::FETCH_ASSOC);
			// verif if user_o already like user_p
			if ($liked ===1 && $count > 0) {
				$noti_text = "Like back your profile";
			} else {
				$noti_text = "Like your profile";
			}
			// recorver 'reciver_name'
			$sql = 'SELECT * FROM `user` WHERE `user_id`="'.$user_o.'"';
			$sql = $db->prepare($sql);
			$sql->execute(); 
			$k = $sql->rowCount();
			$case = $sql->fetchAll(\PDO::FETCH_ASSOC);
			if ($k > 0) {
				$sender_id = $_SESSION['user_id'];
				$sender_name = $_SESSION['fname']." ".$_SESSION['lname'];
				$receiver_id = $case[0]['user_id'];
				$receiver_name = $case[0]['fname']." ".$case[0]['lname'];
			}
			$r_noti = "INSERT INTO `noti` (`sender_id`, `sender_name`, `receiver_id`, `receiver_name`, `noti_text`) VALUES (?,?,?,?,?) ";
			$r_noti = $db->prepare($r_noti);
			$r_noti->execute([$sender_id,$sender_name,$receiver_id,$receiver_name,$noti_text]);
		} 

// update contact list - check connected /////////////////////////////////////////////////////////////
		// check if user_p like user_o
		$query = "SELECT * FROM like_table WHERE user_p=".$user_p." AND user_o = ".$user_o;
		$query = $db->prepare($query);
		$query->execute();
		$count = $query->rowCount();
		$la_case = $query->fetchAll(\PDO::FETCH_ASSOC);
		$flag1 = 0;
		$flag2 = 0;
		if ($count > 0) {
			if ($la_case[0]["liked"] == 0) $flag1++;
			if ($la_case[0]["noped"] == 1) $flag1++;
			if ($la_case[0]["reported"] == 1) $flag1++;
			if ($la_case[0]["blocked"] == 1) $flag1++;
		} else {
			$flag1++;
		}
		// check if user_o like user_p
		$query = "SELECT * FROM like_table WHERE user_o=".$user_p." AND user_p = ".$user_o;
		$query = $db->prepare($query);
		$query->execute();
		$count = $query->rowCount();
		$la_case = $query->fetchAll(\PDO::FETCH_ASSOC);
		if ($count > 0) {
			if ($la_case[0]["liked"] == 0) $flag2++;
			if ($la_case[0]["noped"] == 1) $flag2++;
			if ($la_case[0]["reported"] == 1) $flag2++;
			if ($la_case[0]["blocked"] == 1) $flag2++;
		} else {
			$flag2++;
		}
		// update connected if user_p and user_o like each other
		if ($flag1 === 0 && $flag2 === 0) {
			$connected = 1;
		} else {
			$connected = 0;
		}
		$query = "UPDATE `like_table` SET `connected`=? WHERE (`user_p`=? AND `user_o`=?) OR (`user_p`=? AND `user_o`=?)";
		$query = $db->prepare($query);
		$query->execute([$connected,$user_p,$user_o,$user_o,$user_p]);

// update popularity /////////////////////////////////////////////////////////////
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

// verif if request from profile_detail.php or browsing_out.php /////////////////////////////////////////////////////////////
	if (isset($_GET["link"]) && strpos($_GET["link"], 'profile_detail.php') !== false) {
		header("Location: profile_detail.php?id=".$user_o);
	} else if (isset($_GET["link"]) && strpos($_GET["link"], 'browsing_out.php') !== false) {
		isset($_GET["i"]) && $_GET["i"] !== NULL ? $i = htmlspecialchars(trim(intval($_GET["i"]+1))) : $i = 10; 
		isset($_GET["sort"]) && !empty($_GET["sort"]) ? $sort = htmlspecialchars(trim($_GET["sort"])) : $sort = "default"; 
		isset($_GET["age_min"]) && !empty($_GET["age_min"]) ? $age_min = htmlspecialchars(trim($_GET["age_min"])) : $age_min = 0; 
		isset($_GET["age_max"]) && !empty($_GET["age_max"]) ? $age_max = htmlspecialchars(trim($_GET["age_max"])) : $age_max = 999; 
		isset($_GET["distance_min"]) && !empty($_GET["distance_min"]) ? $distance_min = htmlspecialchars(trim($_GET["distance_min"])) : $distance_min = 0; 
		isset($_GET["distance_max"]) && !empty($_GET["distance_max"]) ? $distance_max = htmlspecialchars(trim($_GET["distance_max"])) : $distance_max = 99999; 
		isset($_GET["popularity_min"]) && !empty($_GET["popularity_min"]) ? $popularity_min = htmlspecialchars(trim($_GET["popularity_min"])) : $popularity_min = 0; 
		isset($_GET["popularity_max"]) && !empty($_GET["popularity_max"]) ? $popularity_max = htmlspecialchars(trim($_GET["popularity_max"])) : $popularity_max = 100; 
		isset($_GET["tag1"]) && !empty($_GET["tag1"]) ? $tag1 = htmlspecialchars(trim($_GET["tag1"])) : $tag1 = "%"; 
		isset($_GET["tag2"]) && !empty($_GET["tag2"]) ? $tag2 = htmlspecialchars(trim($_GET["tag2"])) : $tag2 = "default"; 
		isset($_GET["tag3"]) && !empty($_GET["tag3"]) ? $tag3 = htmlspecialchars(trim($_GET["tag3"])) : $tag3 = "default"; 

		header("Location: browsing_out.php?i=".$i."&sort=".$sort."&distance_min=".$distance_min."&distance_max=".$distance_max."&age_min=".$age_min."&age_max=".$age_max."&popularity_min=".$popularity_min."&popularity_max=".$popularity_max."&tag1=".$tag1."&tag2=".$tag2."&tag3=".$tag3."&token=".$_SESSION['token']);
	}
} else {
	header('Location: ../404.php');
}

?>