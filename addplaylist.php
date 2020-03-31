<?php
session_start();
$result_query = array();
require_once 'database.php';
$connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
//$MoviesQuery = "SELECT * FROM movie";
$date = date('Y/m/d ', time());
$addplaylist = "INSERT INTO playlist(user_id, date, name) VALUES('" . $_SESSION['userid'] . "','" . $date . "', '" . $_POST['name'] . "')";
var_dump($addplaylist);
$result = mysqli_query($connect, $addplaylist);
