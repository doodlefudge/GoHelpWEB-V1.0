<?php
include($_SERVER['DOCUMENT_ROOT'].'/assets/connection/connection.php');
$pdo = new PDO($dsn, $user, $pass);
try{
	$qry = "UPDATE tbl_training_summary SET training_status = '1' WHERE training_id = :training_id";
	$stmt = $pdo->prepare($qry);
	$training_id = $_POST['training_id'];
	$stmt->bindParam(':training_id',$training_id);
	$stmt->execute();

	$qry = "INSERT INTO tbl_worker_skills VALUES(:id,:skill_id)";
	$stmt = $pdo->prepare($qry);
	$id = $_POST['id'];
	$skill_id = $_POST['serv_detail_id'];
	$stmt->bindParam(':id',$id);
	$stmt->bindParam(':skill_id',$skill_id);
	$stmt->execute();
	echo "true";
}catch(Exception $e){
	echo "false";
}
?>