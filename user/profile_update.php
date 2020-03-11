<!-- connection -->
<?php require_once("../config/connection.php"); ?>
<!-- session -->
<?php require_once("../include/session.php"); ?>

<!-- php update profile -->
<?php
if(isset($_POST["update_profile"]) && ($_SESSION["token"] === $_POST["token"])) {
	if(empty($_POST["fname"]) || empty($_POST["lname"]) || empty($_POST["email"]) || empty($_POST["username"]) || empty($_POST["birthday"]) 
	|| empty($_POST["gender"]) || empty($_POST["sex_pre"]) || empty($_POST["tag"]) || empty($_POST["bio"]) ) {
        $message = 'All fields are required.';
	} else {
        // affectations
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $birthday = $_POST["birthday"]; 
        $gender = $_POST["gender"]; 
        $sex_pre = $_POST["sex_pre"]; 
        $tag = $_POST["tag"]; 
		$bio = $_POST["bio"];
		
		// update profile query
		$query = "UPDATE `user` SET `fname`=?, `lname`=?, `email`=? ,`username`=?, `birthday`=?, `gender`=?, `sex_pre`=?, `tag`=?, `bio`=? 
				WHERE `user_id`=?";
		$query = $db->prepare($query);
		$query->execute([$fname,$lname,$email,$username,$birthday,$gender,$sex_pre,$tag,$bio,$_SESSION['user_id']]);
		// live update of username
		$_SESSION["username"] = $username;
		$msg = 'Your profile was successfully updated.';
		header("location: profile.php?msg=$msg");
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
<?php include("../include/navbar_user.php"); ?>

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
                <div class="card mb-2">
                    <img class="card-img-top rounded" src="<?php echo $url; ?>/assets/img/slide/01.jpg" alt="Slide 1">
                </div>
            </div>

		    <!-- About profile -->
            <div class="col-md-8">
				<div class="my-3 p-3 bg-white rounded box-shadow">
				<?php if(isset($message)) {echo '<div class="alert alert-danger" role="alert">'.htmlspecialchars($message).'</div>';}?>

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
			                	    <label>Last Namet</label>
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
			                	    <label>Birthday</label>
				                    <input class="form-control" type="date" name="birthday" value="<?php if (isset($la_case[0]['birthday'])) echo htmlspecialchars(trim($la_case[0]['birthday'])); ?>"    placeholder="Birthday" required>
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
			                	    <label>Choose your Sexual Preference</label>
				                    <select class="form-control" name="sex_pre">
										<?php if (isset($la_case[0]['sex_pre'])) echo '<option value="'.htmlspecialchars(trim($la_case[0]['sex_pre'])).'">'.htmlspecialchars(trim($la_case[0]['sex_pre']))."</option>" ; ?>
										<option value="Men" >Men</option>
										<option value="Women" >Women</option>
										<option value="Other" >Other</option>
									</select>
				                </div>
				            </div>
				        </div>

				        <!-- tags -->
				        <div class="media text-muted pt-3">
					        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
					            <strong class="d-block text-gray-dark">Tags</strong>
					        </p>
				        </div>
				        <div class="media text-muted pt-3">
				                <div class="form-group col-md-12">
				                    <input class="form-control" type="text" name="tag" value="<?php if (isset($la_case[0]['tag'])) echo htmlspecialchars(trim($la_case[0]['tag'])); ?>" placeholder="Tags" required>
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
				                <div class="form-group col-md-12">
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