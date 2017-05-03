<?php
include("../connection/conn.php");
	$id = $_POST['id'];
	$qry = "SELECT * FROM ITEMS WHERE item_id = '$id' ";
	$retval = mysql_query($qry);
	$arr = array();
	$row = mysql_fetch_array($retval);
	$arr = array("item_id" => $row['item_id'],"item_name" => $row['item_name'],'item_selling_price' => $row['item_selling_price']);
	echo json_encode($arr);
	
?>