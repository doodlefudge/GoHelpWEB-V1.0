<?php
/**
 * @author JuZTiFY
 * @copyright 2008
 */

$username = $_POST['uname'];
$rawpassw = $_POST['passw'];
$password = md5("kikugalanet$rawpassw");
$logged = 'false';

if($username == ""){
	$verified = 'false';
} else {
	$verified = 'true';
}
if($verified == "true")
{
	include "config.php";
	$con = mysql_connect($sqlserv, $sqluser, $sqlpass);
	mysql_select_db($db);
	
	$query = mysql_query("SELECT * FROM accounts WHERE username = '$username' AND password = '$password'");
	
	$check = mysql_num_rows($query);
	if($check != 1){
		echo "<p><font color=\"#FF0000\">Could not log you in!<br>Please check your username or password and try again!</font></p>";
	} else {
		$logged = 'true';
	}
	
	if($logged == 'true'){
		$query = mysql_query("SELECT * FROM characters WHERE accountname = '$username'");
		
		echo "<form action=\"buff.php\" method=\"post\">";
		echo "Select the Character to buff:<br>";
		echo "<select name=\"character\">";
		
		while($get = mysql_fetch_array($query)){
			$cid = $get['id'];
			$character = $get['charname'];
			
			echo "<option value=\"$cid\">$character</option>";
		}
		
		echo "</select>";
		echo "<input type=\"submit\" value=\"Buff me!\" />";
		echo "</form>";
	}
	mysql_close($con);
} else {
	echo "<p><font color=\"#FF0000\">Please log in first.</font></p>";
}
?>