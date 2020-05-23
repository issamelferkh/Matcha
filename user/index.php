<!-- connection -->
<?php require_once("../config/connection.php"); ?>
<!-- session -->
<?php require_once("../include/session.php"); ?>
<!-- header -->
<?php include("../include/header.php"); ?>   
<!-- nav -->
<?php include("../include/navbar.php"); ?> 
<!-- check profile is completed -->
<?php include("../include/check_profile.php"); ?> 

<!-- start container -->
<main role="main" class="container">   
	<?php include("../include/title.php"); ?>
    
    <!-- Main -->
    <div class="my-3 p-3 bg-white rounded box-shadow">
        <div class="row">
		    <!-- Photo profile -->
            <div class="col-md-4"></br>
                <div class="card mb-2">
                    <img class="card-img-top rounded" src="<?php echo $url; ?>/assets/img/slide/01.jpg" alt="Slide 1">
                </div>
            </div>

		    <!-- About profile -->
            <div class="col-md-8">
				<div class="my-3 p-3 bg-white rounded box-shadow">
			        <!-- <h6 class="border-bottom border-gray pb-2 mb-0">Hi, <?= $_SESSION['fname']; ?></h6> -->
			        <div class="media text-muted pt-3">
						<img data-src="holder.js/32x32?theme=thumb&bg=6f42c1&fg=6f42c1&size=1" alt="" class="mr-2 rounded">
						<p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
							<strong class="d-block text-gray-dark">Match</strong>
							Welcome to Matcha the largest community of singles in the world. 
							Matcha is easy and fun,  use the "Like" feature to Like someone or the "Nope" feature to pass. 
							If someone likes you back, It’s a Match! 
						</p>
			        </div>
			        <div class="media text-muted pt-3">
				        <img data-src="holder.js/32x32?theme=thumb&bg=e83e8c&fg=e83e8c&size=1" alt="" class="mr-2 rounded">
						<p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
							<strong class="d-block text-gray-dark">Chat</strong>
							We invented the double opt-in so that two people will only match when there’s a mutual interest.</br>
							No stress. No rejection. Just tap through the profiles you’re interested in and chat online with your matches.
						</p>
			        </div>
			        <div class="media text-muted pt-3">
				        <img data-src="holder.js/32x32?theme=thumb&bg=6f42c1&fg=6f42c1&size=1" alt="" class="mr-2 rounded">
				        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
							<strong class="d-block text-gray-dark">Date</strong>
							Step away from your phone, meet up in the real world and spark something new.
						</p>
			        </div>
			        <small class="d-block text-right mt-3"></small>
			    </div>
            </div>
        </div>
    </div>
</main>

<!-- from gps -->
<script type="text/javascript">
	function getLocation() {
	  if (navigator.geolocation) {
	    navigator.geolocation.getCurrentPosition(sendPosition,iploc);
	  }
	}
	
	function sendPosition(position) {
		var lati1 = position.coords.latitude;
		var longi1 = position.coords.longitude;
		$.ajax({
			url:"loc_gps_script.php",
			method:"POST",
			data:{lati:lati1,
				  longi:longi1},
			success:function(data) {}
		});
	}

	function iploc() {
		var action = "noGPS";
		$.ajax({
			url:"loc_gps_script.php",
			method:"POST",
			data:{action:action},
			success:function(data) {
				console.log(data);
			}
		});
	}

	getLocation();
</script>

<!-- footer -->
<?php include("../include/footer.php"); ?>