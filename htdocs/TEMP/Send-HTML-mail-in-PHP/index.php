<?php
		
		// include phpmailer class
		require_once 'mailer/class.phpmailer.php';
		// creates object
		$mail = new PHPMailer(true);	
		
		if(isset($_POST['btn_send']))
		{
			$full_name  = strip_tags($_POST['full_name']);
			$email      = strip_tags($_POST['email']);
			$subject    = "GoHelp E-Reciept";
			$text_message    = "Hello $full_name, <br /><br /> This is email is sent by a daemon. DO NOT REPLY";			   
			
			
			// HTML email starts here
			
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
						<span style='font-size:12px;line-height:16px;font-weight:bold'>GrabCar (Sedan)</span>
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
						<span style='font-size:12px;line-height:16px;font-weight:bold'>Jesus Belaras Miranda Jr</span>
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
						<span style='font-size:12px;line-height:16px;font-weight:bold'>Marc Martin</span>
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
																						<span style='font-size:10px;color:#9e9e9e;line-height:16px'>Booking code</span><br>
																						<span style='font-size:12px;line-height:16px;font-weight:bold'>ADR-14970694-2-001</span>
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
																									<span style='font-size:12px;line-height:16px;font-weight:bold'>250, Makati City, Makati City</span>
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
																										<span style='font-size:12px;line-height:16px;font-weight:bold'>Dr. Arcadio Santos Avenue</span>
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
				<span style='font-size:11px;color:#000000;line-height:18px'>Ride Fare</span>
				</td>
				<td align='left'>
				<span style='font-size:11px;color:#000000;line-height:18px'>&nbsp;&nbsp;P 271.00  </span>
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
				<span style='font-size:12px;font-weight:bolder;color:#000000;line-height:28px'>&nbsp;&nbsp;P 271.00 </span>
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
				$mail->IsSMTP(); 
				$mail->isHTML(true);
				$mail->SMTPDebug  = 1;                     
				$mail->SMTPAuth   = true;                  
				$mail->SMTPSecure = "ssl";                 
				$mail->Host       = "smtp.gmail.com";      
				$mail->Port       = 465;             
				$mail->AddAddress($email);
				$mail->Username   ="marc.martin02271994@gmail.com";  
				$mail->Password   ="Thesisgroup";            
				$mail->SetFrom('martin.marc02271994@gmail.com','Coding Cage');
				$mail->AddReplyTo("martin.marc02271994@gmail.com","Coding Cage");
				$mail->Subject    = $subject;
				$mail->Body 	  = $message;
				$mail->AltBody    = $message;
					
				if($mail->Send())
				{
					
					$msg = "<div class='alert alert-success'>
							Hi,<br /> ".$full_name." mail was successfully sent to ".$email." go and check, cheers :)
							</div>";
					
				}
			}
			catch(phpmailerException $ex)
			{
				$msg = "<div class='alert alert-warning'>".$ex->errorMessage()."</div>";
			}
		}	
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sending HTML eMail using PHPMailer in PHP</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="http://www.codingcage.com" title='Programming Blog'>Coding Cage</a>
            <a class="navbar-brand" href="http://www.codingcage.com/search/label/CRUD">CRUD</a>
            <a class="navbar-brand" href="http://www.codingcage.com/search/label/PDO">PDO</a>
            <a class="navbar-brand" href="http://www.codingcage.com/search/label/jQuery">jQuery</a>
        </div>
    </div>
</div>


<div class="container">

	<div class="page-header">
    	<h1>Send HTML eMails using PHPMailer in PHP</h1>
    </div>
	    
    <div class="email-form">
    
    	<?php
		if(isset($msg))
		{
			echo $msg;
		}
		?>
        
    	<form method="post" class="form-control-static">
        
            <div class="form-group">
                <input class="form-control" type="text" name="full_name" placeholder="Full Name" />
            </div>
            
            <div class="form-group">
                <input class="form-control" type="text" name="email" placeholder="Your Mail" />
            </div>
            
            <div class="form-group">
                <button class="btn btn-success" type="submit" name="btn_send">
                <span class="glyphicon glyphicon-envelope"></span> Send Mail
                </button>
            </div>
        
    	</form>
    </div>    
</div>


<footer class="footer">
      <div class="container">
        <p class="text-muted">&copy; copyright, <a href="http://www.codingcage.com" target="_blank">www.codingcage.com</a> | <a href="http://www.codingcage.com/2016/03/how-to-send-html-emails-in-php-with.html">Tutorial Link</a></p>
      </div>
</footer>

</body>

</html>
		