<?php
include_once('assets\connection\connection.php');

function get_coordinates($addr)
{
    $address = urlencode($addr);
    $url = "https://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&key=AIzaSyBBJvLsB9Jl6JESWtxIlUEzB5xBdlQvnlM";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response = curl_exec($ch);
    curl_close($ch);
    $response_a = json_decode($response);
    $status = $response_a->status;

    if ( $status == 'ZERO_RESULTS' )
    {
        return FALSE;
    }
    else
    {
        $return = array('lat' => $response_a->results[0]->geometry->location->lat, 'long' => $long = $response_a->results[0]->geometry->location->lng,'url'=>$url);
        return $return;
    }
}
function GetDrivingDistance($lat1, $lat2, $long1, $long2)
{
    $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$lat1.",".$long1."&destinations=".$lat2.",".$long2."&mode=driving&key=AIzaSyCeZqopPkV7ON5HKvAdDkVFElZs0vzs7gA";
	$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);	
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response = curl_exec($ch);
    curl_close($ch);
    $response_a = json_decode($response, true);
    $dist = $response_a['rows'][0]['elements'][0]['distance']['value'];
    $distText = $response_a['rows'][0]['elements'][0]['distance']['text'];
    $time = $response_a['rows'][0]['elements'][0]['duration']['value'];
    $timeText = $response_a['rows'][0]['elements'][0]['duration']['text'];
    return array('dist' => $dist, 'time' => $time,'distText' => $distText, 'timeText' => $timeText,'url' => $url);
}
function getaddress($lat,$lng)
{
$url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&sensor=false&key=AIzaSyBBJvLsB9Jl6JESWtxIlUEzB5xBdlQvnlM';
$json = @file_get_contents($url);
$data=json_decode($json);
$status = $data->status;
if($status=="OK")
return $data->results[0]->formatted_address;
else
return false;
}

/* $coordinates1 = get_coordinates('Makati', 'Evangelista St.', 'NCR');
$coordinates2 = get_coordinates('Cavite', 'Camias', 'NCR');
if ( !$coordinates1 || !$coordinates2 )
{
    echo 'Bad address.';
}
else
{
    $dist = GetDrivingDistance($coordinates1['lat'], $coordinates2['lat'], $coordinates1['long'], $coordinates2['long']);
    echo 'Distance: <b>'.$dist['distance'].'</b><br>Travel time duration: <b>'.$dist['time'].'</b>';
} */

?>