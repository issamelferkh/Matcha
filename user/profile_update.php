<!-- connection -->
<?php require_once("../config/connection.php"); ?>
<!-- session -->
<?php require_once("../include/session.php"); ?>
<!-- header -->
<?php include("../include/header.php"); ?>   
<!-- nav -->
<?php include("../include/navbar.php"); ?>

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

					<form method="POST" action="profile_update.php">
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
				                    <input class="form-control" type="text" name="fname" value="<?php if (isset($_POST['fname'])) echo htmlspecialchars(trim($_POST['fname'])); ?>" placeholder="First Name" required>
				                </div>

				                <div class="form-group col-md-4">
			                	    <label>Last Namet</label>
				                    <input class="form-control" type="text" name="lname" value="<?php if (isset($_POST['lname'])) echo htmlspecialchars(trim($_POST['lname'])); ?>" placeholder="Last Name" required>
				                </div>


				                <div class="form-group col-md-4">
			                	    <label>Email</label>
				                    <input class="form-control" type="email" name="email" value="<?php if (isset($_POST['email'])) echo htmlspecialchars(trim($_POST['email'])); ?>"    placeholder="Email" required>
				                </div>

				                <div class="form-group col-md-6">
			                	    <label>Username</label>
				                    <input class="form-control" type="text" name="username" value="<?php if (isset($_POST['username'])) echo htmlspecialchars(trim($_POST['username'])); ?>" placeholder="Username" required>
				                </div>
				                
				                <div class="form-group col-md-6">
			                	    <label>Birthday</label>
				                    <input class="form-control" type="date" name="password" value="<?php if (isset($_POST['password'])) echo htmlspecialchars(trim($_POST['password'])); ?>"    placeholder="Birthday" required>
				                </div>

				                <div class="form-group col-md-6">
			                	    <label>Choose your Gender</label>
				                    <select class="form-control" name="">
										<option value="" >Men</option>
										<option value="" >Women</option>
										<option value="" >Other</option>
									</select>
				                </div>

				                <div class="form-group col-md-6">
			                	    <label>Choose your Sexual Preference</label>
				                    <select class="form-control" name="">
										<option value="" >Men</option>
										<option value="" >Women</option>
										<option value="" >Other</option>
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
				                    <input class="form-control" type="text" name="fname" value="<?php if (isset($_POST['fname'])) echo htmlspecialchars(trim($_POST['fname'])); ?>" placeholder="First Name" required>
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
				                    <input class="form-control" type="textarea" name="fname" value="<?php if (isset($_POST['fname'])) echo htmlspecialchars(trim($_POST['fname'])); ?>" placeholder="First Name" required>
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
					            <div class="col-md-2">
					                <div class="card mb-2">
					                    <img class="card-img-top rounded" src="<?php echo $url; ?>/assets/img/slide/01.jpg" alt="Slide 1">
					                </div>
					            </div>
					            <div class="col-md-2">
					                <div class="card mb-2">
					                    <img class="card-img-top rounded" src="<?php echo $url; ?>/assets/img/slide/04.jpg" alt="Slide 4">
					                </div>
					            </div>
					            <div class="col-md-2">
					                <div class="card mb-2">
					                    <img class="card-img-top rounded" src="<?php echo $url; ?>/assets/img/slide/03.jpg" alt="Slide 3">
					                </div>
					            </div>
					            <div class="col-md-2">
					                <div class="card mb-2">
					                    <img class="card-img-top rounded" src="<?php echo $url; ?>/assets/img/slide/04.jpg" alt="Slide 4">
					                </div>
					            </div>
					            <div class="col-md-2">
					                <div class="card mb-2">
					                    <img class="card-img-top rounded" src="<?php echo $url; ?>/assets/img/slide/03.jpg" alt="Slide 3">
					                </div>
					            </div>
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

				        <button name="signup" type="submit" class="btn btn-primary">Submit</button>
			        </form>
			    </div>
            </div><!-- End About profile -->
        </div>
    </div>
</main>

<!-- footer -->
<?php include("../include/footer.php"); ?>