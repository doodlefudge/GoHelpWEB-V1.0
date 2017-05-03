<?php
session_start();

include_once './config.php';

$user_id = $_GET['user_id'];
$user_id ="pantera";
$sql = "SELECT `user_id`,  `unit_id` FROM `game_obj_tbl` WHERE user_id = '".$account_id."' ";

$result = mysqli_query($link, $sql);	

	while($r = mysqli_fetch_array($result)){
	  echo $r['user_id']." - user id<br>";
	  echo $r['unit_id']." - unit id, on going<br>";
	}



?>