<?php

$email = $_POST['email'];
$name = $_POST['name'];
$message = $_POST['message'];

$login = 'contact.form.exam@gmail.com';
$password = 'Pa$$w0rd!!';

global $errorConf;
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->Username = $login;
$mail->Password = $password;
$mail->SetFrom($login, 'XYZ (noreply)');
$mail->AddAddress($email);
$mail->Subject = 'Thank You!';
$mail->Body = 'Thank You for contacting us! We received Your receipt and we will contact You soon!';

if(!$mail->Send()) {
  $errorConf = 'There was a trouble sending You the confirmation! Mail error: '.$mail->ErrorInfo;
  $dataConf = (object) [
    'success' => false,
    'message' => $errorConf
  ];
} else {
  $errorConf = 'Confirmation sent to Your email!';
  $dataConf = (object) [
    'success' => true,
    'message' => $errorConf
  ];
}
