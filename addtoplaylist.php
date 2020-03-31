<?php
session_start();

require_once 'database.php';
$connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

$result = explode(",", $_POST['selected']);


var_dump($result);




$query = "INSERT INTO movie_playlist(playlist_id, movie_id) 
    VALUES($result[0], $result[1])";

mysqli_query($connect, $query);
