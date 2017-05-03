<?php
if(isset ($_POST["addbut"])){


$connection = mysql_connect('localhost','root','');
mysql_select_db('db_ict_31') ;

$ID = $_POST['ID'];
$employee =  mysql_real_escape_string($_POST['employee']);
$leaves = mysql_real_escape_string($_POST['leaves']);
$date =  mysql_real_escape_string($_POST['date']);
$date = date('Y-m-d', strtotime($_POST['date']));
$action =  mysql_real_escape_string($_POST['action']);
$comment =  mysql_real_escape_string($_POST['comment']);
$dates =  mysql_real_escape_string($_POST['dates']);
$dates = date('Y-m-d', strtotime($_POST['dates']));
$asd = "INSERT into hr_tbl_leav (emp, numd, leav, act, star, ends, comm) values ('$employee','$ID','$leaves','$action','$date','$dates','$comment')";
$result = mysql_query($asd);


mysql_close($connection);
header('Location: leave.php');				
}

?>