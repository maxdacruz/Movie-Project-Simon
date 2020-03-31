<?php


require_once 'database.php';

$connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

$query = 'UPDATE cars SET model =' . $_POST['model'] . ',manufactorer = ' . $_POST['manufact'] . ' WHERE id =' . $_POST['id'];
var_dump($query);

mysqli_query($connect, $query);
