<?php
include_once('..\gohelp.me\assets\connection\connection.php');

$pdo = new PDO($dsn,$user,$pass);
$sql = "SELECT * FROM tbl_service_request r LEFT JOIN tbl_user_info i ON r.customer_id = i.id LEFT JOIN tbl_service_detail d ON  r.serv_detail_id = d.serv_detail_id ";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$obj = $stmt->fetchAll(); 
$nRows = $pdo->query('select count(*) from tbl_service_request')->fetchColumn(); 
for($i = 0 ; $i < $nRows ; $i++){
	$date1 = new DateTime($obj[$i]['date_of_service']. ' ' . $obj[$i]['time_start_of_service']);
	$date2 = new DateTime($obj[$i]['date_of_service']. ' ' . $obj[$i]['time_end_of_service']);
	 echo $date1->format('d/m/Y h:s').'<br>';
	 echo $date2->format('d/m/Y h:s').'<br>';
	 $diff = $date2->diff($date1);

	$hours = $diff->h;
	$hours = $hours + ($diff->days*24);
	$amount =  $hours * $obj[$i]['service_price'];
	echo $amount;
}
?>