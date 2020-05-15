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
// valid form from browsing_in.php or browsing_out.php by(like ar nope)
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

	// select profiles by sorting and filtering
		if ($sort === "distance") { // sort by location
			$query1 = "	SELECT * FROM `user` WHERE `gender` = '$sex_pre' AND `user_id` NOT LIKE '$user_current'
				AND (tag1 LIKE '%".$tag1."%' OR tag1 LIKE '%".$tag2."%' OR tag1 LIKE '%".$tag3."%' 
    			  OR tag2 LIKE '%".$tag1."%' OR tag2 LIKE '%".$tag2."%' OR tag2 LIKE '%".$tag3."%' 
    			  OR tag3 LIKE '%".$tag1."%' OR tag3 LIKE '%".$tag2."%' OR tag3 LIKE '%".$tag3."%')
				AND (popularity BETWEEN '$popularity_min' AND '$popularity_max')
				AND (age BETWEEN '$age_min' AND '$age_max')
				ORDER BY ((lati-$ulati)*(lati-$ulati)) + ((longi - $ulongi)*(longi - $ulongi)) ASC ";

			$query1 = $db->prepare($query1);
			$query1->execute();
			$count1 = $query1->rowCount();
			if ($count1 > 0) {
				$la_case1 = $query1->fetchAll(\PDO::FETCH_ASSOC);
				$i = 0;
			} else {
				// if not found result
				// header 404 or not result finding
				header('Location: index.php');
				// echo "aaa";
			} 
		} else if ($sort == "age") { // sort by age
			$query1 = "	SELECT * FROM `user` WHERE `gender` = '$sex_pre' AND `user_id` NOT LIKE '$user_current' 
				AND (tag1 LIKE '%".$tag1."%' OR tag1 LIKE '%".$tag2."%' OR tag1 LIKE '%".$tag3."%' 
    			  OR tag2 LIKE '%".$tag1."%' OR tag2 LIKE '%".$tag2."%' OR tag2 LIKE '%".$tag3."%' 
    			  OR tag3 LIKE '%".$tag1."%' OR tag3 LIKE '%".$tag2."%' OR tag3 LIKE '%".$tag3."%')
				AND (popularity BETWEEN '$popularity_min' AND '$popularity_max')
				AND (age BETWEEN '$age_min' AND '$age_max')
				ORDER BY `age` ASC";

			$query1 = $db->prepare($query1);
			$query1->execute();
			$count1 = $query1->rowCount();
			if ($count1 > 0) {
				$la_case1 = $query1->fetchAll(\PDO::FETCH_ASSOC);
				$i = 0;
			} else {
				// if not found result
				// header 404 or not result finding
				header('Location: index.php');
			}
		} else if ($sort == "popularity") { // sort by popularity
			$query1 = "	SELECT * FROM `user` WHERE `gender` = '$sex_pre' AND `user_id` NOT LIKE '$user_current' 
				AND (tag1 LIKE '%".$tag1."%' OR tag1 LIKE '%".$tag2."%' OR tag1 LIKE '%".$tag3."%' 
    			  OR tag2 LIKE '%".$tag1."%' OR tag2 LIKE '%".$tag2."%' OR tag2 LIKE '%".$tag3."%' 
    			  OR tag3 LIKE '%".$tag1."%' OR tag3 LIKE '%".$tag2."%' OR tag3 LIKE '%".$tag3."%')
				AND (popularity BETWEEN '$popularity_min' AND '$popularity_max')
				AND (age BETWEEN '$age_min' AND '$age_max')
				ORDER BY popularity DESC";

			$query1 = $db->prepare($query1);
			$query1->execute();
			$count1 = $query1->rowCount();
			if ($count1 > 0) {
				$la_case1 = $query1->fetchAll(\PDO::FETCH_ASSOC);
				$i = 0;
			} else {
				// if not found result
				// header 404 or not result finding
				header('Location: index.php');  
			}
		} else if ($sort == "tags") { // sort by tags
			$query1 = "	SELECT * FROM `user` WHERE `gender` = '$sex_pre' AND `user_id` NOT LIKE '$user_current' 
				AND (tag1 LIKE '%".$tag1."%' OR tag1 LIKE '%".$tag2."%' OR tag1 LIKE '%".$tag3."%' 
    			  OR tag2 LIKE '%".$tag1."%' OR tag2 LIKE '%".$tag2."%' OR tag2 LIKE '%".$tag3."%' 
    			  OR tag3 LIKE '%".$tag1."%' OR tag3 LIKE '%".$tag2."%' OR tag3 LIKE '%".$tag3."%')
				AND (popularity BETWEEN '$popularity_min' AND '$popularity_max')
				AND (age BETWEEN '$age_min' AND '$age_max')
				ORDER BY tag1 ASC, tag2 ASC, tag3 ASC";

			$query1 = $db->prepare($query1);
			$query1->execute();
			$count1 = $query1->rowCount();
			if ($count1 > 0) {
				$la_case1 = $query1->fetchAll(\PDO::FETCH_ASSOC);
				$i = 0;
			} else {
				// if not found result
				// header 404 or not result finding
				header('Location: index.php');
			}
		} else { // default sort
			$query1 = "	SELECT * FROM `user` WHERE `gender` = '$sex_pre' AND `user_id` NOT LIKE '$user_current' 
				AND (tag1 LIKE '%".$tag1."%' OR tag1 LIKE '%".$tag2."%' OR tag1 LIKE '%".$tag3."%' 
    			  OR tag2 LIKE '%".$tag1."%' OR tag2 LIKE '%".$tag2."%' OR tag2 LIKE '%".$tag3."%' 
    			  OR tag3 LIKE '%".$tag1."%' OR tag3 LIKE '%".$tag2."%' OR tag3 LIKE '%".$tag3."%')
				AND (popularity BETWEEN '$popularity_min' AND '$popularity_max')
				AND (age BETWEEN '$age_min' AND '$age_max')
				";

			$query1 = $db->prepare($query1);
			$query1->execute();
			$count1 = $query1->rowCount();
			if ($count1 > 0) {
				$la_case1 = $query1->fetchAll(\PDO::FETCH_ASSOC);
				$i = 0;
			} else {
				// if not found result
				// header 404 or not result finding
				// header('Location: index.php');
				echo "aa";
			}
		}
	// get next user by identify $i
	if (isset($_GET["i"]) && $count1 > $_GET["i"]) {
		$i = $_GET["i"];
	}
} else {
	// 404
	// msg csrf detected !
	header('Location: index.php');
}
?>


