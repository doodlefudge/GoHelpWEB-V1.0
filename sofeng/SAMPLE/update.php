<?php

include("db.php");


$id = $_POST['user_id'];
$email = $_POST['email'];
$name = $_POST['u_name'];

$count = count($id);

for($c = 0; $c < $count; $c++){
$result = mysql_query("UPDATE del SET email='$email[$c]', u_name='$name[$c]' WHERE user_id='$id[$c]'") or die(mysql_error());

}
header("location: index.php");

?>