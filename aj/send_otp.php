<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$email = $_POST['email'];
$password = $_POST['password'];

$otp = rand(100000, 999999);
$_SESSION['otp'] = $otp;
$_SESSION['email'] = $email;

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'your_email@gmail.com'; // your Gmail
    $mail->Password = 'your_app_password';    // app password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('your_email@gmail.com', 'OTP System');
    $mail->addAddress($email);
    $mail->Subject = 'Your OTP Code';
    $mail->Body    = "Hi $email, your OTP code is: $otp";

    $mail->send();
    header("Location: verify_otp.html");
} catch (Exception $e) {
    echo "Message could not be sent. Error: {$mail->ErrorInfo}";
}
?>
