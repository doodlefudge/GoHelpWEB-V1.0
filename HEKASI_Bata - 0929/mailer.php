<?php

require  './lib/PHPMailer/PHPMailerAutoload.php';

function smtpmailer($to, $subject, $body) {
    global $error;
    $mail = new PHPMailer();  // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 1;  // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true;  // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;
    $mail->Username = 'hekasibata5@gmail.com';
    $mail->Password = 'testing5';
    $mail->SetFrom('hekasibata5@gmail.com', 'Hekasi Bata');
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AddAddress($to);
    if (!$mail->Send()) {
        return 'Mail error: ' . $mail->ErrorInfo;
    } else {
        return true;
    }
}
