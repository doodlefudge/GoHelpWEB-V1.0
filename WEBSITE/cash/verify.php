<?php 
$user = $_POST['user'];
$pass = $_POST['pass'];
$char = $_POST['char'];


session_start();
$_SESSION['user'] = $user;
$_SESSION['char'] = $char;
$_SESSION['pass'] = $pass;
?>

<?php
	// Error Proccessing with fix=1 Login Issue on login.php
	if (!isset($user) || !isset($pass) || !isset($char)) {
	header( "Location: index.php?fix=1" );
	}
	//check that the form fields are not empty, and redirect back to the login page if they are also give an error fix=1
	elseif (empty($user) || empty($pass)|| empty($char)) {
	header( "Location: index.php?fix=1" );
	} else {
	include "config.php";
	$con = mysql_connect($server,$username,$password);
	mysql_select_db($flyffdb);
	$passmd5 = md5("kikugalanet$pass");
	$result = mysql_query("SELECT * FROM accounts WHERE username='$user' and password='$passmd5'");
	$row = mysql_fetch_array($result);
	$id = $row['id'];
	$user_id = $row['username'];
	$user_pw = $row['password'];
	$logged_in = $row['logged_in'];
	$result2 = mysql_query("SELECT * FROM characters WHERE charname='$char'");
	$row2 = mysql_fetch_array($result2);
	$char_id = $row2['charname'];
	$acc_id = $row2['accountname'];
	$user_buff = $row2['id'];
		mysql_close($con);
		$_SESSION['id'] = $id;	
		$_SESSION['user_buff'] = $user_buff;
		$_SESSION['logged_in'] = $logged_in;
	// Check if Username Match to the database. If doesnt match error fix=1 located in login.php form	
	if($user != $user_id || $passmd5 != $user_pw){
	//echo "Login Issue Try again.<br />";
	header("Location: index.php?fix=1");
	} else {
	//echo "Successful Login.<br />";
	// Check if Character Match to the database.  If doesnt match error fix=3 located in login.php form	
	if ($char != $char_id){
	//echo "Not Valid Character.<br />";
	header("Location: index.php?fix=2");
	} else {
	//echo "Successful Character.<br />";
	// Check if Character is on owner account on the database. If doesnt match error fix=4 located in login.php form	
	if ($user != $acc_id){
	//echo "Account Don't Belong to you. You Theif IP BAN MUAHAHAH!<br />";
	header("Location: index.php?fix=3");
	} else {
	//echo "Successful Account Character Belong to you.<br />";
	header("Location: shop.php");
	//echo $user_buff;
	}
	}
	}
	}
	
?>