<?php
try{
	
	include_once('connect.php');
	$pdo = new PDO($dsn, $user, $pass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql= "SELECT count(*) as count,user from tbl_user where user = :user AND pass = :pass"; 
	$stmt = $pdo->prepare($sql);
	$id = $_GET['user'];
	$pass =  $_GET['pass'];
	$stmt->bindParam(':user', $id);
	$stmt->bindParam(':pass', $pass);
	$stmt->execute();
	$obj = $stmt->fetchObject();
	if($obj->count >0){
		$json=json_encode($obj);
		echo $json;
	}else{
		$json=json_encode($obj);
		echo $json;
	}
}catch(PDOException $e){
	echo "Error: " . $e->getMessage();
}




?>