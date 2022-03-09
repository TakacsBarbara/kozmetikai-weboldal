<?php

require("PHPMailer-master/src/PHPMailer.php");
require("PHPMailer-master/src/SMTP.php");
require("PHPMailer-master/src/Exception.php");

$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.mailtrap.io';
$mail->SMTPAuth = true;
$mail->Port = 2525;
$mail->Username = '7f20b6e678d5dc';
$mail->Password = '157e19cd18ed6e';
$mail->IsHTML(true);
$mail->CharSet  = 'UTF-8';
$mail->SetFrom("takacs.barby27@gmail.com", "Takács Barbara", 0);
