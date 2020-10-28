<!-- connection -->
<?php require_once("../config/connection.php"); ?>
<!-- session -->
<?php require_once("../include/session.php"); ?>
<!-- libft -->
<?php require_once("../include/libft.php"); ?>
<!-- header -->
<?php include("../include/header.php"); ?>   
<!-- nav -->
<?php include("../include/navbar.php"); ?> 
<!-- check profile is completed -->
<?php include("../include/check_profile.php"); ?> 

<!-- select other profile -->
<?php
// if isset($_GET["browsing"]) -> form from browsing_in.php | orisset($_GET["i"]) from browsing_out.php by(like or nope)
if ((isset($_GET["browsing"]) || isset($_GET["i"])) && ( $_SESSION["token"] === $_GET["token"])){
	// affectations sort or filter variables from browsing_in.php
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

	$ulati = floatval($_SESSION['auth']['lati']);
	$ulongi = floatval($_SESSION['auth']['longi']);
	$sex_pre = $_SESSION['auth']['sex_pre'];
	$user_current = $_SESSION['user_id'];

	// define sexual preference
	if ($_SESSION['auth']['sex_pre'] === 'Other'){
		$sex_pre = "`user`.`sex_pre` = 'Other'";
	} else if ($_SESSION['auth']['gender'] === 'Men' && $_SESSION['auth']['sex_pre'] === 'Men'){
		$sex_pre = "(`user`.`gender` = 'Men' AND `user`.`sex_pre` = 'Men')";
	} else if ($_SESSION['auth']['gender'] === 'Women' && $_SESSION['auth']['sex_pre'] === 'Women'){
		$sex_pre = "(`user`.`gender` = 'Women' AND `user`.`sex_pre` = 'Women')";
	} else if($_SESSION['auth']['gender'] === 'Men' && $_SESSION['auth']['sex_pre'] === 'Women') {
		$sex_pre = "(`user`.`gender` = 'Women' AND `user`.`sex_pre` = 'Men')";
	} else if ($_SESSION['auth']['gender'] === 'Women' && $_SESSION['auth']['sex_pre'] === 'Men'){
		$sex_pre = "(`user`.`gender` = 'Men' AND `user`.`sex_pre` = 'Women')";
	}  
	
	// select profiles by sorting and filtering
		if ($sort === "distance") { // sort by location
			$query = "	SELECT * FROM `user` , `picture` WHERE $sex_pre AND `user`.`user_id` NOT LIKE '$user_current' 
				AND (tag1 LIKE '%".$tag1."%' OR tag1 LIKE '%".$tag2."%' OR tag1 LIKE '%".$tag3."%' 
					OR tag2 LIKE '%".$tag1."%' OR tag2 LIKE '%".$tag2."%' OR tag2 LIKE '%".$tag3."%' 
					OR tag3 LIKE '%".$tag1."%' OR tag3 LIKE '%".$tag2."%' OR tag3 LIKE '%".$tag3."%')
				AND (popularity BETWEEN '$popularity_min' AND '$popularity_max')
				AND `complete_profile` = 1
				AND (age BETWEEN '$age_min' AND '$age_max')
				AND `user`.`user_id` = `picture`.`user_id`
				AND `picture`.`asProfile` = 1
				ORDER BY ((lati-$ulati)*(lati-$ulati)) + ((longi - $ulongi)*(longi - $ulongi)) ASC ";
		} else if ($sort == "age") { // sort by age
			$query = "	SELECT * FROM `user` , `picture` WHERE $sex_pre AND `user`.`user_id` NOT LIKE '$user_current' 
				AND (tag1 LIKE '%".$tag1."%' OR tag1 LIKE '%".$tag2."%' OR tag1 LIKE '%".$tag3."%' 
					OR tag2 LIKE '%".$tag1."%' OR tag2 LIKE '%".$tag2."%' OR tag2 LIKE '%".$tag3."%' 
					OR tag3 LIKE '%".$tag1."%' OR tag3 LIKE '%".$tag2."%' OR tag3 LIKE '%".$tag3."%')
				AND (popularity BETWEEN '$popularity_min' AND '$popularity_max')
				AND `complete_profile` = 1
				AND (age BETWEEN '$age_min' AND '$age_max')
				AND `user`.`user_id` = `picture`.`user_id`
				AND `picture`.`asProfile` = 1
				ORDER BY `age` ASC";
		} else if ($sort == "popularity") { // sort by popularity
			$query = "	SELECT * FROM `user` , `picture` WHERE $sex_pre AND `user`.`user_id` NOT LIKE '$user_current' 
				AND (tag1 LIKE '%".$tag1."%' OR tag1 LIKE '%".$tag2."%' OR tag1 LIKE '%".$tag3."%' 
					OR tag2 LIKE '%".$tag1."%' OR tag2 LIKE '%".$tag2."%' OR tag2 LIKE '%".$tag3."%' 
					OR tag3 LIKE '%".$tag1."%' OR tag3 LIKE '%".$tag2."%' OR tag3 LIKE '%".$tag3."%')
				AND (popularity BETWEEN '$popularity_min' AND '$popularity_max')
				AND `complete_profile` = 1
				AND (age BETWEEN '$age_min' AND '$age_max')
				AND `user`.`user_id` = `picture`.`user_id`
				AND `picture`.`asProfile` = 1
				ORDER BY popularity DESC";
		} else if ($sort == "tags") { // sort by tags
			$query = "	SELECT * FROM `user` , `picture` WHERE $sex_pre AND `user`.`user_id` NOT LIKE '$user_current' 
				AND (tag1 LIKE '%".$tag1."%' OR tag1 LIKE '%".$tag2."%' OR tag1 LIKE '%".$tag3."%' 
					OR tag2 LIKE '%".$tag1."%' OR tag2 LIKE '%".$tag2."%' OR tag2 LIKE '%".$tag3."%' 
					OR tag3 LIKE '%".$tag1."%' OR tag3 LIKE '%".$tag2."%' OR tag3 LIKE '%".$tag3."%')
				AND (popularity BETWEEN '$popularity_min' AND '$popularity_max')
				AND `complete_profile` = 1
				AND (age BETWEEN '$age_min' AND '$age_max')
				AND `user`.`user_id` = `picture`.`user_id`
				AND `picture`.`asProfile` = 1
				ORDER BY tag1 ASC, tag2 ASC, tag3 ASC";
		} else { // default sort
			$query = "	SELECT * FROM `user` , `picture` WHERE $sex_pre AND `user`.`user_id` NOT LIKE '$user_current' 
				AND (tag1 LIKE '%".$tag1."%' OR tag1 LIKE '%".$tag2."%' OR tag1 LIKE '%".$tag3."%' 
					OR tag2 LIKE '%".$tag1."%' OR tag2 LIKE '%".$tag2."%' OR tag2 LIKE '%".$tag3."%' 
					OR tag3 LIKE '%".$tag1."%' OR tag3 LIKE '%".$tag2."%' OR tag3 LIKE '%".$tag3."%')
				AND (popularity BETWEEN '$popularity_min' AND '$popularity_max')
				AND `complete_profile` = 1
				AND (age BETWEEN '$age_min' AND '$age_max')
				AND `user`.`user_id` = `picture`.`user_id`
				AND `picture`.`asProfile` = 1
				";
		}
		$query = $db->prepare($query);
		$query->execute();
		$count = $query->rowCount();
		if ($count > 0) {
			$la_case1 = $query->fetchAll(\PDO::FETCH_ASSOC);
			$i = 0;				         
		} else {
			ft_putmsg('info','Sorry, User not found! Try other filters.','/user/browsing_in.php');
		}
	// get next user by identify $i
	if (isset($_GET["i"]) && $count > $_GET["i"]) {
		$i = $_GET["i"];
	}
} else { // form not valide (token or $i)
	header('Location: ../404.php');
}
?>

