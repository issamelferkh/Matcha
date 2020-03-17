<!-- connection -->
<?php require_once("../config/connection.php"); ?>
<!-- session -->
<?php require_once("../include/session.php"); ?>

<!-- php update profile -->
<?php
// SNV@issam123
// SNV@issam1234

if((isset($_POST["update_pwd"])) && ($_SESSION["token"] === $_POST["token"])) {
    if ((!empty($_POST["password_old"])) && (!empty($_POST["password1"])) && (!empty($_POST["password2"]))) {
        // verif old password
    	$password1 		= $_POST['password1'];
        $password2		= $_POST['password2'];
        $password_old	= hash('whirlpool', $_POST["password_old"]);
        $query = 'SELECT * FROM user WHERE `user_id`="'.$_SESSION['user_id'].'" ';
        $query = $db->prepare($query);
        $query->execute();
        $count = $query->rowCount();
        $la_case = $query->fetchAll(\PDO::FETCH_ASSOC);
        if ($count > 0) {
            if ($password_old === $la_case[0]['password']) {
                // verif confirmation of password
                if (($password1) === ($password2)) {
                    $pwdlen = strlen($password1);
                    $uppercase = preg_match('@[A-Z]@', $password1);
                    $lowercase = preg_match('@[a-z]@', $password1);
                    $number    = preg_match('@[0-9]@', $password1);
                    $specialChars = preg_match('@[^\w]@', $password1);
                    // verif password lenght
                    if($pwdlen < 8) {
                        $message = 'Invalid password. Password must be at least 8 characters.';
                    } else { // update password
                    	$password1 = hash('whirlpool', $password1);
                        $query = "UPDATE `user` SET `password`=? WHERE `user_id`=?";
                        $query = $db->prepare($query);
                        $query->execute([$password1,$_SESSION['user_id']]);
                        $msg = 'Your password was successfully updated.';
						header("location: profile.php?msg=$msg");
                    }
                } else {
                    $message = 'The new password is not matched with the confirmation !'; // verif confirmation of password -> msg 
                }
            } else {
                $message = 'Old Password is incorrect !'; // verif old password -> msg
            }
        } else {
            $message = 'What you trying to do !?';
        }
    } else {
        $message = 'All fields are required !!!';
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
					<form method="POST" action="profile_pwd.php">
						<input type="hidden"    name="token"        value="<?php echo $_SESSION['token']; ?>">
				        <h6 class="border-bottom border-gray pb-2 mb-0">Profile</h6>
				        <!-- personelle infos -->
				        <div class="media text-muted pt-3">
					        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
					            <strong class="d-block text-gray-dark">Password</strong>
					        </p>
				        </div>
				        <div class="media text-muted pt-3">
							<div class="form-row">
				                <div class="form-group col-md-4">
			                	    <label>Current Password</label>
				                    <input class="form-control" type="password" name="password_old" value="" required>
				                </div>

				                <div class="form-group col-md-4">
			                	    <label>New Password</label>
				                    <input class="form-control" type="password" name="password1" value="" required>
				                </div>


				                <div class="form-group col-md-4">
			                	    <label>Confirme Password</label>
				                    <input class="form-control" type="password" name="password2" value="" required>
				                </div>
						<!-- submit -->
				        <button name="update_pwd" type="submit" class="btn btn-primary">Submit</button>
			        </form>
			    </div>
            </div><!-- End About profile -->
        </div>
    </div>
</main>

<!-- footer -->
<?php include("../include/footer.php"); ?>