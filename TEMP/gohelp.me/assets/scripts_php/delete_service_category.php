<?php
include($_SERVER['DOCUMENT_ROOT'].'/gohelp.me/assets/connection/connection.php');
try{
	$pdo = new PDO($dsn, $user, $pass);
	$qry = "DELETE FROM tbl_service_category WHERE serv_cat_id = :serv_cat_id";
	$stmt = $pdo->prepare($qry);
	$serv_cat_id = $_POST['serv_cat_id'];


	$stmt->bindParam(':serv_cat_id',$serv_cat_id);
	if($stmt->execute()){
		echo "true";
	}else{
		echo "false";
		$stmt->debugDumpParams();
	}
	
}catch(Exception $e){
	echo false;
}
?>