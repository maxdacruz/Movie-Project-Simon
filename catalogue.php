<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="app/style/imports/main.css">
    <title>Catalogue</title>
</head>
<body>
<header>
<nav>
<?php
include_once("nav-bar.php");
?>
</nav>

</header>
    
<?php
    $result_query = array();
    require_once 'database.php';
    $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
    $MoviesQuery = "SELECT * FROM movie";
    $result = mysqli_query($connect, $MoviesQuery);
    $movies = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo '<div class="card" style="width: 18rem;">';
    foreach ($movies as $movie) {
        echo '<img src="' . $movie['poster'] . '" class="card-img-top" >';
        echo '<div class="card-body">';
        echo '<h2 class="card-title">' . $movie['title'] . "</h2>";
        echo '<p class="card-text">' . $movie['release_year'] . "</p>";
        $string =  $movie['Synopsis'];
        if (strlen($string) > 30) {
            $trimstring = substr($string, 0, 30). ' <a href="#">...</a>';
            } else {
            $trimstring = $string;
            }
            
        echo '<p class="card-text">' . $trimstring . ".</p>";
        echo '<p><strong>Details </strong>' .
				'<a href="details.php?id=' . $movie['id'] . '">' . $movie['title'] . '</a></p>'; 
        echo '<button class="addToPlaylist">Add to Playlist</button> <br></div>'; 
        
    }
    echo '</div>';
    
    ?>
</body>
</html>


    

    