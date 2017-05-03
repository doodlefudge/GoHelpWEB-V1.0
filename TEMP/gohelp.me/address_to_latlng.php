<?php
// We define our address
function getLatLngFromAddress($address){
	$encode = 'http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false';
	// We get the JSON results from this request
	$geo = file_get_contents($encode);
	echo $encode;
	// We convert the JSON to an array
	$geo = json_decode($geo, true);
	// If everything is cool
	if ($geo['status'] = 'OK') {
	  // We set our values
	  $latitude = $geo['results'][0]['geometry']['location']['lat'];
	  $longitude = $geo['results'][0]['geometry']['location']['lng'];
	  return array('lat'=>$latitude, 'lng'=> $longitude);
	}
}

$addr = getLatLngFromAddress('1534 - C Gen. P. Santos, Makati City');
echo $addr['lat']. ' ' . $addr['lng'];
?>