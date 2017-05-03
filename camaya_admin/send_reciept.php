<?php
include_once('assets\connection\connection.php');
include_once('assets\connection\class.phpmailer.php');
include_once('assets\mpdf\mpdf.php');
include_once('assets\connection\ChikkaSMS.php');

function randomNumber($length) {
    $result = '';

    for($i = 0; $i < $length; $i++) {
        $result .= mt_rand(0, 9);
    }

    return $result;
}

$mail = new PHPMailer(true);	

$email = $_GET["email"];
$serv_conf_id = $_GET["serv_conf_id"];
$pdo = new PDO($dsn,$user,$pass);
$qry = "SELECT 
	u.fname as custfname ,u.lname as custlname,
    d.service_name, 
    wrk.fname as wrkfname, wrk.lname as wrklname,
    c.serv_conf_id, tr.trans_id,tr.trans_date,
    tr.trans_amt,u.email_addr,wrk.contact_info as wrkcntact
FROM tbl_user_info u 
INNER JOIN tbl_service_request r ON r.customer_id = u.id 
INNER JOIN tbl_service_confirmation c ON c.request_id = r.request_id 
INNER JOIN tbl_user_info wrk ON wrk.id = c.worker_id 
INNER JOIN tbl_service_detail d ON r.serv_detail_id = d.serv_detail_id 
INNER JOIN tbl_trans_detail tr ON tr.serv_conf_id = c.serv_conf_id
WHERE c.serv_conf_id = '$serv_conf_id'";
$stmt = $pdo->prepare($qry);
$stmt -> execute();
$obj = $stmt->fetchAll();

//echo $qry;
$wrk_contact_info = $obj[0]["wrkcntact"] ;
$cust_name  = $obj[0]["custfname"] . " " . $obj[0]["custlname"] ;
$work_name  = $obj[0]["wrkfname"] . " " . $obj[0]["wrklname"] ;
$service_name = $obj[0]["service_name"];
$serv_conf_id = $obj[0]["serv_conf_id"];
$trans_id = $obj[0]["trans_id"];
$trans_amt = $obj[0]["trans_amt"];
$trans_date = $obj[0]["trans_date"];
$email      = $obj[0]["email_addr"] ;
$subject    = "GoHelp E-Reciept";
$text_message    = "Hello $cust_name, <br /><br /> This is email is sent by a daemon. DO NOT REPLY";			   

			// HTML email starts here
