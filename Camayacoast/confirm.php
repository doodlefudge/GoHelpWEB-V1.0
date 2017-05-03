<?php include_once("inc/templates/header.php");?>
<?php include_once("inc/connection/connection.php");?>
<?php include_once('inc/config/class.phpmailer.php');
error_reporting(-1);
ini_set('display_errors', 1);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$qry = "UPDATE schedule_info SET `schedule_status` = '1' WHERE `schedule_ID` = :schedule_id";
$schedule_id = $_GET['id'];
$stmt = $pdo->prepare($qry);
$stmt->bindParam(":schedule_id",$schedule_id);

$stmt->execute();
$_SESSION['alert'] = "<p>Your confirmation has been sent to Camaya Coast.</p><p>We promise to make contact as soon as possible</p> ";


header("location : index.php");
?>

