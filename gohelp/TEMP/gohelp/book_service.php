<?php
try{
	
	include_once('connect.php');
	$pdo = new PDO($dsn, $user, $pass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql= "SELECT count(*) AS count FROM tbl_service_request"; 
	$stmt = $pdo->prepare($sql);

	$stmt->execute();
	$obj = $stmt->fetchObject();
	$id = (((int)$obj->count) + 1) ;
    
    $sql= "INSERT INTO tbl_service_request VALUES (:serv_trans_id,:serv_id,::lat,:lng,:serv_date,:tstart,:tend,:serv_det,:serv_stat)";
	$stmt = $pdo->prepare($sql);
    
    $serv_id = $_GET['serv_id'];
    $lat = $_GET['lat'];
    $lng = $_GET['lng'];
    $serv_date = $_GET['serv_date'];
    $tstart = $_GET['tstart'];
    $tend = $_GET['tend'];
    $serv_det  = $_GET['serv_det'];
    $serv_stat = 'new';

    $stmt->bindParam(':serv_id',$id);
    $stmt->bindParam(':id',$id);
    $stmt->bindParam(':lat',$lat);
    $stmt->bindParam(':lng',$lng);
    $stmt->bindParam(':serv_date',$serv_det);
    $stmt->bindParam(':tstart',$tstart);
    $stmt->bindParam(':tend',$tend);
    $stmt->bindParam(':serv_det',$serv_det);
    $stmt->bindParam(':serv_stat',$serv_stat);
    $stmt->execute();
    echo json_encode(array('query'=>'1'));
    
  
    
}catch(PDOException $e){
	echo "Error: " . $e->getMessage();
}




?>