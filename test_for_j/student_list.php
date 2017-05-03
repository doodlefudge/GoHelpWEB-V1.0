<!DOCTYPE html>
<html>
<head>
<link href = "student_list.css" rel = "stylesheet" type = "text/css" ></link>	
<h1>List of Student:</h1>
</head>
<body>
<?php
function retrieveText(){
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';

	$conn = mysql_connect($dbhost, $dbuser, $dbpass);

	$qry = "select * from user_acct";
	$db = mysql_select_db("db_cai",$conn);

	$retval = mysql_query($qry,$conn);

	$qry = "select * from user_info";
	
	$retval = mysql_query($qry, $conn);

		echo "<table border = '5'>";
			echo "<tr>";
			echo "<td>User ID</td>";
			echo "<td>Lastname</td>";
			echo "<td>First Name</td>";
			echo "<td>Middle Name</td>";
			echo "<td>Gender</td>";
			echo "<td>Email Address</td>";
		echo "</tr>";

	while($row = mysql_fetch_array($retval)){

		echo "<tr>";
			echo "<td>".$row ["user_id"]."</td>";
			echo "<td>".$row ["last_name"]."</td>";
			echo"<td>". $row ["first_name"]."</td>";
			echo "<td>".$row ["middle_name"]."</td>";		
			echo "<td>".$row ["gender"]."</td>";
			echo "<td>".$row ["email_add"]."</td>";
		echo "</tr>";
	}
	echo "</table>";
}
 retrieveText();
?>

</body>
</html>