<?php

/**
 * @author JuZTiFY
 * @copyright 2008
 */

$cid = $_POST['character'];
$cc = 'true';

if($cid == ""){
	$verified = 'false';
}  else {
	$verified = 'true';
}

include "config.php";

if($verified == "true") {
	
	$con = mysql_connect($sqlserv, $sqluser, $sqlpass);
	mysql_select_db($db);
	
	$query = mysql_query("SELECT * FROM characters WHERE id = '$cid'");
	$get = mysql_fetch_array($query);
	
	$level = $get['level'];
	$acc = $get['accountname'];
	
	$query = mysql_query("SELECT * FROM accounts WHERE username = '$acc'");
	$get = mysql_fetch_array($query);
	
	$loggedin = $get['logged_in'];
	
	$query1 = mysql_query("SELECT * FROM buffs WHERE charid = '$cid' AND skilllvl = '20'");
	
	$count = mysql_num_rows($query1);
	
	if($count != 0){
		$cu = 'true';
		$cc = 'false';
	}

	if($level > $levelcap){
		echo "<p><font color=\"#FF0000\">This character has to high level to get buffed!</font></p>";
		$cc = 'false';
		$cu = 'false';
	} else if($loggedin == "1") {
		echo "<p><font color=\"#FF0000\">Please log out of the FlyFF client before using the buffer!</font></p>";
		$cc = 'false';
		$cu = 'false';
	}
	
	if($cc == 'true') {
		
		#Could not make an array here because of the Abilities in the DB.
		$buff1 = mysql_query("INSERT INTO buffs VALUES ('$cid', '114', '20', '11', '30', '0', '0', '0', '0', '$time')"); #Quick Step(id:114)
		$buff2 = mysql_query("INSERT INTO buffs VALUES ('$cid', '20', '20', '24', '500', '0', '0', '0', '0', '$time');"); #Haste(id:20)
		$buff3 = mysql_query("INSERT INTO buffs VALUES ('$cid', '115', '20', '14', '12', '0', '0', '0', '0', '$time');"); #Cat's Reflexes(id:115)
		$buff4 = mysql_query("INSERT INTO buffs VALUES ('$cid', '50', '20', '2', '20', '0', '0', '0', '0', '$time');"); #Cannon Ball(id:50)
		$buff5 = mysql_query("INSERT INTO buffs VALUES ('$cid', '52', '20', '3', '20', '0', '0', '0', '0', '$time');"); #Mental Sign(id:52)
		$buff6 = mysql_query("INSERT INTO buffs VALUES ('$cid', '49', '20', '4', '40', '0', '0', '0', '0', '$time');"); #Heap Up(id:49)
		$buff7 = mysql_query("INSERT INTO buffs VALUES ('$cid', '53', '20', '1', '20', '0', '0', '0', '0', '$time');"); #Beef Up(id:53)
		$buff8 = mysql_query("INSERT INTO buffs VALUES ('$cid', '116', '20', '47', '20', '0', '0', '0', '0', '$time');"); #Accuracy(id:116)
		
		#You can add more buffs by doing something like $buff9 = mysql_query("INSERT INTO BUFFS VALUES ()");.
		
		if(mysql_affected_rows() == 0){
			echo "<p><font color=\"#FF0000\">Could not execute the Buff query for some reason!</font></p>";
		} else {
			echo "<p><font color=\"#339900\">Your buffs have been added!";
		}
		
	} else if($cu == 'true'){
		
		$skillarray = array('114','20','115','50','52','49','53','116');
		
		foreach($skillarray AS $a_data){
			$sql = "UPDATE buffs SET remainingTime='$time'". 
			"WHERE skilllvl='20' AND skillid='$a_data'";
			$query = mysql_query($sql);
		}
		if(mysql_affected_rows() == 0){
			echo 'lol';
		} else {
			echo 'yay!';
		}
	}
	
} else {
	
	echo "<p><font color=\"#FF0000\">Don't try anything fishy.</font></p>";
	
}

?>