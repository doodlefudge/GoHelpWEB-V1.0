<?php

function retrieveText(){
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';

	$conn = mysql_connect($dbhost, $dbuser, $dbpass);

	if (! $conn){
		echo "you are not connected";
	}
	else{
		echo "connected";
	}

	$qry = "select * from user_acct";
	$db = mysql_select_db("db_cai",$conn);

	$retval = mysql_query($qry,$conn);
	
	while($row = mysql_fetch_array($retval)){
		echo "<td>". $row["user_id"]."</td>";
	}

	$qry = "select * from user_info";
	
	$retval = mysql_query($qry, $conn);

	echo "<table border = '5'>";
	while($row = mysql_fetch_array($retval)){

		echo "<tr>";
		echo "<td>".$row ["user_id"]."</td>";
		echo"<td>". $row ["first_name"]."</td>";
		echo "<td>".$row ["middle_name"]."</td>";
		echo "<td>".$row ["last_name"]."</td>";
		echo "<td>".$row ["gender"]."</td>";
		echo "<td>".$row ["email_add"]."</td>";
		echo "</tr>";
	}
	echo "</table>";
}
 retrieveText();
?>