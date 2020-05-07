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

<!-- select other profile -->
<?php
// valid form from browsing_in.php or browsing_out.php by(like ar nope)
if ((isset($_GET["browsing"]) || isset($_GET["i"])) && ( $_SESSION["token"] === $_GET["token"])){
	// affectations sort or filter variables from browsing_in.php
	isset($_GET["sort"]) && !empty($_GET["sort"]) ? $sort = htmlspecialchars(trim($_GET["sort"])) : $sort = "default"; 
	isset($_GET["age_min"]) && !empty($_GET["age_min"]) ? $age_min = htmlspecialchars(trim($_GET["age_min"])) : $age_min = 0; 
	isset($_GET["age_max"]) && !empty($_GET["age_max"]) ? $age_max = htmlspecialchars(trim($_GET["age_max"])) : $age_max = 999; 
	isset($_GET["distance_min"]) && !empty($_GET["distance_min"]) ? $distance_min = htmlspecialchars(trim($_GET["distance_min"])) : $distance_min = 0; 
	isset($_GET["distance_max"]) && !empty($_GET["distance_max"]) ? $distance_max = htmlspecialchars(trim($_GET["distance_max"])) : $distance_min = 99999; 
	isset($_GET["popularity_min"]) && !empty($_GET["popularity_min"]) ? $popularity_min = htmlspecialchars(trim($_GET["popularity_min"])) : $popularity_min = 0; 
	isset($_GET["popularity_max"]) && !empty($_GET["popularity_max"]) ? $popularity_max = htmlspecialchars(trim($_GET["popularity_max"])) : $popularity_max = 100; 
	isset($_GET["tag1"]) && !empty($_GET["tag1"]) ? $tag1 = htmlspecialchars(trim($_GET["tag1"])) : $tag1 = "%"; 
	isset($_GET["tag2"]) && !empty($_GET["tag2"]) ? $tag2 = htmlspecialchars(trim($_GET["tag2"])) : $tag2 = "default"; 
	isset($_GET["tag3"]) && !empty($_GET["tag3"]) ? $tag3 = htmlspecialchars(trim($_GET["tag3"])) : $tag3 = "default"; 

	// select profiles by sorting and filtering

		if ($sort === "distance") { // sort by location
			$ulati = floatval($_SESSION['auth']['lati']);
			$ulongi = floatval($_SESSION['auth']['longi']);
			$sex_pre = $_SESSION['auth']['sex_pre'];
			$query1 = "	SELECT * FROM `user` WHERE `gender` = '$sex_pre'
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
			} else {
				// if not found result
				// header 404 or not result finding
				header('Location: index.php');
				// echo "aaa";
			} 
		} else if ($sort == "age") { // sort by age
			$sex_pre = $_SESSION['auth']['sex_pre'];
			$query1 = "	SELECT * FROM `user` WHERE `gender` = '$sex_pre' ORDER BY `birthday` ASC";
			$query1 = $db->prepare($query1);
			$query1->execute();
			$count1 = $query1->rowCount();
			if ($count1 > 0) {
				$la_case1 = $query1->fetchAll(\PDO::FETCH_ASSOC);
			} else {
				// if not found result
				// header 404 or not result finding
				header('Location: index.php');
			}
		} else if ($sort == "popularity") { // sort by popularity
			$sex_pre = $_SESSION['auth']['sex_pre'];
			$query1 = "	SELECT * FROM `user` WHERE `gender` = '$sex_pre' ORDER BY popularity DESC";
			$query1 = $db->prepare($query1);
			$query1->execute();
			$count1 = $query1->rowCount();
			if ($count1 > 0) {
				$la_case1 = $query1->fetchAll(\PDO::FETCH_ASSOC);
			} else {
				// if not found result
				// header 404 or not result finding
				header('Location: index.php');  
			}
		} else if ($sort == "tags") { // sort by tags
			$sex_pre = $_SESSION['auth']['sex_pre']; 
			$query1 = "	SELECT * FROM `user` WHERE `gender` = '$sex_pre' ORDER BY tag1 ASC, tag2 ASC, tag3 ASC";
			$query1 = $db->prepare($query1);
			$query1->execute();
			$count1 = $query1->rowCount();
			if ($count1 > 0) {
				$la_case1 = $query1->fetchAll(\PDO::FETCH_ASSOC);
			} else {
				// if not found result
				// header 404 or not result finding
				header('Location: index.php');
			}
		} else { // default sort
			$sex_pre = $_SESSION['auth']['sex_pre'];
			$query1 = "	SELECT * FROM `user` WHERE `gender` = '$sex_pre' ";
			$query1 = $db->prepare($query1);
			$query1->execute();
			$count1 = $query1->rowCount();
			if ($count1 > 0) {
				$la_case1 = $query1->fetchAll(\PDO::FETCH_ASSOC);
			} else {
				// if not found result
				// header 404 or not result finding
				header('Location: index.php');
			}
		}

	// valid if like or nope
	if(isset($_GET["user_p"]) && isset($_GET["user_o"]) && isset($_GET["liked"]) && isset($_GET["noped"]) && ($_SESSION["token"] === $_GET["token"])) {
		// add like or nope to like_table
		$user_p = htmlspecialchars(trim($_GET["user_p"])); // principal user
		$user_o = htmlspecialchars(trim($_GET["user_o"])); // other user
		$liked =  htmlspecialchars(trim($_GET["liked"])); // 1 if liked
		$noped =  htmlspecialchars(trim($_GET["noped"])); // 1 if noped
		$query2 = 'INSERT INTO `like_table` (`user_p`, `user_o`, `liked`, `noped`) VALUES (?,?,?,?)';
        $query2 = $db->prepare($query2);
		$query2->execute([$user_p,$user_o,$liked,$noped]);
		
		// re-calcul popularity
			// calcul total (likes + nopes)
			$query = 'SELECT * FROM `like_table` WHERE `user_o`="'.$user_o.'"';
			$query = $db->prepare($query);
			$query->execute();
			$total = $query->rowCount();
			// calcul likes
			$query = 'SELECT * FROM `like_table` WHERE `user_o`="'.$user_o.'" AND `liked` = 1';
			$query = $db->prepare($query);
			$query->execute();
			$likes = $query->rowCount();
			// calcul popularity %
			$popularity = $likes/$total*100;
		// update popularity in user table
			$update_popularity = $db->query("UPDATE `user` SET `popularity` = $popularity WHERE `user_id` =".$user_o);
	}
	// get next user by identify $i
	if (isset($_GET["i"]) && $count1 > $_GET["i"]) {
		$i = $_GET["i"];
	} else {
		$i = 0;
	}
	// filter by distance
	// $distance = ft_getDistance($_SESSION['auth']['lati'], $_SESSION['auth']['longi'], $la_case1[$i]['lati'], $la_case1[$i]['longi']);
	// while($distance < $distance_min && $distance > $distance_max) {
	// 	$i++;
	// }
	// popularity to int
	$popularity = intval($la_case1[$i]['popularity']);
} else {
	// 404
	// msg csrf detected !
	header('Location: index.php');
}
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
				            <strong class="d-block text-gray-dark">1 Km away</strong>
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
				            <strong class="d-block text-gray-dark">@<?php echo $la_case1[$i]['fname']." ".$la_case1[$i]['lname']; ?></strong>
				        </p>
			        </div>
			        <div class="media text-muted pt-3">
				        <i class="fas fa-book-reader" title="Biography"></i>&nbsp;&nbsp;&nbsp;
				        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
				            <strong class="d-block text-gray-dark">@Biography</strong><?php echo $la_case1[$i]['bio']; ?>
				        </p>
			        </div>
					<!-- online => id = user_login_status -->
			        <div class="media text-muted pt-3" id="user_login_status"></div>
			        <small class="d-block text-right mt-3">
				        <a href="<?php echo $url; ?>/user/profile.php">All Profile</a>
			        </small>
			        <div class="d-flex justify-content-center">
<a href="<?php echo $url; ?>/user/browsing_out.php?
	i=<?php echo $i+1;?>&
	user_p=<?php echo $_SESSION['user_id'];?>&
	user_o=<?php echo $la_case1[$i]['user_id'];?>&
	liked=0&
	noped=1&
	token=<?php echo $_SESSION['token'];?>
	" class="btn btn-danger" role="button">Nope</a>
	&nbsp;&nbsp;&nbsp;
<a href="<?php echo $url; ?>/user/browsing_out.php?
	i=<?php echo $i+1;?>&
	user_p=<?php echo $_SESSION['user_id'];?>&
	user_o=<?php echo $la_case1[$i]['user_id'];?>&
	liked=1&
	noped=&
	token=<?php echo $_SESSION['token'];?>
	" class="btn btn-success" role="button">Like</a>
					</div>
			    </div>
            </div>
        </div>
    </div>
</main>


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
		var user_o = "<?php echo $la_case1[$i]['user_id']; ?>";
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