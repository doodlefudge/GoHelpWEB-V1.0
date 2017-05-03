<?php
include_once('/home/camayaco/public_html/admin/assets/connection/connection.php');
include_once('/home/camayaco/public_html/admin/assets/connection/class.phpmailer.php');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql= "UPDATE schedule_type SET type_name = :type_name,
                                    type_description = :type_description,
                                    person_minimum = :min,
                                    person_maximum = :max,
                                    type_price = :type_price,
                                    schedule_sec_info = :schedule_sec_info 
                                    WHERE schedule_type_id = :schedule_type_id";
$stmt = $pdo->prepare($sql);
$schedule_type_id = $_POST['schedule_type_id'];;
$type_name =  $_POST['type_name'];
$type_description =  $_POST['type_description'];
$min =  $_POST['person_minimum'];
$max =  $_POST['person_maximum'];
$type_price =  $_POST['type_price'];
$schedule_sec_info=  $_POST['schedule_sec_info'];
$stmt->bindParam(':type_name', $type_name);
$stmt->bindParam(':type_description', $type_description);
$stmt->bindParam(':min', $min);
$stmt->bindParam(':max', $max);
$stmt->bindParam(':type_price', $type_price);
$stmt->bindParam(':schedule_sec_info', $schedule_sec_info);
$stmt->bindParam(':schedule_type_id', $schedule_type_id);
$stmt->execute();
echo "true";