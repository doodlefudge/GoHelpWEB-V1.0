<?php
include($_SERVER['DOCUMENT_ROOT'].'/assets/connection/connection.php');
$pdo = new PDO($dsn,$user,$pass);
$qry = "SELECT service_name FROM tbl_service_detail";
$stmt = $pdo->prepare($qry);
$stmt->execute();
$obj = $stmt->fetchAll();
foreach($obj as $arr){
	echo $arr['service_name'].',';
}

?>