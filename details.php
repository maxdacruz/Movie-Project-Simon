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
$movie_id = $_GET["id"];
$query = "SELECT * FROM movies INNER JOIN category ON movies.director_id = directors.id  WHERE movies.id =" . $movid;
if (isset($_GET['id'])){

}

?>
    
</body>
</html>
