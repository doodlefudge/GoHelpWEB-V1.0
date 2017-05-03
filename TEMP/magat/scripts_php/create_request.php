<?php
include("../connection/conn.php");
	$id = $_POST['id'];
	$arr = $_POST['items'];	
	foreach($arr as $row){
		$qry = "INSERT INTO request_items VALUES ('$id',".$row[0].",'".$row[3]."')";
	mysql_query($qry);
	}
	
?>