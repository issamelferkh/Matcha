<!-- connection --> 
<?php require_once("../config/connection.php"); ?>
<!-- session -->
<?php require_once("../include/session.php"); ?>
<!-- libft --> 
<?php require_once("../include/libft.php"); ?>
<!-- php show profile -->
<?php
	if(isset($_GET["id"])) {
		$user_id = htmlspecialchars(trim($_GET["id"]));
		$query = "SELECT * FROM `user` WHERE `user_id`=".$user_id." AND `complete_profile`=1 ";
		$query = $db->prepare($query);
		$query->execute(); 
        $count = $query->rowCount();
		$la_case = $query->fetchAll(\PDO::FETCH_ASSOC);
		if ($count == 0) {
			header("location: ../404.php");
		}
	} else {
		header("location: ../404.php");
	}
?>

<!-- header -->
<?php include("../include/header.php"); ?>   
<style>
	/* Set the size of the div element that contains the map */
	#map {
	height: 400px;
	width: 100%;
	}
</style>
<!-- nav -->
<?php include("../include/navbar.php"); ?>

<!-- start container -->
<main role="main" class="container">   
	<?php include("../include/title.php"); ?>
    
    <!-- Main -->
    <div class="my-3 p-3 bg-white rounded box-shadow">
        <div class="row">
		    <!-- Photo profile -->
            <div class="col-md-4">
            	<div class="my-3 p-3 bg-white rounded box-shadow">
					<!-- online => id = user_login_status -->
			        <div class="media text-muted pt-3" id="user_login_status"></div>
					<div class="media text-muted pt-3">
				        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
				            <strong class="d-block text-gray-dark">Profile Picture</strong>
				        </p>				        
			        </div>
			    </div>
<!-- php profile picture -->
<?php
	$query = 'SELECT * FROM `picture` WHERE `user_id`="'.$user_id.'" AND `asProfile` = 1';
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
				<label>Popularity: <?php echo intval($la_case[0]['popularity']); ?>%</label>
                <div class="progress">	
					<div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo intval($la_case[0]['popularity']); ?>%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
            </div>

		    <!-- About profile -->
            <div class="col-md-8">
				<div class="my-3 p-3 bg-white rounded box-shadow">
				<?php if(isset($_GET["msg"])) {echo '<div class="alert alert-success" role="alert">'.htmlspecialchars($_GET["msg"]).'</div>';}?>
				        <h6 class="border-bottom border-gray pb-2 mb-0">Profile</h6>
				        <!-- personelle infos -->
				        <div class="media text-muted pt-3">
					        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
					            <strong class="d-block text-gray-dark">Personelle Infos</strong>
					        </p>
				        </div>
				        <div class="media text-muted pt-3">
							<div class="form-row">
				                <div class="form-group col-md-6">
			                	    <label>First Name</label>
				                    <input class="form-control" type="text" value="<?php if (isset($la_case[0]['fname'])) echo htmlspecialchars(trim($la_case[0]['fname'])); ?>" disabled>
				                </div>

				                <div class="form-group col-md-6">
			                	    <label>Last Name</label>
				                    <input class="form-control" type="text" value="<?php if (isset($la_case[0]['lname'])) echo htmlspecialchars(trim($la_case[0]['lname'])); ?>" disabled>
				                </div>


				                <div class="form-group col-md-6">
			                	    <label>Username</label>
				                    <input class="form-control" type="text" value="<?php if (isset($la_case[0]['username'])) echo htmlspecialchars(trim($la_case[0]['username'])); ?>" disabled>
				                </div>
				                
				                <div class="form-group col-md-6">
			                	    <label>Age</label>
				                    <input class="form-control" type="text" value="<?php if (isset($la_case[0]['age'])) echo htmlspecialchars(trim($la_case[0]['age'])); ?>" disabled>
				                </div>

				                <div class="form-group col-md-6">
			                	    <label>Gender</label>
			                	    <input class="form-control" type="text" value="<?php if (isset($la_case[0]['gender'])) echo htmlspecialchars(trim($la_case[0]['gender'])); ?>" disabled>
				                </div>

				                <div class="form-group col-md-6">
			                	    <label>Sexual Preference</label>
				                    <input class="form-control" type="text" value="<?php if (isset($la_case[0]['sex_pre'])) echo htmlspecialchars(trim($la_case[0]['sex_pre'])); ?>" disabled>
				                </div>

				            </div>
				        </div>

				        <!-- tags -->
				        <div class="media text-muted pt-3">
					        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
					            <strong class="d-block text-gray-dark">Interests</strong>
					        </p>
				        </div>
				        <div class="media text-muted pt-3">
						<div class="form-group col-md-4">
								<input class="form-control" type="text" value="<?php if (isset($la_case[0]['tag1'])) echo htmlspecialchars(trim($la_case[0]['tag1'])); ?>" disabled>
							</div>
							<div class="form-group col-md-4">
								<input class="form-control" type="text" value="<?php if (isset($la_case[0]['tag2'])) echo htmlspecialchars(trim($la_case[0]['tag2'])); ?>" disabled>
							</div>
							<div class="form-group col-md-4">
								<input class="form-control" type="text" value="<?php if (isset($la_case[0]['tag3'])) echo htmlspecialchars(trim($la_case[0]['tag3'])); ?>" disabled>
							</div>
				        </div>

				        <!-- Bio -->
				        <div class="media text-muted pt-3">
					        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
					            <strong class="d-block text-gray-dark">Bio</strong>
					        </p>
				        </div>
				        <div class="media text-muted pt-3">
				                <div class="form-group col-md-12">
				                    <input class="form-control" type="text" value="<?php if (isset($la_case[0]['bio'])) echo htmlspecialchars(trim($la_case[0]['bio'])); ?>" disabled>
				                </div>
				        </div>

				        <!-- Pictures -->
				        <div class="media text-muted pt-3">
					        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
					            <strong class="d-block text-gray-dark">Pictures</strong>
					        </p>
				        </div>
				        <div class="media text-muted pt-3">
					        <div class="row">
