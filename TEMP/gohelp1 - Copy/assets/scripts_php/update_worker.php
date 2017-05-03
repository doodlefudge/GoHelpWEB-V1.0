<?php
try{
$error = '';
include($_SERVER['DOCUMENT_ROOT'].'/gohelp1/assets/connection/connection.php');

	$pdo = new PDO($dsn, $user, $pass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql= "UPDATE tbl_user_info SET 
				lname = :lname,
				fname = :fname,
				mname = :mname,
				address_lot = :address_lot,
				address_street = :address_street,
				address_brgy = :address_brgy,
				address_city = :address_city,
				contact_info = :contact_info,
				email_addr = :email_addr
				WHERE id = :id"; 
	$stmt = $pdo->prepare($sql);
	$w_lname = $_POST['w_lastname'];
	$w_fname =  $_POST['w_fname'];
	$w_mname = $_POST['w_middle'];
	$w_address_lot =  $_POST['w_address_lot'];
	$w_address_street =  $_POST['w_address_street'];
	$w_address_brgy =  $_POST['w_address_brgy'];
	$w_address_city =  $_POST['w_address_city'];
	$w_contactno = $_POST['w_contactno'];
	$w_email = $_POST ['w_email'];
	$w_id =  $_POST ['w_id'];
	$stmt->bindParam(':lname', $w_lname );
	$stmt->bindParam(':fname', $w_fname);
	$stmt->bindParam(':mname', $w_mname);
	$stmt->bindParam(':address_lot', $w_address_lot);
	$stmt->bindParam(':address_street', $w_address_street);
	$stmt->bindParam(':address_brgy', $w_address_brgy);
	$stmt->bindParam(':address_city', $w_address_city);
	$stmt->bindParam(':contact_info', $w_contactno);
	$stmt->bindParam(':email_addr', $w_email);
	$stmt->bindParam(':id', $w_id);
	
	$stmt->execute();
	
	
	$sql1= "UPDATE tbl_user set isActive = 1 where id = :id";	
	$stmt1 = $pdo->prepare($sql1);
	$stmt1->bindParam(':id', $w_id);
	$stmt1->execute();
	
	echo"true";
	
	
}catch(PDOException $e){
	echo "false" . $e->getMessage();
}

?>