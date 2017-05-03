<?php
require_once 'config.php';
 
session_start();
$uName = $_POST['name'];
$pWord = $_POST['pwd'];
$qry = "SELECT COUNT(*) FROM user_account WHERE [username]='$uName' AND [password]='$pWord'";
echo qry;
$res = mysql_query($qry);
$num_row = mysql_num_rows($res);
$row=mysql_fetch_assoc($res);
if( $num_row >= 1 ) {
	echo 'true';
	$_SESSION['uName'] = $row['username'];
	$_SESSION['auth'] = $row['oauth'];
	} 
else {
	echo 'false';
}	

?>