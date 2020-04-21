<!-- connection -->
<?php require_once("../config/connection.php"); ?>
<!-- session -->
<?php require_once("../include/session.php"); ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


<div id="map"></div>

<!-- from gps -->
<script type="text/javascript">
	var x = document.getElementById("map");
	var loc = "aaa";

	function getLocation() {
	  if (navigator.geolocation) {
	    navigator.geolocation.getCurrentPosition(sendPosition);
	  }
	}

	function sendPosition(position) {
		loc = position.coords.latitude +","+ position.coords.longitude;
	
		$(function () {
			var loc_var = loc;
			var dataString = 'loc_var=' + loc;
			$.ajax({
				url: "./loc_gps_script.php",
				type: "POST",
				data: dataString,
				success: function(data) {
					if (data) {
						location.href = "loc_gps_script.php";
					}
					// console.log(data.stack); // overflow
					// console.log(data.key);   // value
				}
			});
		});
	}

	getLocation();
</script>