$number = 	 $obj[0]["wrkcntact"] ;
$clientId = '844becf009e2fa1682bd286c2597a5fd166f8fdfeaa01b044d015ae5970ea454';
$secretKey = '0bdb44fb836e8ff7eed57011e36f0c17e0374592d259b206d82114ca003c35aa';
$shortCode = '292900419';
$rand = randomNumber(32);
//echo $number."<br/>";
$chikkaAPI = new ChikkaSMS($clientId,$secretKey,$shortCode);
$message = "Hello, ".$work_name.". You are schedule to work for ".$service_name ." to Customer : ".$cust_name .". Log in for more Details.";
$response = $chikkaAPI->sendText($rand,$number, $message);
$message  = "<table width='100%' align='center' border='0' cellspacing='0' cellpadding='0' bgcolor='#f4f4f4'>
	<tbody>
		<tr>
		<td valign='top' width='45'><img style='display:block' src='https://ci4.googleusercontent.com/proxy/KNtCGe0etNX6tA16SOybvvomjU0EoDDJbhwapyhBYqy4HH7zO6w8_Vt_9UpfT9GsUS6xwC2mfMlHDAfSOdHj6F74EysNc88rAq7oYRG4BI5WrvRtzgs=s0-d-e1-ft#https://grabtaxi-marketing.s3.amazonaws.com/email/img/_blank.gif' alt='' width='20' height='10' border='0' class='CToWUd'>
		</td>

		<td align='center' valign='top'>
			<table border='0' cellspacing='0' cellpadding='0' width='100%'>
				<tbody>
					<tr> 
						<td align='left' height='20'>
						</td>
					</tr>
				</tbody>
			</table>
		<table border='0' cellspacing='0' cellpadding='0' width='100%'>
			<tbody>
				<tr> 

					<td width='55%' align='left' style='font-size:14px;font-weight:bold;color:#00af41'>

					</td>
				</tr>
			</tbody>
		</table> 

		<table width='100%' border='0' cellspacing='0' cellpadding='0'>
			<tbody>
				<tr>
					<td valign='top' width='200'>    
						<table width='100%' border='0' cellspacing='0' cellpadding='0'>
							<tbody>
								<tr>
									<td align='left' valign='top' style='font-size:14px;font-weight:bold;color:#00af41'>GoHelp</td>
								</tr>
						<tr>
							<td align='center' valign='middle' height='10'>
								<img style='display:block' src='https://ci4.googleusercontent.com/proxy/KNtCGe0etNX6tA16SOybvvomjU0EoDDJbhwapyhBYqy4HH7zO6w8_Vt_9UpfT9GsUS6xwC2mfMlHDAfSOdHj6F74EysNc88rAq7oYRG4BI5WrvRtzgs=s0-d-e1-ft#https://grabtaxi-marketing.s3.amazonaws.com/email/img/_blank.gif' alt='' width='170' height='10' border='0' class='CToWUd'>
							</td>
						</tr>

						<tr>
						<td valign='top'><table width='100%' border='0' cellpadding='0' cellspacing='0'>
						<tbody><tr>
						<td align='left' valign='top' style='padding:0cm 0cm 0cm 0cm'>

						<table width='100%' border='0' cellpadding='0' cellspacing='0'>
						<tbody><tr>
						<td valign='top'>
						<table width='100%' border='0' cellspacing='0' cellpadding='0'>

						<tbody><tr>
						<td align='left' valign='top'>
						<table border='0' cellspacing='0' cellpadding='0' width='100%'>
						<tbody><tr> 
						<td align='left'>
						<span style='font-size:10px;color:#9e9e9e;line-height:16px'>Service Name :</span><br>
						<span style='font-size:12px;line-height:16px;font-weight:bold'>".$service_name."</span>
						</td>
						</tr>
						</tbody></table>
						</td>
						</tr>
						<tr>
						<td height='3'><img style='display:block' src='https://ci4.googleusercontent.com/proxy/KNtCGe0etNX6tA16SOybvvomjU0EoDDJbhwapyhBYqy4HH7zO6w8_Vt_9UpfT9GsUS6xwC2mfMlHDAfSOdHj6F74EysNc88rAq7oYRG4BI5WrvRtzgs=s0-d-e1-ft#https://grabtaxi-marketing.s3.amazonaws.com/email/img/_blank.gif' alt='' width='20' height='3' border='0' class='CToWUd'></td>
						</tr> 

						<tr>
						<td align='left' valign='top'>
						<table border='0' cellspacing='0' cellpadding='0' width='100%'>
						<tbody><tr>
						<td align='left'>
						<span style='font-size:10px;color:#9e9e9e;line-height:14px'>Worker Assigned</span><br>
						<span style='font-size:12px;line-height:16px;font-weight:bold'>".$work_name."</span>
						</td>
						</tr>
						</tbody></table></td>
						</tr>

						<tr>
						<td height='3'><img style='display:block' src='https://ci4.googleusercontent.com/proxy/KNtCGe0etNX6tA16SOybvvomjU0EoDDJbhwapyhBYqy4HH7zO6w8_Vt_9UpfT9GsUS6xwC2mfMlHDAfSOdHj6F74EysNc88rAq7oYRG4BI5WrvRtzgs=s0-d-e1-ft#https://grabtaxi-marketing.s3.amazonaws.com/email/img/_blank.gif' alt='' width='20' height='3' border='0' class='CToWUd'></td>
						</tr>

						<tr>
						<td align='left' valign='top'>
						<table border='0' cellspacing='0' cellpadding='0' width='100%'>
						<tbody><tr>
						<td align='left'>
						<span style='font-size:10px;color:#9e9e9e;line-height:16px'>Issued to</span><br>
						<span style='font-size:12px;line-height:16px;font-weight:bold'>".$cust_name."</span>
						</td>
						</tr>
						</tbody></table>
						</td>
						</tr>

						<tr>
						<td height='3'><img style='display:block' src='https://ci4.googleusercontent.com/proxy/KNtCGe0etNX6tA16SOybvvomjU0EoDDJbhwapyhBYqy4HH7zO6w8_Vt_9UpfT9GsUS6xwC2mfMlHDAfSOdHj6F74EysNc88rAq7oYRG4BI5WrvRtzgs=s0-d-e1-ft#https://grabtaxi-marketing.s3.amazonaws.com/email/img/_blank.gif' alt='' width='20' height='5' border='0' class='CToWUd'></td>
						</tr>

																			<tr>
																			<td align='left' valign='top'>
																					<table border='0' cellspacing='0' cellpadding='0' width='100%'>
																					<tbody><tr> 
																						<td align='left'>
																						<span style='font-size:10px;color:#9e9e9e;line-height:16px'>Request Confirmation ID</span><br>
																						<span style='font-size:12px;line-height:16px;font-weight:bold'>".$serv_conf_id."</span>
																						</td>
																						</tr>
																						</tbody>
																					</table>
																				</td>
																			</tr>
																			<tr>
																				<td height='3'><img style='display:block' src='https://ci4.googleusercontent.com/proxy/KNtCGe0etNX6tA16SOybvvomjU0EoDDJbhwapyhBYqy4HH7zO6w8_Vt_9UpfT9GsUS6xwC2mfMlHDAfSOdHj6F74EysNc88rAq7oYRG4BI5WrvRtzgs=s0-d-e1-ft#https://grabtaxi-marketing.s3.amazonaws.com/email/img/_blank.gif' alt='' width='20' height='5' border='0' class='CToWUd'></td>
																			</tr>

																			<tr>
																				<td align='left' valign='top'>
																					<table border='0' cellspacing='0' cellpadding='0' width='100%'>
																						<tbody>
																							<tr> 
																								<td align='left'>
																									<span style='font-size:10px;color:#9e9e9e;line-height:16px'>Transaction ID</span><br>
																									<span style='font-size:12px;line-height:16px;font-weight:bold'>".$trans_id."</span>
																								</td>
																							</tr>
																						</tbody>
																					</table>
																				</td>
																			</tr>
																			<tr>
																				<td height='3'>
																					<img style='display:block' src='https://ci4.googleusercontent.com/proxy/KNtCGe0etNX6tA16SOybvvomjU0EoDDJbhwapyhBYqy4HH7zO6w8_Vt_9UpfT9GsUS6xwC2mfMlHDAfSOdHj6F74EysNc88rAq7oYRG4BI5WrvRtzgs=s0-d-e1-ft#https://grabtaxi-marketing.s3.amazonaws.com/email/img/_blank.gif' alt='' width='20' height='5' border='0' class='CToWUd'>
																				</td>
																			</tr>
																				<tr>
																					<td align='left' valign='top'>
																						<table border='0' cellspacing='0' cellpadding='0' width='100%'>
																							<tbody>
																								<tr> 
																									<td align='left'>
																									<span style='font-size:10px;color:#9e9e9e;line-height:16px'>Date Of Reciept</span><br>
																										<span style='font-size:12px;line-height:16px;font-weight:bold'>".$trans_date."</span>
																									</td>
																								</tr>
																							</tbody>	
																						</table>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																	</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>	
										</table>
									</td>
								</tr>
							</tbody>
						</table>
					</td>
					<td valign='top' width='9'><img style='display:block' src='https://ci4.googleusercontent.com/proxy/KNtCGe0etNX6tA16SOybvvomjU0EoDDJbhwapyhBYqy4HH7zO6w8_Vt_9UpfT9GsUS6xwC2mfMlHDAfSOdHj6F74EysNc88rAq7oYRG4BI5WrvRtzgs=s0-d-e1-ft#https://grabtaxi-marketing.s3.amazonaws.com/email/img/_blank.gif' alt='' width='9' height='10' border='0' class='CToWUd'></td>
				<td valign='top' width='10' bgcolor='#f5f5f3'><img style='display:block' src='https://ci4.googleusercontent.com/proxy/KNtCGe0etNX6tA16SOybvvomjU0EoDDJbhwapyhBYqy4HH7zO6w8_Vt_9UpfT9GsUS6xwC2mfMlHDAfSOdHj6F74EysNc88rAq7oYRG4BI5WrvRtzgs=s0-d-e1-ft#https://grabtaxi-marketing.s3.amazonaws.com/email/img/_blank.gif' alt='' width='10' height='10' border='0' class='CToWUd'></td>
				<td valign='top' width='270'>    
				<table width='100%' border='0' cellspacing='0' cellpadding='0'>
				<tbody><tr>
				<td align='left' valign='top' style='font-size:14px;font-weight:bold;color:#00af41'>Receipt Summary</td>
				</tr>
				<tr>
				<td align='center' valign='middle' height='10'><img style='display:block' src='https://ci4.googleusercontent.com/proxy/KNtCGe0etNX6tA16SOybvvomjU0EoDDJbhwapyhBYqy4HH7zO6w8_Vt_9UpfT9GsUS6xwC2mfMlHDAfSOdHj6F74EysNc88rAq7oYRG4BI5WrvRtzgs=s0-d-e1-ft#https://grabtaxi-marketing.s3.amazonaws.com/email/img/_blank.gif' alt='' width='170' height='10' border='0' class='CToWUd'></td>
				</tr>

				<tr>
				<td valign='top'><table width='100%' border='0' cellpadding='0' cellspacing='0' bgcolor='#ffffff' style='border:1px solid #dddddd'>
				<tbody><tr>
				<td align='left' valign='top' style='padding:0cm 0cm 0cm 0cm'>

				<table width='100%' border='0' cellpadding='0' cellspacing='0'>
				<tbody><tr>
				<td valign='top'>
				<table width='100%' border='0' cellspacing='0' cellpadding='0'>

				<tbody><tr>
				<td align='left' valign='top'>
				<table border='0' cellspacing='0' cellpadding='0' width='100%'>
				<tbody><tr>
				<td height='10px' align='left'></td>
				<td height='10px' colspan='2' align='left'></td>
				<td height='10px' align='left'></td>
				</tr>
				<tr>
				<td height='5px' align='left'></td>
				<td height='5px' colspan='2' align='left'>
				Payment Method:<br>
				<span style='font-weight:bold;color:#000000'>Credit Card - Visa &nbsp;&nbsp;</span>
				</td>
				<td height='5px' align='left'></td>
				</tr>
				<tr>
				<td height='5px' align='left'></td>
				<td height='5px' colspan='2' align='left'></td>
				<td height='5px' align='left'></td>
				</tr>
				<tr>
				<td height='3px' align='left'></td>
				<td height='3px' colspan='2' align='left' style='border-top:1px dashed #9e9e9e'></td>
				<td height='3px' align='left'></td>
				</tr>
				<tr> 
				<td align='left' width='15'></td>
				<td width='171' align='left'>
				<span style='font-size:11px;color:#9e9e9e;line-height:21px'>Description:</span>
				</td>
				<td width='80' align='left'>
				<span style='font-size:11px;color:#9e9e9e;line-height:28px'>&nbsp;&nbsp;Amount:</span>
				</td>
				<td align='left' width='15'></td>
				</tr>
				<tr>
				<td height='3px' align='left'></td>
				<td height='3px' colspan='2' align='left'></td>
				<td height='3px' align='left'></td>
				</tr>
				<tr>
				<td height='5px' align='left'></td>
				<td height='5px' colspan='2' align='left' style='border-top:1px dashed #9e9e9e'></td>
				<td height='5px' align='left'></td>
				</tr>

				<tr> 
				<td align='left' width='15'></td>
				<td align='left'>
				<span style='font-size:11px;color:#000000;line-height:18px'>Service Request</span>
				</td>
				<td align='left'>
				<span style='font-size:11px;color:#000000;line-height:18px'>&nbsp;&nbsp;PHP".$trans_amt.".00</span>
				</td>
				<td align='left' width='15'></td>
				</tr>




				<tr>
				<td height='10px' align='left'></td>
				<td height='10px' colspan='2' align='left'></td>
				<td height='10px' align='left'></td>
				</tr>
				<tr>
				<td height='10px' align='left'></td>
				<td height='10px' colspan='2' align='left' style='border-top:1px dashed #9e9e9e'></td>
				<td height='10px' align='left'></td>
				</tr>
				<tr> 
				<td align='left' width='15'></td>
				<td align='right'>
				<span style='font-size:12px;font-weight:bolder;color:#000000;line-height:28px'>TOTAL&nbsp;&nbsp;&nbsp;&nbsp;</span>
				</td>
				<td align='left'>
				<span style='font-size:12px;font-weight:bolder;color:#000000;line-height:28px'>&nbsp;&nbsp;PHP".$trans_amt.".00</span>
				</td>
				<td align='left' width='15'></td>
				</tr>

				</tbody></table>
				</td>
				</tr>


				<tr>
				<td align='left' valign='top'>
				<table border='0' cellspacing='0' cellpadding='0' width='100%'>
				<tbody><tr> 
				<td align='left'><img style='display:block' src='https://ci4.googleusercontent.com/proxy/KNtCGe0etNX6tA16SOybvvomjU0EoDDJbhwapyhBYqy4HH7zO6w8_Vt_9UpfT9GsUS6xwC2mfMlHDAfSOdHj6F74EysNc88rAq7oYRG4BI5WrvRtzgs=s0-d-e1-ft#https://grabtaxi-marketing.s3.amazonaws.com/email/img/_blank.gif' alt='' width='20' height='10' border='0' class='CToWUd'></td>
				</tr>
				</tbody></table>
				</td>
				</tr>                                                                       

				</tbody></table>
				</td>
				</tr>
				</tbody></table></td>
				</tr>
				</tbody></table></td>
				</tr>
				</tbody></table>
				</td>

				</tr>
				</tbody>
		</table>

		<table border='0' cellpadding='0' cellspacing='0' width='100%'>
		<tbody><tr>
		<td height='20'></td>
		</tr>
		</tbody></table>

		</td>
		<td valign='top' width='45'><img style='display:block' src='https://ci4.googleusercontent.com/proxy/KNtCGe0etNX6tA16SOybvvomjU0EoDDJbhwapyhBYqy4HH7zO6w8_Vt_9UpfT9GsUS6xwC2mfMlHDAfSOdHj6F74EysNc88rAq7oYRG4BI5WrvRtzgs=s0-d-e1-ft#https://grabtaxi-marketing.s3.amazonaws.com/email/img/_blank.gif' alt='' width='20' height='10' border='0' class='CToWUd'></td>
		</tr> </tbody>
