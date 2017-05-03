<?php
include_once('assets\connection\connection.php');
include_once('distance_comparer.php');
$pdo = new PDO($dsn,$user,$pass);
$request_id = $_POST['request_id'];
$serv_detail_id =  $_POST['serv_detail_id'];
$customer_id = $_POST['customer_id'];

$pdo = new PDO($dsn,$user,$pass);
$sql = "SELECT * FROM tbl_service_request  WHERE request_id ='".$request_id."'";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$obj  = $stmt->fetchAll();

//echo $sql;


$sql1 = "SELECT * FROM tbl_user_info i LEFT JOIN tbl_user u  ON i.id = u.id  LEFT JOIN tbl_worker_skills w ON i.id = w.id WHERE u.account_type = '2' AND u.isActive = '1' AND w.skill_id = '".$serv_detail_id."'";
//echo $sql1;
$stmt1 = $pdo->prepare($sql1);
$stmt1->execute();
$obj1  = $stmt1->fetchAll();
$nRows2 = $pdo->query("SELECT COUNT(*) FROM tbl_user_info i LEFT JOIN tbl_user u  ON i.id = u.id  LEFT JOIN tbl_worker_skills w ON i.id = w.id WHERE u.account_type = '2' AND u.isActive = '1'  AND w.skill_id = '".$serv_detail_id."'")->fetchColumn(); 
$arr;	
$distHolder;
for($j = 0; $j < $nRows2 ; $j++){
	$templat;
	$templng;
	if($obj1[$j]['user_lat'] == 00 || $obj1[$j]['user_lng'] == 00){
		$coordinates2 = get_coordinates($obj1[$j]['address_lot']. " " .$obj1[$j]['address_street']. " " .$obj1[$j]['address_brgy']. " " .$obj1[$j]['address_city'] );	
		$dist = GetDrivingDistance($obj[0]['lat'], $coordinates2['lat'], $obj[0]['lng'], $coordinates2['long']);
		$templat = $coordinates2['lat'];
		$templng = $coordinates2['long'];
	}else{
		//echo $dist["url"]. "1<br/>" ;
		$dist = GetDrivingDistance($obj[0]['lat'],$obj1[$j]['user_lat'],$obj[0]['lng'],$obj1[$j]['user_lng']);
		$templat = $obj1[$j]['user_lat'];
		$templng = $obj1[$j]['user_lng'];
		//echo $dist["url"]. "2<br/>" ;
	}			
	if($dist['dist'] < 10000 ){
		$arr[] = array("id" => $obj1[$j]["id"], 
						"name" => $obj1[$j]["fname"] ." ".$obj1[$j]["lname"], 
						"dist" => $dist['dist'], 
						"lat"=>$templat,
						"lng" => $templng);
		$distHolder[] = $dist['dist'];	
	}else{
		$arr[] = array("id" => $obj1[$j]["id"], 
						"name" => $obj1[$j]["fname"] ." ".$obj1[$j]["lname"] ."(Not Recommended, Distance too far ". $dist['distText'] . ")", 
						"dist" => $dist['dist'], 
						"lat"=>$templat,
						"lng" => $templng);
		$distHolder[] = $dist['dist'];	
	}
}


$min = min($distHolder);
foreach($arr as $data){	
	if($data["dist"] == $min){
		echo json_encode($data);
		break;
	}
}

?>