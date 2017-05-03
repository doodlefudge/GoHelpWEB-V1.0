<?php
try{
	include('../gohelp.me/assets/connection/connection.php');
	$pdo = new PDO($dsn, $user, $pass);
	$sql= " SELECT COUNT(*) AS count FROM tbl_service_confirmation WHERE serv_conf_id LIKE 'CONF".date('Y')."%' "; 
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	$obj = $stmt->fetchObject();
	$id = $obj->count;

	$pdo = new PDO($dsn, $user, $pass);
	$sql= "INSERT INTO tbl_service_confirmation VALUES(:serv_conf_id,:request_id,:serv_quote,:serv_summary)"; 
	$stmt = $pdo->prepare($sql);
	$serv_conf_id = "CONF".date('Y').($id + 1);
	$request_id1 = $_POST['request_id'];
	$serv_quote = $_POST['serv_quote'];
	$serv_summary = $_POST['serv_summary'];
	$stmt->bindParam(':serv_conf_id', $serv_conf_id );
	$stmt->bindParam(':request_id', $request_id1);
	$stmt->bindParam(':serv_quote', $serv_quote);
	$stmt->bindParam(':serv_summary', $serv_summary);
	$stmt->execute();

	echo "true";
	
}catch(Exception $e){
	echo 'false' $e;
}
?>