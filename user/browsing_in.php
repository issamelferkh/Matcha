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
		    <!-- About Browsing inputs -->
            <div class="col-md-12">
				<div class="my-3 p-3 bg-white rounded box-shadow">
				<?php if(isset($message)) {echo '<div class="alert alert-danger" role="alert">'.htmlspecialchars($message).'</div>';}?>
					<form method="GET" action="browsing_out.php">
						<input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
						<input type="hidden" name="i" value="0">
						<!-- Sort by -->
				        <h6 class="border-bottom border-gray pb-2 mb-0">Sort by:</h6>
				        <div class="media text-muted pt-3">
							<div class="form-row">
								<label class="btn btn-outline-primary mr-3">
									<input type="radio" value="default" name="sort" checked> Default
								</label>
								<label class="btn btn-outline-primary mr-3">
									<input type="radio" value="age" name="sort"> Age
								</label>
								<label class="btn btn-outline-primary mr-3">
									<input type="radio" value="distance" name="sort"> Distance
								</label>
								<label class="btn btn-outline-primary mr-3">
									<input type="radio" value="popularity" name="sort"> Popularity
								</label>
								<label class="btn btn-outline-primary mr-3">
									<input type="radio" value="tags" name="sort"> Interests
								</label>
				            </div>
				        </div></br>

				        <!-- Filter by -->
						<h6 class="border-bottom border-gray pb-2 mb-0">Filter by:</h6></br>
						<div class="form-row">
							<div class="form-group col-md-4">
								<label>Age:</label>
								<input class="form-control" type="text" name="age_min" placeholder="Min Age">
								</br>
								<input class="form-control" type="text" name="age_max" placeholder="Max Age">
							</div>

							<div class="form-group col-md-4">
								<label>Distance</label>
								<input class="form-control" type="text" name="distance_min" placeholder="Min Distance">
								</br>
								<input class="form-control" type="text" name="distance_max" placeholder="Max Distance">
							</div>
							<div class="form-group col-md-4">
								<label>Popularity</label>
								<input class="form-control" type="text" name="popularity_min" placeholder="Min Popularity">
								</br>
								<input class="form-control" type="text" name="popularity_max" placeholder="Max Popularity">
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
								<input class="form-control" type="text" id="tag1" name="tag1" placeholder="Interest #1">
							</div>
							<div class="form-group col-md-4">
								<input class="form-control" type="text" id="tag2" name="tag2" placeholder="Interest #2">
							</div>
							<div class="form-group col-md-4">
								<input class="form-control" type="text" id="tag3"  name="tag3" placeholder="Interest #3">
							</div>
				        </div>						
						<!-- submit -->
				        <button name="browsing" type="submit" class="btn btn-primary">Submit</button>
			        </form>
			    </div>
            </div><!-- End About Browsing inputs -->
        </div>
    </div>
</main>

<!-- footer -->
<?php include("../include/footer.php"); ?>