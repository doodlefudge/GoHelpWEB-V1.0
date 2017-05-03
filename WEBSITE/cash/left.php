<?php include "config.php";?>
<?php
		$user = $_SESSION['user'];
		// 1.Creating a Connection.
		$con = mysql_connect($server,$username,$password);
		if (!$con){
		die("Database connection failed: " . mysql_error());
		}
		
		//Selecting a Database flyforfight .
		$flyforfightdb = mysql_select_db($flyffdb, $con);
		if (!$flyforfightdb){
		die("Database selection failed: " . mysql_error());
		}

		// 3. Perform database query accounts
		$acc_sql = mysql_query("SELECT * FROM accounts WHERE username='$user'", $con);
		if (!$acc_sql) {
			die("Database query failed: " . mysql_error());
		}
		
		// 4. Use returned data on flyforfight character
		$acc_db = mysql_fetch_array($acc_sql);
		$dpt_left = $acc_db['dpt'];
?>
<?php
 // Closing Connection
 if (isset($con)){
 mysql_close($con);
 }
?>