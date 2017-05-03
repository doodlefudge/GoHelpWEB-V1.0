<?php
try{
    include_once('connect.php');
	$pdo = new PDO($dsn, $user, $pass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql= 
    "SELECT count(*) from tbl_service_request r LEFT JOIN tbl_trans_detail d ON r.serv_id = d.serv_id LEFT JOIN tbl_user u ON u.id = d.customer_id where u.user = :user"; 
    $stmt = $pdo->prepare($sql);
	$user = $_GET['user'];
	$stmt->bindParam(':user', $user);
    $stmt->execute();
    $obj['count'] = $stmt->fetchAll();

    $sql= 
    "SELECT count(*) from tbl_service_request r LEFT JOIN tbl_trans_detail d ON r.serv_id = d.serv_id LEFT JOIN tbl_user u ON u.id = d.customer_id where u.user = :user"; 
    $stmt = $pdo->prepare($sql);
	$user = $_GET['user'];
	$stmt->bindParam(':user', $user);
    $stmt->execute();
    $obj['count'] = $stmt->fetchAll();

    echo  json_encode($obj);
}catch(PDOException $e){
    
}
?>