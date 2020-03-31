<?php
session_start();

require_once 'database.php';
$connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

if (!empty($_POST['name'])) {

  $date = date('Y/m/d ', time());
  $addplaylist = "INSERT INTO playlist(user_id, date, name) VALUES('" . $_SESSION['userid'] . "','" . $date . "', '" . $_POST['name'] . "')";
  var_dump($addplaylist);
  $result = mysqli_query($connect, $addplaylist);
} else {
  echo '<p>add a name</p>';
}
