<?php


require_once 'database.php';

$connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);



$term = $_POST['search'];

$requete = 'SELECT * FROM movie WHERE title LIKE"' . '%' . $term . '%' . '"';


$result = mysqli_query($connect, $requete);


$response = array(); // on créé le tableau

while ($row = mysqli_fetch_assoc($result)) // on effectue une boucle pour obtenir les données
{
  $response[] = array("value" => $row['id'], "label" => $row['title']); // et on ajoute celles-ci à notre tableau
}

echo json_encode($response); // il n'y a plus qu'à convertir en JSON
