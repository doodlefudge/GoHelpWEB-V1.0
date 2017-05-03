<?php

/**
 * @author JuZTiFY
 * @copyright 2008
 */
include "config.php";
$charid = $_POST['character'];
$iid = $_POST['itemid'];
if($charid == ""){
	$e2 = "Don't try anything stupid.";
	header("Location: index.php?error=$e2");
}
$con = mysql_connect($sqlserv, $sqluser, $sqlpass);
mysql_select_db($shopdb);
$query = mysql_query("SELECT * FROM items WHERE itemid='$iid'");
$row = mysql_fetch_array($query);
$price = $row['itemprice'];
mysql_close($con);
$con = mysql_connect($sqlserv, $sqluser, $sqlpass);
mysql_select_db($flyffdb);
$query = mysql_query("SELECT * FROM characters WHERE id='$charid'");
$row = mysql_fetch_array($query);
$penya = $row['penya'];
$total = $penya - $price;
if($total <= 0){
	$e1 = "You dont have enough penya!";
	header("location: index.php?error=$e1");
}
$query = mysql_query("INSERT INTO mails VALUES ('$total', '0', '$charid', '0', '0', 'Your order!', 'Here is your order!', '0', '$iid', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '-1');");
$q = "UPDATE characters SET penya='$total'".
     "WHERE id='$charid'";
mysql_query($q);
if($total > "1"){
	$error = "Your item has been sent to your ingame mailbox!";
	header("location: index.php?error=$error");
}
?>