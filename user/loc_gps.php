<!-- connection -->
<?php require_once("../config/connection.php"); ?>
<!-- session -->
<?php require_once("../include/session.php"); ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


<div id="map"></div>

<!-- from gps -->
<script type="text/javascript">
	var x = document.getElementById("map");
	var loc = "";

	function getLocation() {
	  if (navigator.geolocation) {
	    navigator.geolocation.getCurrentPosition(sendPosition);
	  }
	}

	function sendPosition(position) {
		loc = position.coords.latitude +","+ position.coords.longitude;
	
		// bghit nsefet had l 3ibat b ajax b GET ms mabghach kaytala3 li error 
		// Uncaught SyntaxError: Unexpected token < in JSON at position 0
		$(function () {
			var loc2 = loc;
			console.log(loc2);
			$.ajax({
				url: "./loc_gps.php",
				type: "GET",
				data: { loc: loc2},
				success: function (data) {
					var dataParsed = JSON.parse(data); // mni kan7ayed had dataParsed kaymchi error
					console.log(dataParsed);
				}
			});
		});
	}

	getLocation();
</script>
