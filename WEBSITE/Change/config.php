<?php
// By PeChU!! 
if(stristr($_SERVER['PHP_SELF'], "config.php")) die('asdada'); 
$host = "localhost"; // host mysql
$user = "root"; // mysql username
$pass = "1234"; // mysql password
$db = "flyff"; // mysql db

mysql_connect($host,$user,$pass) or die(mysql_error());
mysql_select_db($db) or die(mysql_error());

function nw($N, $C){
  $reg = mysql_query("INSERT INTO accounts (username, password, accesslevel) VALUES( '$N', '$C', '100')")or die(mysql_error());
  return $reg;
  }
function exi($user){
$check = mysql_query("SELECT * FROM accounts WHERE username = '$user'");
$check2 = mysql_num_rows($check);
return $check2;
}
  
  ?>