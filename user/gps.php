<?php

// if (chamge location manually)
// 	-> pos = {manual lat/lng}
// else if (navigator.geolocation.getCurrentPosition(function(position) ))
// 	-> var pos = {
// 	      lat: position.coords.latitude,
// 	      lng: position.coords.longitude
// 	    };
// else (json = file_get_contents("http://ipinfo.io/"))
 

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Geolocation</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 400px;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="demo"></div>
    <script>
      // var map, infoWindow;
      // function initMap() {
      //   map = new google.maps.Map(document.getElementById('map'), {
      //     center: {lat: -34.397, lng: 150.644},
      //     zoom: 14
      //   });
      //   infoWindow = new google.maps.InfoWindow;

      //   // Try HTML5 geolocation.
      //   if (navigator.geolocation) {
      //     navigator.geolocation.getCurrentPosition(function(position) {
      //       var pos = {
      //         lat: position.coords.latitude,
      //         lng: position.coords.longitude
      //       };

      //       infoWindow.setPosition(pos);
      //       infoWindow.setContent('You are Here');
      //       infoWindow.open(map);
      //       map.setCenter(pos);
      //     }, function() {
      //       handleLocationError(true, infoWindow, map.getCenter());
      //     });
      //   } else {
      //     // Browser doesn't support Geolocation
      //     handleLocationError(false, infoWindow, map.getCenter());
      //   }
      // }

      // function handleLocationError(browserHasGeolocation, infoWindow, pos) {
      //   	console.log(test);

      //   infoWindow.setPosition(pos);
      //   infoWindow.setContent(browserHasGeolocation ?
      //                         'Error: The Geolocation service failed.' :
      //                         'Error: Your browser doesn\'t support geolocation.');
      //   infoWindow.open(map);
      // }



    </script>
<!-- /*************************************************************************/ -->
<script type="text/javascript">
	var x = document.getElementById("demo");

	function getLocation() {
	  if (navigator.geolocation) {
	    navigator.geolocation.getCurrentPosition(showPosition);
	  } else { 
	    x.innerHTML = "Geolocation is not supported by this browser.";
	  }
	}

	function showPosition(position) {
	  x.innerHTML = "Latitude: " + position.coords.latitude + 
	  "<br>Longitude: " + position.coords.longitude;
	}
</script>

    <?php
	// get loc from ipinfo
	function get_from_ipinfo() {
		$info = json_decode(file_get_contents("http://ipinfo.io/"), true);
	    echo "<h3>get_ipinfo:</h1>";
		print_r($info);
		echo "</br>Loc: ".$info['loc'];
		echo "</br>City: ".$info['city'];
	}
	function get_from_gps() {
		echo '<script type="text/javascript">getLocation();</script>';
	}

	get_from_ipinfo();
	get_from_gps();




/*************************************************************************/

	// get address from lat & lng
  function getaddress($lat,$lng)
  {
     $url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&key=AIzaSyAiFCibdMN7rF9a8Ei3pQo504GHHDqjBMU';

     $json = file_get_contents($url);
     $data=json_decode($json);
     $status = $data->status;
     echo "<h1>getaddress:</h1>";
     echo $url;

     if($status=="OK")
     {
       return $data->results[0]->formatted_address;
     }
     else
     {
       return false;
     }
  }


    $lat= 32.8811; //latitude
  $lng= -6.9063; //longitude
  $address= getaddress($lat,$lng);
  if($address)
  {
    echo "<br>";
    echo "<h1>from lat and lng:</h1>";
    echo $address;
  }
  else
  {
  	    echo "<br>";
    echo "<h1>from lat and lng:</h1>";
    echo "Not found";
  }


    ?>


    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAiFCibdMN7rF9a8Ei3pQo504GHHDqjBMU&callback=initMap">
    </script>
  </body>
</html>