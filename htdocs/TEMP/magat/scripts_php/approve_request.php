<?php
include("../connection/conn.php");
$id = $_POST['id'];
$qry = "SELECT * FROM request_items s LEFT JOIN request r ON s.id = r.id WHERE s.id = '$id'";
echo $qry;
$retval = mysql_query($qry);
$arr = array();
while($row = mysql_fetch_array($retval)){
	$arr[] = $row;
	$qry1 = "SELECT item_stock FROM item_stock where item_id = '".$row['item_id']."' ";
	$count = mysql_result(mysql_query($qry1),0);
	$count += $row['item_quantity'];
	$qry1 = "UPDATE item_stock set item_stock = '".$count."' WHERE item_id = '".$row['item_id']."'";
	mysql_query($qry1);
	}
$qry2= "UPDATE request SET status = '1' WHERE id = '".$id."'";
echo $qry2;
mysql_query($qry2);
?>