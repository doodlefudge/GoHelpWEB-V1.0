<?php
include($_SERVER['DOCUMENT_ROOT'].'/assets/connection/connection.php');
include($_SERVER['DOCUMENT_ROOT'].'/assets/connection/ChikkaSMS.php');
function randomNumber($length) {
    $result = '';

    for($i = 0; $i < $length; $i++) {
        $result .= mt_rand(0, 9);
    }

    return $result;
}
try
{
	$pdo = new PDO($dsn, $user, $pass);
	$sql= " UPDATE tbl_service_confirmation SET serv_conf_status = '-1' WHERE serv_conf_id = :serv_conf_id"; 
	$stmt1 = $pdo->prepare($sql);
	$serv_conf_id = $_POST['serv_conf_id'];
	$stmt1->bindParam(':serv_conf_id', $serv_conf_id);
	$stmt1->execute();
	
	$sql= " SELECT u.*,d.service_name  FROM tbl_user_info u 
			INNER JOIN tbl_service_request r ON r.customer_id = u.id 
			INNER JOIN tbl_service_confirmation c ON c.request_id = r.request_id 
			INNER JOIN tbl_service_detail d ON d.serv_detail_id = r.serv_detail_id
			WHERE serv_conf_id = :serv_conf_id"; 
	$stmt1 = $pdo->prepare($sql);
	$stmt1->bindParam(':serv_conf_id', $serv_conf_id);
	$stmt1->execute();
	$obj1 = $stmt1->fetchAll();
	
	$name = $obj1[0]["fname"]. ' ' . $obj1[0]["lname"];
	$number = $obj1[0]["contact_info"];
	$service_name = $obj1[0]["service_name"];
	$clientId = '844becf009e2fa1682bd286c2597a5fd166f8fdfeaa01b044d015ae5970ea454';
	$secretKey = '0bdb44fb836e8ff7eed57011e36f0c17e0374592d259b206d82114ca003c35aa';
	$shortCode = '292900419';
	$rand = randomNumber(32);
	//echo $number."<br/>";
	$chikkaAPI = new ChikkaSMS($clientId,$secretKey,$shortCode);
	$message = "Hello, $name. your request for $service_name has been cancelled. We currently have no workers available. We are very sorry for this inconvenience. ";
	$response = $chikkaAPI->sendText($rand,$number, $message);
	
	echo "true";
	
}catch(Exception $e){
	echo "false";
}

?>