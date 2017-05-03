<?php
/**
 * Created by PhpStorm.
 * User: Joan Mariano
 * Date: 3/30/2017
 * Time: 12:26 PM
 */
include_once("inc/connection/connection.php");

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
date_default_timezone_set('Asia/Manila');
$from = $_POST['from'];
$to = $_POST['to'];
$sql= "SELECT count(*) 
FROM schedule_info
WHERE STR_TO_DATE('$from','%d/%m/%Y') >= STR_TO_DATE(scheduled_date,'%d/%m/%Y')
AND  STR_TO_DATE('$to','%d/%m/%Y') <= STR_TO_DATE(schedule_end,'%d/%m/%Y')";
$nRows = $pdo->query($sql)->fetchColumn();
if($nRows ==     0){
    echo "true";
}else {
    echo "false";
}