<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

function sendMail($to, $subject, $contents) {

    try {
        $mail = new PHPMailer(true);
        $mail->IsSMTP();

        $mail->Host = 'smtp.gmail.com';// Set the SMTP server to send through
        $mail->SMTPAuth = true;// Enable SMTP authentication
        $mail->Username = 'nguyenmanha3k24@gmail.com';// SMTP username
        $mail->Password = 'dijxulolvtbggoam'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587; // TCP port to connect to

        $mail->setFrom('group6shop@gmail.com', "Group6");
        $mail->addAddress("$to");
        $mail->addReplyTo('not-reply@group6shop.com', 'Information');

        $mail->isHTML(true);
        $mail->Subject = mb_encode_mimeheader($subject, "UTF-8", "B");
        $mail->Body = "$contents";
        $mail->send();
        return true;
    }
    catch (Exception $e) {
        echo $e -> getMessage();
    }

}



?>