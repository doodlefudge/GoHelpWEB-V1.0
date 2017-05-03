<?php
try{
$error = '';
include($_SERVER['DOCUMENT_ROOT'].'/gohelp1/assets/connection/connection.php');
$pdo = new PDO($dsn, $user, $pass);
$sql= "SELECT count(*) as count from tbl_user where user = :user"; 
$stmt = $pdo->prepare($sql);
$w_user = $_POST['w_username'];
$stmt->bindParam(':user', $w_user);
$stmt->execute();
$obj = $stmt->fetchObject();
if(((int)$obj->count<1)){
$w_password =  $_POST['w_password'];
$rep_password = $_POST['rep_password'];
	if($w_password == $rep_password){
		$pdo = new PDO($dsn, $user, $pass);
		$sql= "SELECT count(*) as count from tbl_user_info WHERE id LIKE '". 'USER'.date('Ymd')."%'" ;
		$stmt = $pdo->prepare($sql);
		$w_fname = $_POST['w_fname'];
		$stmt->bindParam(':name', $w_fname );
		$stmt->execute();
		$obj = $stmt->fetchObject();

		$pdo = new PDO($dsn, $user, $pass);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql= "INSERT INTO tbl_user_info VALUES(:id,:lname,:fname,:mname,:address_lot,:address_street,:address_brgy,:address_city,:contact_info,:email_addr,0,0)"; 
		$stmt = $pdo->prepare($sql);
		$user_id = 'USER'.date('Ymd').(((int)$obj->count) + 1);
		$w_lname = $_POST['w_lastname'];
		$w_fname =  $_POST['w_fname'];
		$w_mname = $_POST['w_middle'];
		$w_address_lot =  $_POST['w_address_lot'];
		$w_address_street =  $_POST['w_address_street'];
		$w_address_brgy =  $_POST['w_address_brgy'];
		$w_address_city =  $_POST['w_address_city'];
		$w_contactno = $_POST['w_contactno'];
		$w_email = $_POST ['w_email'];
		
		$stmt->bindParam(':id', $user_id);
		$stmt->bindParam(':lname', $w_lname );
		$stmt->bindParam(':fname', $w_fname);
		$stmt->bindParam(':mname', $w_mname);
		$stmt->bindParam(':address_lot', $w_address_lot);
		$stmt->bindParam(':address_street', $w_address_street);
		$stmt->bindParam(':address_brgy', $w_address_brgy);
		$stmt->bindParam(':address_city', $w_address_city);
		$stmt->bindParam(':contact_info', $w_contactno);
		$stmt->bindParam(':email_addr', $w_email);
		$stmt->execute();
		
		
		$pdo = new PDO($dsn, $user, $pass);
		$sql = "INSERT INTO tbl_user VALUES (:worker_id,:username,:password,1,2)";
		$stmt = $pdo->prepare($sql);
		
		
		$w_user = $_POST['w_username'];
		
		$stmt->bindParam(':worker_id', $user_id);
		$stmt->bindParam(':username', $w_user );
		$stmt->bindParam(':password', $w_password);
		$stmt->execute();
		$obj= $stmt->fetchObject();
		echo "true";
	}else{
		echo "false";
	}


}else{
	echo "user";
}


	
}catch(PDOException $e){
	echo "false" . $e->getMessage();
}

?>