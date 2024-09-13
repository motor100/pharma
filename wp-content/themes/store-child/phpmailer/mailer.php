<?php

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST["name"]) &&
   isset($_POST["surname"]) &&
   isset($_POST["phone"]) && 
   isset($_POST["email"]) && 
   isset($_POST["checkbox"])) {

    $name = htmlspecialchars($_POST["name"]);
    $surname = htmlspecialchars($_POST["surname"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $email = htmlspecialchars($_POST["email"]);
    $telegram = htmlspecialchars($_POST["telegram"]);
    $message = htmlspecialchars($_POST["message"]);
    $cc = htmlspecialchars($_POST["cc"]);
    $checkbox = $_POST["checkbox"];


    require 'PHPMailer.php';
    require 'SMTP.php';
    require 'config.php';

    $mail = new PHPMailer();
    $mail->CharSet = 'UTF-8';

    // Настройки SMTP
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPDebug = 0;

    $mail->Host = $Host ;
    $mail->Port = 465;
    $mail->Username = $Username;
    $mail->Password = $Password;

    // От кого
    $mail->From = $From;
    $mail->FromName = 'admin';

    // Кому
    $mail->addAddress($To, 'admin');

    if ($cc) {
      $mail->addCC($cc);
    }

    // Тема письма
    $mail->Subject = 'Сообщение с сайта natura-pharma.ru';

    $mail->isHTML(true);

    if (strlen($name) >= 3 &&
      strlen($name) <= 50 &&
      strlen($surname) >= 3 &&
      strlen($surname) <= 50 &&
      strlen($phone) == 18 && 
      strlen($email) >= 3 &&
      strlen($email) <= 50 &&
      $checkbox == "on") {

        // Тело письма
        $mail->Body = "Имя: $name<br> Фамилия: $name<br> Телефон: $phone<br> Email: $email<br> Телеграм: $telegram<br> Сообщение: $message<br>";
        $mail->AltBody = "Имя: $name\r\n Фамилия: $name\r\n Телефон: $phone\r\n Email: $email\r\n Телеграм: $telegram\r\n Сообщение: $message\r\n";

        $mail->send();
    }

    $mail->smtpClose();

} else {
    header("Location: /");
    exit;
}

?>