<?php
	// filter by distance
	$distance = ft_getDistance($la_case1[$i]['lati'], $la_case1[$i]['longi']);
	// verif if $count1 > $_GET["i"] && if user in Distance range
	if ($count1 > $_GET["i"]) {
		// check if user complete here profile
			// check profile informations
			$q_checkprofile = 'SELECT * FROM `user` WHERE `user_id`="'.$la_case1[$i]['user_id'].'"';
			$q_checkprofile = $db->prepare($q_checkprofile);
			$q_checkprofile->execute(); 
			$count1 = $q_checkprofile->rowCount();
			$profile = $q_checkprofile->fetchAll(\PDO::FETCH_ASSOC);
			$flag = 0;
			if ($count1 > 0) {
				if ($profile[0]['username'] === NULL) $flag = 1 ;
				if ($profile[0]['password'] === NULL) $flag = 1 ;
				if ($profile[0]['fname']    === NULL) $flag = 1 ;
				if ($profile[0]['lname']    === NULL) $flag = 1 ;
				if ($profile[0]['email']    === NULL) $flag = 1 ;
				if ($profile[0]['gender']   === NULL) $flag = 1 ;
				if ($profile[0]['sex_pre']  === NULL) $flag = 1 ;
				if ($profile[0]['tag1']     === NULL) $flag = 1 ;
				if ($profile[0]['bio']      === NULL) $flag = 1 ;
				if ($profile[0]['age']      === NULL) $flag = 1 ;
			} else {
				$flag = 1;
			}

			// check profile picture
			$query7 = 'SELECT * FROM `picture` WHERE `user_id`="'.$_SESSION['user_id'].'" AND `asProfile` = 1';
			$query7 = $db->prepare($query7);
			$query7->execute();
			$pic7 = $query7->fetchAll(\PDO::FETCH_ASSOC);
			if (!(isset($pic7[0]['imgURL']))) {
				$flag = 1;
			} 

	if (($distance >= $distance_min && $distance <= $distance_max) && ($flag === 0)){
	// popularity to int
	$popularity = intval($la_case1[$i]['popularity']);
?> 

<!-- start container -->
<main role="main" class="container">   
	<?php include("../include/title.php"); ?>   
    <!-- Main -->
    <div class="my-3 p-3 bg-white rounded box-shadow">
        <div class="row">
		    <!-- Photo profile -->
            <div class="col-md-4">
				<!-- php profile picture -->
				<?php
					$query = 'SELECT * FROM `picture` WHERE `user_id`="'.$la_case1[$i]['user_id'].'" AND `asProfile` = 1';
					$query = $db->prepare($query);
					$query->execute();
					$pic = $query->fetchAll(\PDO::FETCH_ASSOC);
					// check if is set user_o profile profile
					if (isset($pic[0]['imgURL'])) {
						$user_o_pic_profile = $pic[0]['imgURL'];
					} else {
						$user_o_pic_profile = "/assets/img/avatar.png";
					}
					echo "
						<div class='my-3 p-3 bg-white rounded box-shadow'>
							<img class='card-img-top rounded' src='".$url.$user_o_pic_profile."'>
						</div>
					";
				?>
				<label>Popularity: <?=$popularity;?>%</label>
                <div class="progress">	
					<div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?=$popularity;?>%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
            </div>

		    <!-- About profile -->
            <div class="col-md-8">
				<div class="my-3 p-3 bg-white rounded box-shadow">
				<div class="media text-muted pt-3" id="user_login_status"></div>
			        <h6 class="border-bottom border-gray pb-2 mb-0">About: <?=$la_case1[$i]['fname'];?>, <?=$la_case1[$i]['lname'];?></h6>
			        <div class="media text-muted pt-3">
			        	<i class="fas fa-map-marked-alt" title="Distance"></i>&nbsp;&nbsp;&nbsp;
				        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
				            <strong class="d-block text-gray-dark">
								<?php 
									$distance < 1.00 ? $echo_distance = "In your city" : $echo_distance = intval($distance,10) ." km away."; 
									echo $echo_distance;
								?>
							</strong>
				        </p>
			        </div>
			        <div class="media text-muted pt-3">
				        <?php 
				        $gender = "man";
				        if($gender === "man") {
				        	echo "<i class='fas fa-mars' title='Woman'></i>";
				        } else if($gender === "woman") {
				        	echo "<i class='fas fa-venus' title='Man'></i>";
				        }
				         ?>
				        &nbsp;&nbsp;&nbsp;&nbsp;
				        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
				            <strong class="d-block text-gray-dark">@<?= $la_case1[$i]['fname']." ".$la_case1[$i]['lname']; ?></strong>
				        </p>
			        </div>
			        <div class="media text-muted pt-3">
				        <i class="fas fa-book-reader" title="Biography"></i>&nbsp;&nbsp;&nbsp;
				        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
				            <strong class="d-block text-gray-dark">@Biography</strong><?= $la_case1[$i]['bio']; ?>
				        </p>
			        </div>
					<!-- online => id = user_login_status -->
			        <div class="media text-muted pt-3" id="user_login_status"></div>
			        <small class="d-block text-right mt-3">
				        <a href="<?= $url; ?>/user/profile_detail.php?id=<?= $la_case1[$i]['user_id']; ?>">All Profile</a>
			        </small>
			        <div class="d-flex justify-content-center">
<a href="<?= $url; ?>/user/action.php?
	user=<?= $la_case1[$i]['user_id'];?>&
	action=noped&
	token=<?= $_SESSION['token'];?>&
	link=<?= $_SERVER['SCRIPT_FILENAME'];?>&
	i=<?= $i+1;?>&
	sort=<?= $sort;?>&
	distance_min=<?= $distance_min;?>& 
	distance_max=<?= $distance_max;?>&
	age_min=<?= $age_min;?>&
	age_max=<?= $age_max;?>&
	popularity_min=<?= $popularity_min;?>&
	popularity_max=<?= $popularity_max;?>&
	tag1=<?= $tag1;?>&
	tag2=<?= $tag2;?>&
	tag3=<?= $tag3;?>
	" class="btn btn-danger" role="button">Nope</a>
	&nbsp;&nbsp;&nbsp;

<a href="<?= $url; ?>/user/action.php?
	user=<?= $la_case1[$i]['user_id'];?>&
	action=liked&
	token=<?= $_SESSION['token'];?>&
	link=<?= $_SERVER['SCRIPT_FILENAME'];?>&
	i=<?= $i+1;?>&
	sort=<?= $sort;?>&
	distance_min=<?= $distance_min;?>&
	distance_max=<?= $distance_max;?>&
	age_min=<?= $age_min;?>&
	age_max=<?= $age_max;?>&
	popularity_min=<?= $popularity_min;?>&
	popularity_max=<?= $popularity_max;?>&
	tag1=<?= $tag1;?>&
	tag2=<?= $tag2;?>&
	tag3=<?= $tag3;?>
	" class="btn btn-success" role="button">Like</a>
					</div>
			    </div>
            </div>
        </div>
    </div>
</main>

<?php // next profile if Distance not in range
} else {
	$i++;
	$next_profile = $url."/user/browsing_out.php?i=".$i."&sort=".$sort."&distance_min=".$distance_min."&distance_max=".$distance_max."&age_min=".$age_min."&age_max=".$age_max."&popularity_min=".$popularity_min."&popularity_max=".$popularity_max."&tag1=".$tag1."&tag2=".$tag2."&tag3=".$tag3."&token=".$_SESSION['token'];
	header('Location: '.$next_profile);
}
	} else {
		// if not found distance range -> filter
		// header 404 or not result finding
		// header('Location: index.php');
		echo "Mab9ach";
	}
?>

<!-- script to check if user is online -->
<script>
$(document).ready(function(){

<?php //if($_SESSION["username"]) { ?>
	// update user lastonline
	function update_user_activity() {
		var action = 'update_time';
		$.ajax({
			url:"online.php",
			method:"GET",
			data:{action:action},
			success:function(data) {}
		});
	}

	setInterval(function(){ 
		update_user_activity();
	}, 3000);

<?php //} else { ?>

	fetch_user_login_data();

	setInterval(function(){
		fetch_user_login_data();
	}, 3000);

	// fetch user online
	function fetch_user_login_data() {
		var action = "fetch_data";
		var user_o = "<?= $la_case1[$i]['user_id']; ?>";
		$.ajax({
			url:"online.php",
			method:"GET",
			data:{action:action,
				  user_o:user_o},
			success:function(data) {
				$('#user_login_status').html(data);
			}
		});
	}

<?php //} ?>

});
</script>


<!-- footer -->
<?php include("../include/footer.php"); ?>

<!-- help -->
<!-- 
	user_p = user principal, user logged
	user_o = other users, in browsing or search 
 -->