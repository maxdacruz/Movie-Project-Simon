<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
</head>
<body>
<header>

</header>
<?php 
require_once("database.php");
$connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
$movid = $_GET["id"];
$query = "SELECT * 
FROM movie
INNER JOIN category ON movie.category_id = category.id 
INNER JOIN actor ON movie.actor_id = actor.id
WHERE movie.id =" . $movid;

//var_dump($query);
if (isset($_GET['id'])){
    $results = mysqli_query($connect, $query);
    $movies = mysqli_fetch_assoc($results);
    var_dump($movies);
    echo '<h1>'. $movies['title']. '</h1>';
    echo "<img width= 300 px src = " . $movies['poster'] . ">";
    echo "<p>".$movies['first_name']. $movies['last_name']. "</p>";
    echo "<p>".$movies['Synopsis']."</p>";
    echo "<p>".$movies['category']."</p>";

}

?>
    
</body>
</html>
