<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// 아래 코드는 상대 경로를 넣을 시 오류 남. 이유는 잘 모르겠음 변수를 이용해서 넣었으니 건들지 않아도 됨
require $_SERVER['DOCUMENT_ROOT'].'/KKU-GIT/config/PHPMailer/src/Exception.php';  // PHPMailer/src/Exception.php 절대 경로 넣기
require $_SERVER['DOCUMENT_ROOT'].'/KKU-GIT/config/PHPMailer/src/PHPMailer.php';  // PHPMailer/src/PHPMailer.php 절대 경로 넣기
require $_SERVER['DOCUMENT_ROOT'].'/KKU-GIT/config/PHPMailer/src/SMTP.php';       // PHPMailer/src/SMTP.php 절대 경로 넣기

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.naver.com';                     //SMTP 서버 (ex> smtp.naver.com)
    $mail->SMTPAuth   = true;                                  
    $mail->Username   = 'db12fla@naver.com';                     //SMTP 아이디(example@example.com)
    $mail->Password   = '3JUDB7RZBU1L';                               //SMTP 비밀번호
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
    $mail->Port       = 465;                                   

    //Recipients
    $mail->setFrom('db12fla@naver.com', 'KKU-GIT');         // Username과 동일하게
    $mail->addAddress($receiver_email);

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'KKU-GIT 이메일 인증 코드입니다.';
    $mail->Body = 'KKU-GIT 이메일 인증 코드: '.$code;

    $mail->CharSet = 'UTF-8'; // 인코딩 UTF-8로 설정

    $mail->send();
    $isSend = 1;
} catch (Exception $e) {
    echo '<script>alert("메일 전송에 실패했습니다. Mailer Error: ' . $mail->ErrorInfo . '");</script>';
}
