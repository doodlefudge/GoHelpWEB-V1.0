<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ob_start();
include_once('/home/camayaco/public_html/admin/assets/connection/connection.php');
include_once('/home/camayaco/public_html/admin/assets/connection/class.phpmailer.php');
try{

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $qry = "DELETE FROM schedule_type WHERE schedule_type_id  = :schedule_type_id";
    $scheduleID = $_POST['scheduleid'];
    $stmt = $pdo->prepare($qry);
    $stmt->bindParam(":schedule_type_id",$scheduleID);

    $stmt->execute();
    echo 'true';
}catch(PDOException $e){
    echo $e;
};
