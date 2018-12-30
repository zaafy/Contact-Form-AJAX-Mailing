<?php
$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data

if (empty($_POST['name']))
  $errors['name'] = 'Name is required.';

if (empty($_POST['email']))
  $errors['email'] = 'Email is required.';

if (empty($_POST['message']))
  $errors['message'] = 'Message is required.';

// if errors contain some error - mark failure and return errors
if ( ! empty($errors)) {
  $data['success'] = false;
  $data['errors']  = $errors;
} else {

  require 'PHPMailer/PHPMailerAutoload.php';
  include 'insert-to-db.php';
  include 'confirmation.php';
  include 'notification.php';

  // if everything goes smooth - mark success and return data
  $data['success'] = true;
  $data['message'] = 'Success!';
  $data['errors'] = false;
  $data['confirmation'] = $dataConf;
  $data['notification'] = $dataNotif;
  $data['query'] = $dataSQL;
}

echo json_encode($data);
