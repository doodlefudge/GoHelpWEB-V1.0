<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ob_start();
include_once('/home/camayaco/public_html/admin/assets/connection/connection.php');
include_once('/home/camayaco/public_html/admin/assets/connection/class.phpmailer.php');
try{

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $qry = "UPDATE schedule_info SET `schedule_status` = '2' WHERE `schedule_ID` = :schedule_id";
    $scheduleID = $_POST['schedule_ID'];
    $stmt = $pdo->prepare($qry);
    $stmt->bindParam(":schedule_id",$scheduleID);

    $stmt->execute();
    $temp = "SELECT 
                                    inquirer_email 
                                   FROM 
                                   customer_inquiry ci 
                                   INNER JOIN 
                                   schedule_info sch
                                   ON
                                   ci.inquire_ID = sch.inquire_ID
                                   WHERE `schedule_ID` = '".$scheduleID."'
                                   ";
    $inquirer_email = $pdo->query($temp)->fetchColumn();
}catch(PDOException $e){
    echo $e;
};
$mail = new PHPMailer(true);
$subject    = "Camaya Coast PH - Approved Schedule for Room/Tour Reservation";
$message  = "<p> Hello, This email was sent because your set a scheduled room reservation/tour has been approved </p>
             <p> Please Click <a href='http://camayacoast.ph/schedule_print.php?schedule_id=$scheduleID'>here</a> to download the schedule details. </p> ";

try
{
    $mail->IsSMTP();
    $mail->isHTML(true);
    $mail->SMTPDebug  = 1;
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host       = "pisces.zoom.ph";
    $mail->Port       = 465;
    $mail->AddAddress($inquirer_email);
    $mail->Username   ="messenger@camayacoast.ph";
    $mail->Password   ="Passwordzaq12wsx";
    $mail->SetFrom('messenger@camayacoast.ph','Schedule Confirmation');
    $mail->AddReplyTo("messenger@camayacoast.ph","Schedule Confirmation");
    $mail->Subject    = $subject;
    $mail->Body 	  = $message;
    $mail->AltBody    = $message;

    if($mail->Send())
    {
        echo "true";

    }
}
catch(phpmailerException $ex)
{

    ?>
    <script>
        console.log("Something went wrong" . <? echo $inquirer_email . " " . $temp  ?>);
    </script>
    <?php
}