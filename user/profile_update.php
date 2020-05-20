<!-- connection -->
<?php require_once("../config/connection.php"); ?>
<!-- session -->
<?php require_once("../include/session.php"); ?>
<!-- libft -->
<?php require_once("../include/libft.php"); ?>
<!-- php update profile -->
<?php
if(isset($_POST['update_profile'])) {
	if(isset($_POST["token"]) && ($_SESSION["token"] === $_POST["token"])) {
		if(empty($_POST["fname"]) || empty($_POST["lname"]) || empty($_POST["email"]) || empty($_POST["username"]) || empty($_POST["age"]) 
		|| empty($_POST["gender"]) || empty($_POST["sex_pre"]) || empty($_POST["tag1"]) || empty($_POST["bio"]) ) {
			ft_putmsg('danger','All fields are required.','/user/profile_update.php');
		} else {
			if(isset($_POST['notification']) && $_POST['notification'] == 1) {
				$notification = 1;
			} else {
				$notification = 0;
			}

			// affectations
			$fname = htmlspecialchars(trim($_POST["fname"]));
			$lname = htmlspecialchars(trim($_POST["lname"]));
			$email = htmlspecialchars(trim($_POST["email"]));
			$username = htmlspecialchars(trim($_POST["username"]));
			$age = htmlspecialchars(trim($_POST["age"])); 
			$gender = htmlspecialchars(trim($_POST["gender"])); 
			$sex_pre = htmlspecialchars(trim($_POST["sex_pre"])); 
			$tag1 = htmlspecialchars(trim($_POST["tag1"])); 
			$tag2 = htmlspecialchars(trim($_POST["tag2"])); 
			$tag3 = htmlspecialchars(trim($_POST["tag3"])); 
			$bio = htmlspecialchars(trim($_POST["bio"]));
			$lati = htmlspecialchars($_POST["lati"]);
			$longi = htmlspecialchars($_POST["longi"]);
			
			// check email
			$emailcheck = preg_match('(^[a-zA-Z0-9.!#$%&\'*+/=?^_`{|}~-]+@[a-zA-Z0-9.!#$%&\'*+/=?^_`{|}~-]*$)', $email); 

			if ($age < 18) {
				ft_putmsg('danger','Your age is under 18 years!','/user/profile_update.php');
			} else if ((strlen($fname) > 50) || (strlen($fname) < 3)){
				ft_putmsg('danger','Invalid First name. First name must be between 3 and 50 characters.','/user/profile_update.php');
			} else if ((strlen($lname) > 50) || (strlen($lname) < 3)){
				ft_putmsg('danger','Invalid Last name. Last name must be between 3 and 50 characters.','/user/profile_update.php');
			} else if (strlen($email) > 320){
				ft_putmsg('danger','Invalid email. Email must be less than 320 characters.','/user/profile_update.php');
			} else if (!($emailcheck)) {
				ft_putmsg('danger','Invalid email format.','/user/profile_update.php');
			} else if ((strlen($username) > 50) || (strlen($username) < 5)){
				ft_putmsg('danger','Invalid username. Username must be between 5 and 50 characters.','/user/profile_update.php');
			} else {
				$query = 'SELECT * FROM user WHERE username="'.$username.'" AND user_id !="'.$_SESSION['user_id'].'" OR email="'.$email.'" AND user_id !="'.$_SESSION['user_id'].'"';
				$query = $db->prepare($query);
				$query->execute();
				$count = $query->rowCount();
				if ($count > 0) {
					ft_putmsg('warning','Username OR email is already taken!','/user/profile_update.php');
				} else {
					// update profile query
					$query = "UPDATE `user` SET `fname`=?, `lname`=?, `email`=? ,`username`=?, `age`=?, `gender`=?, `sex_pre`=?, `tag1`=?, `tag2`=?, `tag3`=?, `bio`=?, `lati`=?, `longi`=?, `notification`=? WHERE `user_id`=?";
					$query = $db->prepare($query);
					$query->execute([$fname,$lname,$email,$username,$age,$gender,$sex_pre,$tag1,$tag2,$tag3,$bio,$lati,$longi,$notification,$_SESSION['user_id']]);
					// update SESSIONS
					$_SESSION["username"] = $username;
					$_SESSION['auth']['sex_pre'] = $sex_pre;
					ft_putmsg('success','Your profile was successfully updated.','/user/profile.php');
				}
			}
		}
	} else {
		header("location: ../404.php");
	}
}
?>

<!-- php show profile selected -->
<?php
	$query = 'SELECT * FROM `user` WHERE `user_id`="'.$_SESSION['user_id'].'"';
	$query = $db->prepare($query);
	$query->execute();
	$la_case = $query->fetchAll(\PDO::FETCH_ASSOC);
?>
<!-- header -->
<?php include("../include/header.php"); ?>   
<!-- nav -->
<?php include("../include/navbar.php"); ?>

<!-- autocompete tags -->
<script>
        $(document).ready(function(){ 
        	$("#tag1").autocomplete({source: "tag_autocomplete.php"}); 
        	$("#tag2").autocomplete({source: "tag_autocomplete.php"}); 
        	$("#tag3").autocomplete({source: "tag_autocomplete.php"}); 
        });
</script>