</table>";
			
			
			
			// HTML email ends here
			
try
{
	$pdf=new mPDF();
	$pdf->AddPage();
	$pdf->WriteHTML($message);
	$attachment= $pdf->Output('test.pdf', 'S');

	$mail->IsSMTP(); 
	$mail->isHTML(true);
	$mail->SMTPDebug  = 1;                     
	$mail->SMTPAuth   = true;                  
	$mail->SMTPSecure = "ssl";                 
	$mail->Host       = "smtp.gmail.com";      
	$mail->Port       = 465;             
	$mail->AddAddress($email);
	$mail->Username   ="camayaph@gmail.com";
	$mail->Password   ="Thesisgroup";
	$mail->SetFrom('martin.marc02271994@gmail.com','GoHelp E-Reciept');
	$mail->AddReplyTo("martin.marc02271994@gmail.com","GoHelp E-Reciept");
	$mail->AddStringAttachment($attachment, 'GoHelp E-Reciept.pdf');
	$mail->Subject    = $subject;
	$mail->Body 	  = $message;
	$mail->AltBody    = $message;
		
	
	if($mail->Send())
	{
		
		echo json_encode(array("count"=>"true"));
		
	}
}
catch(phpmailerException $ex)
{

		echo json_encode(array("count"=>"true"));
}
?>