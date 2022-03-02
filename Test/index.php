<?php
require("./PHPMailer-master/src/PHPMailer.php");
require("./PHPMailer-master/src/SMTP.php");
require("./PHPMailer-master/src/Exception.php");

$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.mailtrap.io';
$mail->SMTPAuth = true;
$mail->Port = 2525;
$mail->Username = '7f20b6e678d5dc';
$mail->Password = '157e19cd18ed6e';
$mail->IsHTML(true);

$mail->SetFrom("takacs.barby27@gmail.com", "Barbara", 0);
$mail->AddAddress("bar@gmail.com");

$mail->isHTML(true);                                  //Set email format to HTML
$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML phpmailer clients';

$mail->send();

// if (!$mail->Send()) {
//     echo "Mailer Error: " . $mail->ErrorInfo;
// } else {
//     echo "Message has been sent";
// }
