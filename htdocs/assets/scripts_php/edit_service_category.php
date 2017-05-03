<?php
include($_SERVER['DOCUMENT_ROOT'].'/assets/connection/connection.php');
try{
	$pdo = new PDO($dsn, $user, $pass);
	$qry = "UPDATE tbl_service_category SET category_name = :category_name, category_details = :category_details WHERE serv_cat_id = :serv_cat_id ";
	$stmt = $pdo->prepare($qry);
	$serv_cat_id = $_POST['serv_cat_id'];
	$category_name = $_POST['category_name'];
	$category_details = $_POST['category_details'];
	$stmt->bindParam(':category_name',$category_name);
	$stmt->bindParam(':category_details',$category_details);
	$stmt->bindParam(':serv_cat_id',$serv_cat_id);
	if($stmt->execute()){
		echo "true";
	}else{
		echo "false";
		$stmt->debugDumpParams();
	}
	
}catch(Exception $e){
	echo false;
	$array = array('1'=>'plumbing','2'=>'shit');
}
?>