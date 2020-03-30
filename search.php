<?php


require_once 'database.php';

$connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);



$term = $_GET['term'];

$requete = 'SELECT * FROM movie WHERE title LIKE"' . '%' . $term . '%' . '"';


$result = mysqli_query($connect, $requete);


$array = array(); // on créé le tableau

while ($movie = mysqli_fetch_assoc($result)) // on effectue une boucle pour obtenir les données
{
  array_push($array, $movie['title']); // et on ajoute celles-ci à notre tableau
}

echo json_encode($array); // il n'y a plus qu'à convertir en JSON
