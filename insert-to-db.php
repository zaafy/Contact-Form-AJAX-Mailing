<?php

$link = mysqli_connect('localhost', 'root', '', 'contact_form');

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$sql = "INSERT INTO contact_form.messages (name, email, message) VALUES ('$name', '$email', '$message')";

$wynik_wyslij = mysqli_query($link, $sql);

if($wynik_wyslij){
  $dataSQL = (object) [
    'success' => true,
    'message' => 'Succesfully saved Your request!'
  ];
} else {
  $dataSQL = (object) [
    'success' => false,
    'message' => 'Something went wrong! '.mysqli_error($link)
  ];
}
mysqli_close($link);
