<?php


require_once 'database.php';
$mysearch = trim($_POST['search']);

echo $mysearch;
if (!empty($_POST)) {
  $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);


  $query_movie = 'SELECT * FROM movie, category WHERE movie.category_id = category.id AND title LIKE"' . '%' . $mysearch . '%' . '"';
  $result = mysqli_query($connect, $query_movie);

  'SELECT movies.id, title, poster, date_of_release, director_id ,name, nationality, image, date_of_birth FROM movies, directors where movies.director_id = directors.id AND  title LIKE "' . '%' . $_POST['search'] . '%' . '"';;

  while ($movie = mysqli_fetch_assoc($result)) {
    echo "<p> " . $movie['title'] . "  " . $movie['release_year'] . "   " . $movie['category'] . "<p>";
  }
}
