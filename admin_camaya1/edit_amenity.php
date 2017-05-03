<?php
include_once('/home/camayaco/public_html/admin/assets/connection/connection.php');
include_once('/home/camayaco/public_html/admin/assets/connection/class.phpmailer.php');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql= "UPDATE amenities SET amenity_name = :amenity_name,
                                    amenity_desc = :amenity_desc,
                                    amenity_price = :amenity_price
                                    WHERE amenity_id = :amenity_id";
$stmt = $pdo->prepare($sql);
$amenity_id = $_POST['amenity_id'];;
$amenity_name =  $_POST['amenity_name'];
$amenity_desc =  $_POST['amenity_desc'];
$amenity_price =  $_POST['amenity_price'];
$stmt->bindParam(':amenity_id', $amenity_id);
$stmt->bindParam(':amenity_name', $amenity_name);
$stmt->bindParam(':amenity_desc', $amenity_desc);
$stmt->bindParam(':amenity_price', $amenity_price);
$stmt->execute();
echo "true";