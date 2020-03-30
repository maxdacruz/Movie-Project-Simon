<?php
require_once 'database.php';
$errors = array();

if (!empty($_POST)) {
  $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);


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
  $query_user = "SELECT * FROM users WHERE email='" . $_POST['email'] . "' LIMIT 1";
  $result = mysqli_query($connect, $query_user);
  $user = mysqli_fetch_assoc($result);

  if ($user['email'] == $_POST['email']) {
    $errors[] = '<p style="color:red" >email already used </p>';
  }

  if (count($errors) === 0) {
    $admin = 0;
    $pass = password_hash($_POST['psw'], PASSWORD_DEFAULT);
    $query = "INSERT INTO users(last_name, first_name, email, hash, admin) 
    VALUES('" . $_POST['fname'] . "', '" . $_POST['lname'] . "','" . $_POST['email'] . "','" . $pass . "'," . $admin . ")";

    mysqli_query($connect, $query);

    echo 'registered';
  } else {
    echo implode('', $errors);
  }
}
