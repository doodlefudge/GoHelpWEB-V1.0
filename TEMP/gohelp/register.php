<?php
try{
	
	include_once('connect.php');
	$dsn = 'mysql:host='.$host.';dbname='.$db.'';
	$pdo = new PDO($dsn, $user, $pass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//checks if username already taken
	$sql= "SELECT count(*) as count from tbl_user where user = :user"; 
	$stmt = $pdo->prepare($sql);
	$id = $_GET['user'];
	$stmt->bindParam(':user', $id);
	$stmt->execute();
	$obj = $stmt->fetchObject();
	if(((int)$obj->count<1)){
		//gets id for inserting
		$sql= "SELECT count(*) as count from tbl_user_info WHERE id LIKE '". 'USER'.date('Ymd')."%'"; 
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		$obj = $stmt->fetchObject();
		$id = 'USER'.date('Ymd').(((int)$obj->count) + 1);
		
		//adds user credentials for login
		$sql= "insert into tbl_user values (:id,:user,:pass,'1','1')"; 
		$stmt = $pdo->prepare($sql);
		$user = $_GET['user'];	
		$pass =  $_GET['pass'];
		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':user', $user);
		$stmt->bindParam(':pass', $pass);
		$stmt->execute();
		
		//add user information
		$sql = "insert into tbl_user_info values (:id,:lname,:fname,:mname,:address,:contact,:email)";
		$stmt = $pdo->prepare($sql);
		$lname = $_GET['lname'];
		$fname = $_GET['fname'];
		$mname = $_GET['mname'];
		$address = $_GET['address'];
		$contact = $_GET['contact'];
		$email = $_GET['email'];
		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':lname', $lname);
		$stmt->bindParam(':fname', $fname);
		$stmt->bindParam(':mname', $mname);
		$stmt->bindParam(':address', $address);
		$stmt->bindParam(':contact', $contact);
		$stmt->bindParam(':email', $email);
		$stmt->execute();
		
		echo json_encode(array('query'=>'1'));
	}else{
		echo json_encode(array('query'=>'0','error'=>'Username is already taken'));
	}
	
}catch(PDOException $e){
	echo json_encode(array('query'=>'0','error'=>$e->getMessage()));
	echo "Error: " . $e->getMessage();

}




?>