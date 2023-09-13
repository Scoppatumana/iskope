
<?php 
$smtp_host='mail.afootechglobal.com';
$smtp_username='emma@afootechglobal.com';
$smtp_password='$EMMAafoo@2022';
$smtp_port=465;
$sender_name='Iscope inc.';

require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->SMTPDebug = 0;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = $smtp_host;  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = $smtp_username;                 // SMTP username
$mail->Password = $smtp_password;                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = $smtp_port;                                    // TCP port to connect to

$mail->SMTPOptions = array(
'ssl' => array(
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed' => true
)
);
$mail->WordWrap = 50;   
$mail->isHTML(true);                                  // Set email format to HTML

?>




















<?php 

$reciever_name=$user['username'];	
$textarea="Reset your password using this OTP: $otp.";		  
$message='
<div style="width:70%; margin:auto; height:auto; min-width:300px;">
<img src="cid:mem_password" width="100%">
<div style="padding:15px; font-family:16px;">
<p>
Dear <strong >'.$reciever_name.'</strong>,<br>
'.$textarea.'
</p>
</div>
<div  style="min-height:30px;background:#333;text-align:left;color:#FFF;line-height:20px; padding:20px 10px 20px 50px;">
&copy; All Right Reserved.</div>
</div>
';

$send_to=$email;
$subject="Reset Password - OTP";

$mail->setFrom($smtp_username, $sender_name);
$mail->AddAddress($send_to, $reciever_name);

$mail->addReplyTo($smtp_username, $sender_name); // reply to the sender email

$mail->Subject = $subject;
$mail->addEmbeddedImage('reset_password_mail/img/mem_password.jpg', 'mem_password');
$mail->Body = $message;
$mail->AltBody = strip_tags($message);

if(!$mail->send()){
	echo 'this email not sent';
}

?>