<!-- php show pictures -->
<?php
	$query5 = 'SELECT * FROM `picture` WHERE `user_id`="'.$user_id.'"';
	$query5 = $db->prepare($query5);
	$query5->execute();
	$count5 = $query5->rowCount();
    $la_case5 = $query5->fetchAll(\PDO::FETCH_ASSOC);
    $i5=0;
    $result5="";
    while ($count5 > $i5) {
    	$result5 = $result5."	<div class='col-md-2'>
									<div class='card mb-2'>
										<img class='card-img-top rounded' src='".$url.$la_case5[$i5]['imgURL']."'>
									</div>
								</div>";
    	$i5++;
    }
    if($count5 > 0) {echo $result5;}
?>
					        </div>
					    </div>
				        
				        <!-- location -->
				        <div class="media text-muted pt-3">
					        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
					            <strong class="d-block text-gray-dark">Location</strong>
					        </p>
				        </div>
				        <div class="media text-muted pt-3">
							<div class="form-group col-md-6">
								<input class="form-control" type="text" value="<?php if (isset($la_case[0]['lati'])) echo htmlspecialchars(trim($la_case[0]['lati'])); ?>" disabled>
							</div>
							<div class="form-group col-md-6">
								<input class="form-control" type="text" value="<?php if (isset($la_case[0]['longi'])) echo htmlspecialchars(trim($la_case[0]['longi'])); ?>" disabled>
							</div>
				        </div>
						<!-- maps location -->
						<div id="map"></div>
						</br>
<a href="<?= $url; ?>/user/action.php?
	user=<?= $la_case[0]['user_id'];?>&
	action=noped&
	token=<?= $_SESSION['token'];?>&
	link=<?= $_SERVER['SCRIPT_FILENAME'];?>
	" class="btn btn-danger" role="button">Nope</a>
	&nbsp;&nbsp;&nbsp;

<a href="<?= $url; ?>/user/action.php?
	user=<?= $la_case[0]['user_id'];?>&
	action=liked&
	token=<?= $_SESSION['token'];?>&
	link=<?= $_SERVER['SCRIPT_FILENAME'];?>
	" class="btn btn-success" role="button">Like</a>
	&nbsp;&nbsp;&nbsp;