<!-- start container -->
<main role="main" class="container">   
	<?php include("../include/title.php"); ?>   
    <div class="my-3 p-3 bg-white rounded box-shadow">
        <div class="row">
			<?php	
	// verif if $count1 > $_GET["i"] && if user in Distance range
if ($count > $_GET["i"]) {
	// affectation vars
	$distance = intval(ft_getDistance($la_case1[$i]['lati'], $la_case1[$i]['longi']),10);
	$distance < 1.00 ? $echo_distance = "In your city" : $echo_distance = intval($distance,10) ." km away."; 
	$profile_pic = $url.$la_case1[$i]['imgURL'];
	$popularity = intval($la_case1[$i]['popularity']);

			
	if ($la_case1[$i]['gender'] == "Men")
		$gender_icon = "venus";
	else if ($la_case1[$i]['gender'] == "Woman")
		$gender_icon = "mars";
	else 
		$gender_icon = "transgender-alt";
			
	if ($distance >= $distance_min && $distance <= $distance_max) {
		echo '
			<!-- Photo profile -->
			<div class="col-md-4">
				<!-- online => id = user_login_status -->
				<div class="media text-muted pt-3" id="user_login_status"></div>
				<div class="my-3 p-3 bg-white rounded box-shadow">
					<img class="card-img-top rounded" src="' .$profile_pic. '">
				</div>
				<label>Popularity: '.$popularity.'%</label>
                <div class="progress">	
					<div class="progress-bar progress-bar-striped" role="progressbar" style="width: '.$popularity.'%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
            </div>

		    <!-- About profile -->
            <div class="col-md-8">
				<div class="my-3 p-3 bg-white rounded box-shadow">

			        <h6 class="border-bottom border-gray pb-2 mb-0">About: '.$la_case1[$i]['fname'].','.$la_case1[$i]['lname'].'</h6>
			        <div class="media text-muted pt-3">
			        	<i class="fas fa-map-marked-alt" title="Distance"></i>&nbsp;&nbsp;&nbsp;
				        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
				            <strong class="d-block text-gray-dark">'.$echo_distance.'.</strong>
				        </p>
			        </div>
			        <div class="media text-muted pt-3">
						<i class="fas fa-'.$gender_icon.'" title="Woman"></i>&nbsp;&nbsp;&nbsp;&nbsp;
				        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
				            <strong class="d-block text-gray-dark">@'.$la_case1[$i]['fname']." ".$la_case1[$i]['lname'].'</strong>
				        </p>
			        </div>
			        <div class="media text-muted pt-3">
				        <i class="fas fa-book-reader" title="Biography"></i>&nbsp;&nbsp;&nbsp;
				        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
				            <strong class="d-block text-gray-dark">@Biography</strong>'.$la_case1[$i]['bio'].'
				        </p>
			        </div>
			        <small class="d-block text-right mt-3">
				        <a href="'.$url.'/user/profile_detail.php?id='.$la_case1[$i]['user_id'].'">All Profile</a>
			        </small>
			        <div class="d-flex justify-content-center">
						<a href="'.$url.'/user/action.php?
							user='.$la_case1[$i]['user_id'].'&
							action=noped&
							token='.$_SESSION['token'].'&
							link='.$_SERVER['SCRIPT_FILENAME'].'&
							i='.$i.'&
							sort='.$sort.'&
							distance_min='.$distance_min.'& 
							distance_max='.$distance_max.'&
							age_min='.$age_min.'&
							age_max='.$age_max.'&
							popularity_min='.$popularity_min.'&
							popularity_max='.$popularity_max.'&
							tag1='.$tag1.'&
							tag2='.$tag2.'&
							tag3='.$tag3.'
							" class="btn btn-danger" role="button">Nope</a>
							&nbsp;&nbsp;&nbsp;

						<a href="'.$url.'/user/action.php?
							user='.$la_case1[$i]['user_id'].'&
							action=liked&
							token='.$_SESSION['token'].'&
							link='.$_SERVER['SCRIPT_FILENAME'].'&
							i='.$i.'&
							sort='.$sort.'&
							distance_min='.$distance_min.'&
							distance_max='.$distance_max.'&
							age_min='.$age_min.'&
							age_max='.$age_max.'&
							popularity_min='.$popularity_min.'&
							popularity_max='.$popularity_max.'&
							tag1='.$tag1.'&
							tag2='.$tag2.'&
							tag3='.$tag3.'
							" class="btn btn-success" role="button">Like</a>
					</div>
			    </div>
            </div>
			';
	} else { // swap to the next profile if Distance not in range
		$i++;
		$next_profile = $url."/user/browsing_out.php?i=".$i."&sort=".$sort."&distance_min=".$distance_min."&distance_max=".$distance_max."&age_min=".$age_min."&age_max=".$age_max."&popularity_min=".$popularity_min."&popularity_max=".$popularity_max."&tag1=".$tag1."&tag2=".$tag2."&tag3=".$tag3."&token=".$_SESSION['token'];
		header('Location: '.$next_profile);
		ob_end_flush(); //Flush (send) the output buffer and turn off output buffering - avoid Cannot modify header information - headers already sent Error
	}
} else { // finish all users founded in the distance range OR filters
	ft_putmsg('info','Sorry, User not found! Try other filters.','/user/browsing_in.php');
}
?>
        </div>
    </div>
</main>

<!-- script to check if user is online -->
<script>
$(document).ready(function(){
	// update user lastonline
	function update_user_activity() {
		var action = 'update_time';
		$.ajax({
			url:"online.php",
			method:"POST",
			data:{action:action},
			success:function(data) {}
		});
	}

	setInterval(function(){ 
		update_user_activity();
	}, 3000);

	// fetch user online	
	function fetch_user_login_data() {
		var action = "fetch_data";
		var user_o = "<?php echo $la_case1[$i]['user_id']; ?>";
		$.ajax({
			url:"online.php",
			method:"POST",
			data:{action:action,
				  user_o:user_o},
			success:function(data) {
				$('#user_login_status').html(data);
			}
		});
	}

	fetch_user_login_data();

	setInterval(function(){
		fetch_user_login_data();
	}, 3000);
});
</script>


<!-- footer -->
<?php include("../include/footer.php"); ?>

<!-- help -->
<!-- 
	user_p = user principal, user logged
	user_o = other users, in browsing or search 
 -->