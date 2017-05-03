<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ob_start();
include_once('/home/camayaco/public_html/admin/assets/connection/connection.php');
include_once('/home/camayaco/public_html/admin/assets/connection/class.phpmailer.php');
try{

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $qry = "DELETE FROM amenities WHERE amenity_id  = :amenity_id";
    $amenity_id = $_POST['amenity_id'];
    $stmt = $pdo->prepare($qry);
    $stmt->bindParam(":amenity_id",$amenity_id);

    $stmt->execute();
    echo 'true';
}catch(PDOException $e){
    echo $e;
};
