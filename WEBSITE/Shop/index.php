<?php
/**
 * @author JuZTiFY
 * @copyright 2008
 */
 include "config.php";
 echo $_GET['error'];
?>
<form action="char.php" method="post">
<table>
<tr><td>Username: <br />Password: </td><td><input name="user" type="text"/><br />
<input name="pass" type="password"/><br /></td></tr><tr><td colspan="2"><input type="submit" value="Proceed!"/></td></tr>
<select name="item">
<option value="0">Please select an item...</option>
<?php

$con = mysql_connect($sqlserv, $sqluser, $sqlpass);
mysql_select_db($shopdb);
$query = mysql_query("SELECT * FROM ITEMS");
while($row = mysql_fetch_array($query)){
	$iid = $row['itemid'];
	$ina = $row['itemname'];
	$ipr = $row['itemprice'];
	echo "<option value=\"$iid\">Buy $ina for $ipr penya!</option>";
}

?>
</select>
</table>
</form>