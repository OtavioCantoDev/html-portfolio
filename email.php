<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST["ENVIAR"])) {
    $mail = new PHPMailer(true);

    $mail->SMTPDebug = 2; // Enable debugging for troubleshooting (you can change this value as needed).

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'canto.otavio@gmail.com'; // Your Gmail
    $mail->Password = 'igjteabjkxruafze'; // Your Gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('canto.otavio@gmail.com'); // Your Gmail

    $mail->addAddress($_POST["email"]);

    $mail->isHTML(true);

    $mail->Subject = $_POST["nome"];
    $mail->Body = $_POST["mensagem"];

    try {
        $mail->send();
        echo 'Message has been sent.';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
    }
}
?>