<a href="<?php echo $url; ?>/user/action.php? 		
	user=<?= $la_case[0]['user_id'];?>&
	action=reported&
	token=<?= $_SESSION['token'];?>&
	link=<?= $_SERVER['SCRIPT_FILENAME'];?>
	" class="btn btn-warning" role="button" onclick="return confirm('Are you sure you want to Report this user as a “fake account”?');">Report</a>
	&nbsp;&nbsp;&nbsp;

<!-- Block || Unblock -->
<?php
$query7 = "SELECT * FROM like_table WHERE user_p=".$_SESSION["user_id"]." AND user_o = ".$la_case[0]['user_id'];
	$query7 = $db->prepare($query7);
	$query7->execute();
	$count7 = $query7->rowCount();
	$la_case7 = $query7->fetchAll(\PDO::FETCH_ASSOC);
	if ($count7 > 0 && $la_case7[0]["blocked"] == 1) {
		$block_action = "unblock";
		$block_name = "Unblock";
	} else {
		$block_action = "blocked";
		$block_name = "Block";
	}
	
	?>
<a href="<?php echo $url; ?>/user/action.php?
	user=<?= $la_case[0]['user_id'];?>&
	action=<?= $block_action;?>&
	token=<?= $_SESSION['token'];?>&
	link=<?= $_SERVER['SCRIPT_FILENAME'];?>
	" class="btn btn-dark" 	role="button" ><?= $block_name;?></a>
	&nbsp;&nbsp;&nbsp;

<a href="<?= $url; ?>/user/chat.php?
	user=<?= $la_case[0]['user_id'];?>&
	token=<?= $_SESSION['token'];?>
	" class="btn btn-primary" role="button">Chat</a>
	&nbsp;&nbsp;&nbsp;

			    </div>
            </div><!-- End About profile -->
        </div>
    </div>
</main>

<?php
// Add look at your profile notification
	// recorver 'sender_name'
	$sender_id = $_SESSION['user_id'];
	$sender_name = $_SESSION['fname']." ".$_SESSION['lname'];
	$receiver_id = $la_case[0]['user_id'];
	$receiver_name = $la_case[0]['fname']." ".$la_case[0]['lname'];
	$noti_text = "Look at your profile";

	$r_noti = "INSERT INTO `noti` (`sender_id`, `sender_name`, `receiver_id`, `receiver_name`, `noti_text`) VALUES (?,?,?,?,?) ";
	$r_noti = $db->prepare($r_noti);
	$r_noti->execute([$sender_id,$sender_name,$receiver_id,$receiver_name,$noti_text]);

?>
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

	// fetch user online
	setInterval(function(){ 
		update_user_activity();
	}, 3000);

	fetch_user_login_data();

	setInterval(function(){
		fetch_user_login_data();
	}, 3000);

	function fetch_user_login_data() {
		var action = "fetch_data";
		var user_o = "<?php echo $user_id; ?>";
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
});
</script>

<!-- script show maps -->
<?php
	$query6 = 'SELECT * FROM `user` WHERE `user_id`="'.$user_id.'"';
	$query6 = $db->prepare($query6);
	$query6->execute();
	$count6 = $query6->rowCount();
	$la_case6 = $query6->fetchAll(\PDO::FETCH_ASSOC);
	if ($la_case6[0]['lati'] !== NULL && $la_case6[0]['longi'] !== NULL) {
		$lati = $la_case6[0]['lati'];
		$longi = $la_case6[0]['longi'];
	} else {
		$lati = 32.882284;
		$longi = -6.897821;
	}
?>
<script>

// Initialize and add the map
function initMap() {
	// get lati and longi from database with php
	var lati = "<?php echo $lati; ?>";
	var longi = "<?php echo $longi; ?>";

	// String to Number
	lati = Number(lati);
	longi = Number(longi);

	var uluru = {lat: lati, lng: longi};
	// The map, centered 
	var map = new google.maps.Map(
		document.getElementById('map'), {zoom: 12, center: uluru}
	);
	// The marker, positioned
	var marker = new google.maps.Marker({position: uluru, map: map});
}
</script>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDoFl8M_lXel1Lhw2VvyOq1Dblp1-frH_M&callback=initMap">
    // MM src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAiFCibdMN7rF9a8Ei3pQo504GHHDqjBMU&callback=initMap">
</script>

<!-- footer -->
<?php include("../include/footer.php"); ?>