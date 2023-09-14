<?php

use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
// require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

$mail = new PHPMailer();

// Set mailer to use SMTP
$mail->isMail();

// Enable SMTP debugging (optional)
// $mail->SMTPDebug = SMTP::DEBUG_OFF;

// // Set Gmail SMTP server
// $mail->setFrom('boluwasodiq314@gmail.com', 'Omisanya Sodiq');

// Set SMTP port to 587 (TLS encryption)
// $mail->Port = 587;

// Enable TLS encryption
// $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

// SMTP authentication
// $mail->SMTPAuth = true;

// Your Gmail email address and application-specific password
// $mail->Username = 'boluwasodiq314@gmail.com';
// $mail->Password = '@Scoppatumana2531';

// Set the 'from' email address and name
$mail->setFrom('boluwasodiq314@gmail.com', 'Iscope');

// Add a recipient email address
$mail->addAddress($email, $user['username']);

// Email subject
$mail->Subject = 'Reset Password With OTP';

// Email body
$mail->Body = 'Kindly Reset Your Password With this OTP ' . $otp;

// Send the email
// if ($mail->send()) {
//     $message = 'Email sent successfully!';
// } else {
//     $message = 'Email could not be sent. Mailer Error: ' . $mail->ErrorInfo;
// }

if (function_exists('mail')) {
    $message = 'Enabled';
} else {
    $message = 'Not Enabled';
}


?>