<link rel="stylesheet" href="app/style/imports/main.css">


<?php
include_once("nav-bar.php");
$result_query = array();
require_once 'database.php';
$connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
$MoviesQuery = "SELECT * FROM movie";
$result = mysqli_query($connect, $MoviesQuery);
$movies = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach ($movies as $movie) {
    echo '<img src="' . $movie['poster'] . '" class="card-img-top" >';
    echo '<div class="card-body">';
    echo '<h2 class="card-title">' . $movie['title'] . "</h2>";
    echo '<p class="card-text">' . $movie['release_year'] . ".</p>";
    $string =  $movie['Synopsis'];
    if (strlen($string) > 30) {
        $trimstring = substr($string, 0, 30) . ' <a href="#">...</a>';
    } else {
        $trimstring = $string;
    }

    echo '<p class="card-text">' . $trimstring . ".</p>";
    echo '<a href class="details">Details</a> <br>';
    echo '<button class="addToPlaylist">Add to Playlist</button> <br>';
}
    //Out
