<?php
try{
    include_once('connect.php');
	$pdo = new PDO($dsn, $user, $pass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql= 
    "SELECT * FROM tbl_service_category"; 
    $stmt = $pdo->prepare($sql);
	$stmt->execute();
    $obj['category'] = $stmt->fetchAll();

    echo  json_encode($obj);
}catch(PDOException $e){
    
}
?>