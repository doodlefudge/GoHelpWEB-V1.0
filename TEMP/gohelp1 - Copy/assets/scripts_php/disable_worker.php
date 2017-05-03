<?php
try{
$error = '';
include($_SERVER['DOCUMENT_ROOT'].'/gohelp1/assets/connection/connection.php');
	$w_id =  $_POST ['w_id'];

	$pdo = new PDO($dsn, $user, $pass);
	$sql1= "UPDATE tbl_user set isActive = 0 where id = :id";	
	$stmt1 = $pdo->prepare($sql1);
	$stmt1->bindParam(':id', $w_id);
	$stmt1->execute();
	
	echo"true";
	
	
	
}catch(PDOException $e){
	echo "false" . $e->getMessage();
}

?>