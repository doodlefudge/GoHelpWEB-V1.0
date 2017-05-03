<?php 
session_start();
if(!isset($_SESSION['id']) || !isset($_SESSION['user']) || !isset($_SESSION['pass']) || !isset($_SESSION['char'])){
header("Location: index.php");
} 
?>
<?php include "config.php";?>

<?php
		$char = $_SESSION['char'];
		$user = $_SESSION['user'];
		$id = $_SESSION['id'];
		$itemids = $_GET['detail'];
		$page = $_GET['pages'];
		$topic = $_GET['categories'];
		// 1.Creating a Connection.
		$con = mysql_connect($server,$username,$password);
		if (!$con){
		die("Database connection failed: " . mysql_error());
		}
	
		//Selecting a Database CS.
		$csdb = mysql_select_db($db, $con);
		if (!$csdb){
		die("Database selection failed: " . mysql_error());
		}	
	
		//Perform database query on CS shop
		$shop = mysql_query("SELECT * FROM shop WHERE itemid='$itemids'", $con);
		if (!$shop) {
			die("Database query failed: " . mysql_error());
		}

		//Use returned data on CS
		$row = mysql_fetch_array($shop);
		$costdpt = $row['cost'];
		$itemid = $row['itemid'];
		$itemcount = $row['count'];
		$item_name = $row['name'];
		
		
		//Selecting a Database flyforfight .
		$flyforfightdb = mysql_select_db($flyffdb, $con);
		if (!$flyforfightdb){
		die("Database selection failed: " . mysql_error());
		}

		//Perform database query character
		$account = mysql_query("SELECT * FROM characters WHERE charname='$char'", $con);
		if (!$account) {
			die("Database query failed: " . mysql_error());
		}
		
		//Use returned data on flyforfight character
		$row2 = mysql_fetch_array($account);
		$name = $row2['charname'];
		$charid = $row2['id'];
		$accname = $row2['accountname'];
		$penya = $row2['penya'];		
		

		//Perform database query accounts
		$acc_sql = mysql_query("SELECT * FROM accounts WHERE username='$user'", $con);
		if (!$acc_sql) {
			die("Database query failed: " . mysql_error());
		}
		
		// 4. Use returned data on flyforfight character
		$acc_db = mysql_fetch_array($acc_sql);
		$acc_dpt = $acc_db['dpt'];
		if($acc_dpt >= $costdpt){
		$acc_total = $acc_dpt - $costdpt;
		if($itemids == ""){
		header("location: index.php");
		}
		else{
				
		//Selecting a Database flyforfight .
		$flyforfightdb = mysql_select_db($flyffdb, $con);
		if (!$flyforfightdb){
		die("Database selection failed: " . mysql_error());
		}
		 
		$sql = mysql_query("INSERT INTO mails VALUES ('$acc_total', '99000', '$charid', '0', '0', 'Your order!', 'Here is your order!', '0', '$itemid', '0', '$itemcount', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '-1');");
		 	
		 	$q = "UPDATE accounts SET dpt='$acc_total'". 
			     "WHERE id='$id'";
			$result = mysql_query($q);
			header("location: shop.php?categories=" . $topic . "&pages=" .$page . "&msg=1");
	
	//echo "<br />____________________________________________________<br />";
	//echo  "FIRST DATABASE LOADED<br />";
	//echo  "Item Name: " .$item_name ."<br />";
	//echo  "Item Info: " .$info ."<br />";
	//echo  "Item ID: " .$itemid ."<br />";
	//echo  "Item ID Penya Cost: " .$costpenya ."<br />";
	//echo  "Item ID Donation Point Cost: " .$costdpt ."<br />";
	//echo "<br />____________________________________________________<br />";
	//echo  "SECOND DATABASE LOADED<br />";
	//echo  "Character Name: " .$name ."<br />";
	//echo  "Character ID: " .$charid ."<br />";
	//echo  "Character Penya Total: " .$penya ."<br />";
	//echo  "Character Account Name: " .$accname ."<br />";
	//echo "Data Base loaded Successful<br />";
	//echo "<br />____________________________________________________<br />";
	//echo "Account Owner ID: " .$id ."<br />";
	//echo "Account Owner Character: " .$char ."<br />";
	//echo "Account Owner User ID: " .$user ."<br />";
	//echo "Account Owner User Donation Point: " .$acc_dpt ."<br />";
	//echo "Account Owner Donation Subtract price from item Donation left: " .$acc_total ."<br />";
	//echo "<br />____________________________________________________<br />";
}
		} else {
		 header("location: shop.php?categories=" . $topic . "&pages=" .$page . "&msg=2");
		}
?>
<?php
 // Closing Connection
 if (isset($con)){
 mysql_close($con);
 }
?>