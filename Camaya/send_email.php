<?php
include_once('inc\connection\connection.php');
include_once('inc\config\class.phpmailer.php');



$mail = new PHPMailer(true);	

$email = $_GET["email"];
$schedule_id = $_GET['schedule_id'];
//echo $qry;

$number = 	 $obj[0]["wrkcntact"] ;
$clientId = '844becf009e2fa1682bd286c2597a5fd166f8fdfeaa01b044d015ae5970ea454';
$secretKey = '0bdb44fb836e8ff7eed57011e36f0c17e0374592d259b206d82114ca003c35aa';
$shortCode = '292900419';
$rand = randomNumber(32);
//echo $number."<br/>";
$subject    = "Camaya Coast PH - Schedule Confirmation";
$message  = "<p> Hello, This email was sent because you set a scheduled room reservation/tour package reserved for a date. </p>
             <p> Please Click <a href='http://camayacoast.ph/confirm?schedule_id=$schedule_id'>here</a> to confirm this schedule. </p> ";
			
			
			
			// HTML email ends here
			
try
{
	$mail->IsSMTP(); 
	$mail->isHTML(true);
	$mail->SMTPDebug  = 1;                     
	$mail->SMTPAuth   = true;                  
	$mail->SMTPSecure = "ssl";                 
	$mail->Host       = "smtp.gmail.com";      
	$mail->Port       = 465;             
	$mail->AddAddress($email);
	$mail->Username   ="camayaph@gmail.com";
	$mail->Password   ="passwordzaq12wsx";
	$mail->SetFrom('camayaph@gmail.com','Schedule Confirmation');
	$mail->AddReplyTo("camayaph@gmail.com","GoHelp E-Reciept");
	$mail->AddStringAttachment($attachment, 'GoHelp E-Reciept.pdf');
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

		echo "true";
}
?>