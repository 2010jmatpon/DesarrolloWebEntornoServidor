<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';



try {
    $mail = new PHPMailer(true);

    $mail->CharSet = "UTF-8";
    $mail->Encoding = "quoted-printable";

    $mail->Username='jmatpon2010@g.educaand.es';
    $mail->Password='';
} catch (\Throwable $th) {
    //throw $th;
}