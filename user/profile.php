<!-- connection --> 
<?php require_once("../config/connection.php"); ?>
<!-- session -->
<?php require_once("../include/session.php"); ?>
<!-- libft -->
<?php require_once("../include/libft.php"); ?>
<!-- php show profile -->
<?php
	$query = 'SELECT * FROM `user` WHERE `user_id`="'.$_SESSION['user_id'].'"';
	$query = $db->prepare($query);
	$query->execute(); 
	$la_case = $query->fetchAll(\PDO::FETCH_ASSOC);
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
	$query = 'SELECT * FROM `picture` WHERE `user_id`="'.$_SESSION['user_id'].'" AND `asProfile` = 1';
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
				<label>Popularity: <?= intval($la_case[0]['popularity']); ?>%</label>
                <div class="progress">	
					<div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?= intval($la_case[0]['popularity']); ?>%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
            </div>

		    <!-- About profile -->
            <div class="col-md-8">
				<div class="my-3 p-3 bg-white rounded box-shadow">
				        <h6 class="border-bottom border-gray pb-2 mb-0">Profile</h6>
				        <!-- personelle infos -->
				        <div class="media text-muted pt-3">
					        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
					            <strong class="d-block text-gray-dark">Personelle Infos</strong>
					        </p>
				        </div>
				        <div class="media text-muted pt-3">
							<div class="form-row">
				                <div class="form-group col-md-4">
			                	    <label>First Name</label>
				                    <input class="form-control" type="text" value="<?php if (isset($la_case[0]['fname'])) echo htmlspecialchars(trim($la_case[0]['fname'])); ?>" disabled>
				                </div>

				                <div class="form-group col-md-4">
			                	    <label>Last Name</label>
				                    <input class="form-control" type="text" value="<?php if (isset($la_case[0]['lname'])) echo htmlspecialchars(trim($la_case[0]['lname'])); ?>" disabled>
				                </div>


				                <div class="form-group col-md-4">
			                	    <label>Email</label>
				                    <input class="form-control" type="email" value="<?php if (isset($la_case[0]['email'])) echo htmlspecialchars(trim($la_case[0]['email'])); ?>" disabled>
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

				                <!-- notification -->
								<div class="form-check">
									<input class="form-check-input" type="checkbox" name="notification" value="1" <?php if ($la_case[0]['notification'] == 1) { echo "checked";} ?> disabled>
									<label class="form-check-label" for="exampleCheck1">Notification</label>
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
	$query5 = 'SELECT * FROM `picture` WHERE `user_id`="'.$_SESSION['user_id'].'"';
	$query5 = $db->prepare($query5);
	$query5->execute();
	$count5 = $query5->rowCount();
    $la_case5 = $query5->fetchAll(\PDO::FETCH_ASSOC);
    $i5=0;
    $result5="";
    while ($count5 > $i5) {
    	$result5 = $result5."

<div class='col-md-2'>
    <div class='card mb-2'>
        <img class='card-img-top rounded' src='".$url.$la_case5[$i5]['imgURL']."'>
    </div>
</div>
					            ";
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
	<a href="<?php echo $url; ?>/user/profile_update.php" 	class="btn btn-primary" role="button">Update Profile</a>
	<a href="<?php echo $url; ?>/user/profile_pic.php" 		class="btn btn-warning" role="button">Update Pictures</a>
	<a href="<?php echo $url; ?>/user/profile_pwd.php"		class="btn btn-danger" 	role="button">Update Password</a>

			    </div>
            </div><!-- End About profile -->
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
			method:"POST",
			data:{action:action},
			success:function(data) {}
		});
	}

	setInterval(function(){ 
		update_user_activity();
	}, 1000);

<?php //} else { ?>

	fetch_user_login_data();

	setInterval(function(){
		fetch_user_login_data();
	}, 3000);

	// fetch user online
	function fetch_user_login_data() {
		var action = "fetch_data";
		var user_o = "<?php echo $_SESSION['user_id']; ?>";
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

<?php //} ?>

});
</script>

<!-- script show maps -->
<?php
	$query6 = 'SELECT * FROM `user` WHERE `user_id`="'.$_SESSION['user_id'].'"';
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