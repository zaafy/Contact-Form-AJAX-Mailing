<?php

$email = $_POST['email'];
$name = $_POST['name'];
$message = $_POST['message'];

$login = 'contact.form.exam@gmail.com';
$password = 'Pa$$w0rd!!';

global $errorNotif;
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->Username = $login;
$mail->Password = $password;
$mail->SetFrom($login, 'XYZ (website)');
$mail->AddAddress('enquiries@example.com');
$mail->AddAddress('dan.okon77@gmail.com');
$mail->Subject = 'New Enquiry from Client!';
$mail->Body = "There is a new enquiry from Client: \nFrom: $name \nE-mail: $email \nMessage: $message";

if(!$mail->Send()) {
  $errorNotif = 'There was a trouble sending the notification! Mail error: '.$mail->ErrorInfo;
  $dataNotif = (object) [
    'success' => false,
    'message' => $errorNotif
  ];
} else {
  $errorNotif = 'Notification sent to our mail! We will contact You soon!';
  $dataNotif = (object) [
    'success' => true,
    'message' => $errorNotif
  ];
}