<!-- start container -->
<main role="main" class="container">   
	<?php include("../include/title.php"); ?>
    
    <!-- Main -->
    <div class="my-3 p-3 bg-white rounded box-shadow">
        <div class="row">
		    <!-- Photo profile -->
            <div class="col-md-4">
            	<div class="my-3 p-3 bg-white rounded box-shadow">
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
            </div>

		    <!-- About profile -->
            <div class="col-md-8">
				<div class="my-3 p-3 bg-white rounded box-shadow">
					<form method="POST" action="profile_update.php">
						<input type="hidden"    name="token"        value="<?php echo $_SESSION['token']; ?>">
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
				                    <input class="form-control" type="text" name="fname" value="<?php if (isset($la_case[0]['fname'])) echo htmlspecialchars(trim($la_case[0]['fname'])); ?>" placeholder="First Name" required>
				                </div>

				                <div class="form-group col-md-4">
			                	    <label>Last Name</label>
				                    <input class="form-control" type="text" name="lname" value="<?php if (isset($la_case[0]['lname'])) echo htmlspecialchars(trim($la_case[0]['lname'])); ?>" placeholder="Last Name" required>
				                </div>


				                <div class="form-group col-md-4">
			                	    <label>Email</label>
				                    <input class="form-control" type="email" name="email" value="<?php if (isset($la_case[0]['email'])) echo htmlspecialchars(trim($la_case[0]['email'])); ?>"    placeholder="Email" required>
				                </div>

				                <div class="form-group col-md-6">
			                	    <label>Username</label>
				                    <input class="form-control" type="text" name="username" value="<?php if (isset($la_case[0]['username'])) echo htmlspecialchars(trim($la_case[0]['username'])); ?>" placeholder="Username" required>
				                </div>
				                
				                <div class="form-group col-md-6">
			                	    <label>Age</label>
				                    <input class="form-control" type="text" name="age" value="<?php if (isset($la_case[0]['age'])) echo htmlspecialchars(trim($la_case[0]['age'])); ?>"    placeholder="Age" required>
				                </div>

				                <div class="form-group col-md-6">
			                	    <label>Choose your Gender</label>
				                    <select class="form-control" name="gender">
										<?php if (isset($la_case[0]['gender'])) echo '<option value="'.htmlspecialchars(trim($la_case[0]['gender'])).'">'.htmlspecialchars(trim($la_case[0]['gender']))."</option>" ; ?>
										<option value="Men" >Men</option>
										<option value="Women" >Women</option>
										<option value="Other" >Other</option>
									</select>
				                </div>

				                <div class="form-group col-md-6">
			                	    <label>Sexual Preference</label>
				                    <select class="form-control" name="sex_pre">
										<?php if (isset($la_case[0]['sex_pre'])) echo '<option value="'.htmlspecialchars(trim($la_case[0]['sex_pre'])).'">'.htmlspecialchars(trim($la_case[0]['sex_pre']))."</option>" ; ?>
										<option value="Men" >Men</option>
										<option value="Women" >Women</option>
										<option value="Other" >Other</option>
									</select>
				                </div>

				                <!-- notification -->
								<div class="form-check">
									<input class="form-check-input" type="checkbox" name="notification" value="1" <?php if ($la_case[0]['notification'] == 1) { echo "checked";} ?> >
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
				                    <input class="form-control" type="text" id="tag1" name="tag1" value="<?php if (isset($la_case[0]['tag1'])) echo htmlspecialchars(trim($la_case[0]['tag1'])); ?>" placeholder="Interest #1" required>
				                </div>
								<div class="form-group col-md-4">
				                    <input class="form-control" type="text" id="tag2" name="tag2" value="<?php if (isset($la_case[0]['tag2'])) echo htmlspecialchars(trim($la_case[0]['tag2'])); ?>" placeholder="Interest #2">
				                </div>
				                <div class="form-group col-md-4">
				                    <input class="form-control" type="text" id="tag3"  name="tag3" value="<?php if (isset($la_case[0]['tag3'])) echo htmlspecialchars(trim($la_case[0]['tag3'])); ?>" placeholder="Interest #3">
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
				                    <input class="form-control" type="textarea" name="bio" value="<?php if (isset($la_case[0]['bio'])) echo htmlspecialchars(trim($la_case[0]['bio'])); ?>" placeholder="Bio" required>
				                </div>
				        </div>
			        
				        <!-- gps -->
				        <div class="media text-muted pt-3">
					        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
					            <strong class="d-block text-gray-dark">Location</strong>
					        </p>
				        </div>
				        <div class="media text-muted pt-3">
							<div class="form-group col-md-6">
								<input class="form-control" type="text" name="lati" value="<?php if (isset($la_case[0]['lati'])) echo htmlspecialchars(trim($la_case[0]['lati'])); ?>" placeholder="Latitude">
							</div>
							<div class="form-group col-md-6">
								<input class="form-control" type="text" name="longi" value="<?php if (isset($la_case[0]['longi'])) echo htmlspecialchars(trim($la_case[0]['longi'])); ?>" placeholder="Longitude">
							</div>
				        </div>
						
						<!-- submit -->
				        <button name="update_profile" type="submit" class="btn btn-primary">Submit</button>
			        </form>
			    </div>
            </div><!-- End About profile -->
        </div>
    </div>
</main>

<!-- footer -->
<?php include("../include/footer.php"); ?>