<?php
require_once 'database.php';
$errors = array();

if (!empty($_POST)) {


  if (empty($_POST['fname'])) {
    $errors[] = '<p style="color:red" > Need First Name </p>';
  }

  if (empty($_POST['lname'])) {
    $errors[] = '<p style="color:red" > Need Last Name </p>';
  }
  if (empty($_POST['email'])) {
    $errors[] = '<p style="color:red" >Need an email </p>';
  }
  if (empty($_POST['psw'])) {
    $errors[] = '<p style="color:red" >Need Password </p>';
  }
  if (($_POST['psw']) != ($_POST['psw2'])) {
    $errors[] = '<p style="color:red" >password don\'t match </p>';
  }

  if (count($errors) === 0) {
    $admin = false;
    $pass = password_hash($_POST['psw'], PASSWORD_DEFAULT);
    $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

    $query = "INSERT INTO users(name, first_name, email, hash, admin) 
    VALUES('" . $_POST['fname'] . "', '" . $_POST['lname'] . "'," . $_POST['email'] . ",'" . $pass . ",'" . $admin . ")";


    $result_query = mysqli_query($connect, $query);

    echo 'regidtered';
  } else {
    echo $errors;
  }
}
