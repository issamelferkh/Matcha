
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
		var lati1 = "lati_issam";
		var longi1 = "longi_issam";
		$.ajax({
			url:"loc_gps_script.php",
			method:"POST",
			data:{lati:lati1,
				  longi:longi1},
			success:function(data) {
				// console.log(data);
				// location.href = "loc_gps_script.php";
			}
		});
	}

	// function sendPosition(position) {
	// 	loc = position.coords.latitude +","+ position.coords.longitude;
	
	// 	$(function () {
	// 		var loc_var = loc;
	// 		var dataString = 'loc_var=' + loc;
	// 		$.ajax({
	// 			url: "./loc_gps_script.php",
	// 			type: "POST",
	// 			data: dataString,
	// 			success: function(data) {
	// 				if (data) {
	// 					// console.log("a");
	// 					location.href = "loc_gps_script.php";
	// 				}
	// 				// console.log(data.stack); // overflow
	// 				// console.log(data.key);   // value
	// 			}
	// 		});
	// 	});
	// }

	getLocation();
</script>
