<?php
function randomNumber($length) {
    $result = '';

    for($i = 0; $i < $length; $i++) {
        $result .= mt_rand(0, 9);
    }

    return $result;
}
try{
	include($_SERVER['DOCUMENT_ROOT'].'/gohelp1/assets/connection/ChikkaSMS.php');
	include($_SERVER['DOCUMENT_ROOT'].'/gohelp1/assets/connection/gsmencoder.class.php');
	include($_SERVER['DOCUMENT_ROOT'].'/gohelp1/assets/connection/connection.php');
	$pdo = new PDO($dsn, $user, $pass);

	$sql= "UPDATE tbl_service_confirmation SET worker_id = :worker_id  , worker_conf_status = 0 WHERE serv_conf_id = :serv_conf_id"; 
	$stmt = $pdo->prepare($sql);
	$serv_conf_id = $_POST['serv_conf_id'];
	$worker_id = $_POST['worker_id'];
	$stmt->bindParam(':serv_conf_id', $serv_conf_id );
	$stmt->bindParam(':worker_id', $worker_id );

	$stmt->execute();


	//echo $worker_id;
	//echo $sql1;

	$sql= " SELECT * FROM tbl_user_info u  WHERE u.id  = '". $worker_id."'"; 
	$stmt2 = $pdo->prepare($sql);
	$stmt2->execute();
	$obj1 = $stmt2->fetchAll();
	//echo $sql;
	$name = $obj1[0]["fname"]. ' ' . $obj1[0]["lname"];
	$number = $obj1[0]["contact_info"];
	$clientId = '844becf009e2fa1682bd286c2597a5fd166f8fdfeaa01b044d015ae5970ea454';
	$secretKey = '0bdb44fb836e8ff7eed57011e36f0c17e0374592d259b206d82114ca003c35aa';
	$shortCode = '292900419';
	$rand = randomNumber(32);
	//echo $number."<br/>";
	$chikkaAPI = new ChikkaSMS($clientId,$secretKey,$shortCode);
	$message = "Hello, $name. You just received a work request! Please log in to see details.";
	$response = $chikkaAPI->sendText($rand,$number, $message);


	//header("HTTP/1.1 " . $response->status . " " . $response->message);

	echo "true";
	exit(0);
}catch(Exception $e){
	echo 'false' . $e;
}
?>