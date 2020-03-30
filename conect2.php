<?php
session_start();
$_SESSION['logedin'] = false;

require_once 'database.php';
$errors = array();

if (!empty($_POST)) {
  $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);


  if (empty($_POST['email'])) {
    $errors[] = '<p style="color:red" >Need an email </p>';
  }
  if (empty($_POST['psw'])) {
    $errors[] = '<p style="color:red" >Need Password </p>';
  }

  $query_user = "SELECT * FROM users WHERE email='" . $_POST['email'] . "' LIMIT 1";
  $result = mysqli_query($connect, $query_user);
  $user = mysqli_fetch_assoc($result);



  if (!(password_verify($_POST['psw'], $user['hash']))) {
    $errors[] = '<p style="color:red" >email and password don\'t match</p>';
  }

  if (count($errors) === 0) {
    $_SESSION['logedin'] = true;
    echo 'loged in';
  } else {
    echo implode('', $errors);
  }
}
