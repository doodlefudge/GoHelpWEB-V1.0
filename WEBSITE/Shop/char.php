<?php
/**
 * @author JuZTiFY
 * @copyright 2008
 */
if($_POST['item'] == "0"){
	$error = "Please specify an item!";
	header("location: index.php?error=$error");
}
include "config.php";
$price = $_POST['price'];
$item = $_POST['item'];
$username = $_POST['user'];
$password = $_POST['pass'];
$compass = md5("kikugalanet$password");
$con = mysql_connect($sqlserv, $sqluser, $sqlpass);
mysql_select_db($flyffdb);
$query = mysql_query("SELECT * FROM accounts WHERE username='$username' and password='$compass'");
$row = mysql_fetch_array($query);
$count = mysql_num_rows($query);
mysql_close($con);
if($count == "0"){
	$error = "Wrong username or password!";
	header("location: index.php?error=$error");
}
if($row['logged_in'] == "1") {
	$error = "Please log out from the GameClient before buying anything.";
	header("Location: index.php?error=$error");
}
?>
<form action="buy.php" method="post">
Please choose wich character to buy for:<br />
<select name="character">
<?php

$con = mysql_connect($sqlserv, $sqluser, $sqlpass);
mysql_select_db($flyffdb);
$query = mysql_query("SELECT * FROM characters WHERE accountname='$username'");
while($row = mysql_fetch_array($query)){
	$char = $row['charname'];
	$id = $row['id'];
	echo "<option value=\"$id\">$char</option>";
}
mysql_close($con);
?>
</select>
<input type="hidden" name="itemid" value="<?php echo $item; ?>"/>'
<input type="hidden" name="price" value="<?php echo $price; ?>"/>
<input type="submit" value="Buy!"/>
</form>