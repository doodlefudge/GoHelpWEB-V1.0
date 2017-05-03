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
	$sql= " SELECT COUNT(*) AS count FROM tbl_service_confirmation WHERE serv_conf_id LIKE 'CONF".date('Y')."%' "; 
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	$obj = $stmt->fetchObject();
	$id = $obj->count;

	$sql= "".date('Y')."%' "; 
	$stmt = $pdo->prepare($sql);
	$stmt->execute();

	$sql= "INSERT INTO tbl_service_confirmation VALUES(:serv_conf_id,:request_id,:serv_quote,:worker_id,:serv_conf_status,:worker_conf_status,:serv_summary,:timestamp)"; 
	$stmt = $pdo->prepare($sql);
	$serv_conf_id = "CONF".date('Y').($id + 1);
	$request_id1 = $_POST['request_id'];
	$serv_quote = $_POST['serv_quote'];
	$worker_id = $_POST['worker_id'];
	$serv_conf_status = '0';
	$worker_conf_status = '0';
	$timestamp = date("Y-m-d H:i:s");
	$serv_summary = $_POST['serv_summary'];
	$stmt->bindParam(':serv_conf_id', $serv_conf_id );
	$stmt->bindParam(':request_id', $request_id1);
	$stmt->bindParam(':serv_quote', $serv_quote);
	$stmt->bindParam(':worker_id', $worker_id);
	$stmt->bindParam(':serv_conf_status', $serv_conf_status );
	$stmt->bindParam(':worker_conf_status', $worker_conf_status );
	$stmt->bindParam(':serv_summary', $serv_summary);
	$stmt->bindParam(':timestamp', $timestamp);
	$stmt->execute();

	$sql= " UPDATE tbl_service_request SET service_status = '2' WHERE request_id = :request_id"; 
	$stmt1 = $pdo->prepare($sql);
	$stmt1->bindParam(':request_id', $request_id1);
	$stmt1->execute();
	
	$sql1= " UPDATE tbl_service_request r 
			INNER JOIN tbl_service_confirmation c 
			ON c.request_id = r.request_id SET r.service_status = '1'
			WHERE (time_of_confirmation < NOW() - INTERVAL 30 SECOND_MICROSECOND)
			AND (c.worker_conf_status = '0')
			AND (c.request_id = '". $request_id1."')"; 
	$stmt2 = $pdo->prepare($sql1);
	// $sql;

	$stmt1->execute();
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