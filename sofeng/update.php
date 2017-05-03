<?php

include("db.php");


$id = $_POST['user_id'];
$email = $_POST['email'];
$name = $_POST['u_name'];

$count = count($id);

for($c = 0; $c < $count; $c++){
$result = mysql_query("UPDATE request SET fullname='$email[$c]', item='$name[$c]', approved='$app[$c]' WHERE id='$id[$c]'") or die(mysql_error());

}
header("location: index.php");

?>