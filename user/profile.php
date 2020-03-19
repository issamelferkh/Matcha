<!-- connection --> 
<?php require_once("../config/connection.php"); ?>
<!-- session -->
<?php require_once("../include/session.php"); ?>
<!-- php show profile -->
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
<!-- php profile picture -->
<?php
	$flag = 1;
	$query = 'SELECT * FROM `picture` WHERE `user_id`="'.$_SESSION['user_id'].'" AND `asProfile` = "'.$flag.'"';
	$query = $db->prepare($query);
	$query->execute();
    $pro = $query->fetchAll(\PDO::FETCH_ASSOC);
?>
                <div class="card mb-2">
                    <img class="card-img-top rounded" src="<?php echo $url.$pro[0]['imgURL']; ?>" >
                </div>
            
                <label>Popularity</label>
                <div class="progress">
					<div class="progress-bar progress-bar-striped" role="progressbar" style="width: 60%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
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
				                <div class="form-group col-md-4">
			                	    <label>First Name</label>
				                    <input class="form-control" type="text" value="<?php if (isset($la_case[0]['fname'])) echo htmlspecialchars(trim($la_case[0]['fname'])); ?>" disabled>
				                </div>

				                <div class="form-group col-md-4">
			                	    <label>Last Namet</label>
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
			                	    <label>Birthday</label>
				                    <input class="form-control" type="date" value="<?php if (isset($la_case[0]['birthday'])) echo htmlspecialchars(trim($la_case[0]['birthday'])); ?>" disabled>
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
					            <strong class="d-block text-gray-dark">Tags</strong>
					        </p>
				        </div>
				        <div class="media text-muted pt-3">
				                <div class="form-group col-md-12">
				                    <input class="form-control" type="text" value="<?php if (isset($la_case[0]['tag'])) echo htmlspecialchars(trim($la_case[0]['tag'])); ?>" disabled>
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
	$query = 'SELECT * FROM `picture` WHERE `user_id`="'.$_SESSION['user_id'].'"';
	$query = $db->prepare($query);
	$query->execute();
	$count = $query->rowCount();
    $la_case = $query->fetchAll(\PDO::FETCH_ASSOC);
    $i=0;
    $result="";
    while ($count > $i) {
    	$result = $result."

<div class='col-md-2'>
    <div class='card mb-2'>
        <img class='card-img-top rounded' src='".$url.$la_case[$i]['imgURL']."'>
    </div>
</div>
					            ";
    	$i++;
    }
    if($count > 0) {echo $result;}
?>
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
	<a href="<?php echo $url; ?>/user/profile_update.php" 	class="btn btn-primary" role="button">Update Profile</a>
	<a href="<?php echo $url; ?>/user/profile_pic.php" 		class="btn btn-warning" role="button">Upload Pictures</a>
	<a href="<?php echo $url; ?>/user/profile_pwd.php"		class="btn btn-danger" 	role="button">Update Password</a>

			    </div>
            </div><!-- End About profile -->
        </div>
    </div>
</main>

<!-- footer -->
<?php include("../include/footer.php"); ?>