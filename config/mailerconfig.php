<?php
require_once './PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer(true);
$mail->IsSMTP();
$mail->CharSet = 'UTF-8';
$mail->Encoding = 'base64';
$mail->IsHTML(true);
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
/*
$this->SMTPAutoTLS = false;
$this->SMTPOptions = [
  'ssl' => [
    'verify_peer' => false,
    'verify_peer_name' => false,
	  'allow_self_signed' => true
  ]
];
*/
$mail->SMTPDebug = 3;
$mail->Host = 'SMTP 서버 주소';
$mail->Port = 465;
$mail->Username = 'SMTP ID';
$mail->Password = 'SMTP Password';
$mail->setFrom('SMTP ID');
$mail->Subject = 'KKU-GIT 이메일 인증 코드: '.$code;
$mail->addAddress($receiver_email);
$mail->msgHTML('내용');
$mail->send();