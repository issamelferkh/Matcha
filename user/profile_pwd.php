<?php require_once("../config/connection.php"); ?>
<?php require_once("../include/session.php"); ?>
<?php require_once("../include/libft.php"); ?>

<!-- php update profile -->
<?php
if(isset($_POST['update_pwd'])) {
	if((isset($_POST["token"])) && ($_SESSION["token"] === $_POST["token"])) {
		if ((!empty($_POST["password_old"])) && (!empty($_POST["password1"])) && (!empty($_POST["password2"]))) {
			// verif old password
			$password1 		= htmlspecialchars(trim($_POST['password1']));
			$password2		= htmlspecialchars(trim($_POST['password2']));
			$password_old = htmlspecialchars(trim( $_POST["password_old"]));
			$password_old	= hash('whirlpool', $password_old);
			
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
							ft_putmsg('danger','Invalid password. Password must be at least 8 characters.','/user/profile_pwd.php');
						} else { // update password
							$password1 = hash('whirlpool', $password1);
							$query = "UPDATE `user` SET `password`=? WHERE `user_id`=?";
							$query = $db->prepare($query);
							$query->execute([$password1,$_SESSION['user_id']]);
							ft_putmsg('success','Your password was successfully updated.','/user/profile.php'); 
						}
					} else {
						ft_putmsg('danger','The new password is not matched with the confirmation!','/user/profile_pwd.php'); 
					}
				} else {
					ft_putmsg('danger','Old Password is incorrect!','/user/profile_pwd.php'); 
				}
			} else {
				ft_putmsg('danger','What you trying to do !?','/user/profile_pwd.php'); 
			}
		} else {
			ft_putmsg('danger','All fields are required!','/user/profile_pwd.php'); 
		}
	} else {
		header("location: ../404.php");
	}
}
?>

<!-- header -->
<?php include("../include/header.php"); ?>   
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
					<form method="POST" action="profile_pwd.php">
						<input type="hidden"    name="token"        value="<?php echo $_SESSION['token']; ?>">
				        <h6 class="border-bottom border-gray pb-2 mb-0">Profile</h6>
				        <!-- personelle infos -->
				        <div class="media text-muted pt-3">
					        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
					            <strong class="d-block text-gray-dark">Update Password</strong>
					        </p>
				        </div>
				        <div class="media text-muted pt-3">
							<div class="form-row">
				                <div class="form-group col-md-4">
			                	    <label>Current Password</label>
				                    <input class="form-control" type="password" name="password_old" required>
				                </div>

				                <div class="form-group col-md-4">
			                	    <label>New Password</label>
				                    <input class="form-control" type="password" name="password1" required>
				                </div>


				                <div class="form-group col-md-4">
			                	    <label>Confir. Password</label>
				                    <input class="form-control" type="password" name="password2" required>
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