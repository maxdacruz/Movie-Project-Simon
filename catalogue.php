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
    <?php
    include_once("nav-bar.php");
    ?>
    </header>

    <div> <button id="test">Sort by Date</button></div>

    <?php

 


    require_once 'database.php';
    $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);



    $limit = $_GET['limit'] ? $_GET['limit'] : 0;
    $prev = $limit - 5;
    $next = $limit + 5;
    $MoviesQuery = "SELECT * FROM movie LIMIT $limit,$next";
    $result = mysqli_query($connect, $MoviesQuery);
    $movies = mysqli_fetch_all($result, MYSQLI_ASSOC);

    echo '<section class="movies">';
    //pagination

    echo '<div class="pagination">';

    if ($limit >= 5) echo '<a href="catalogue?limit=' . $prev . '">back</a> ';
    echo '<a href="catalogue?limit=' . $next . '">next</a>';
    echo '</div>';
    
    echo '<div class="grid">';
    
    foreach ($movies as $movie) {
        echo '<div>';
        echo '<img src="' . $movie['poster'] . '" class="img-details">';
        echo '<div class="card-details">';
        echo '<h2 class="card-title">' . $movie['title'] . "</h2>";
        echo '<p class="card-text">' . $movie['release_year'] . "</p>";
        $string =  $movie['Synopsis'];
        if (strlen($string) > 30) {
            $trimstring = substr($string, 0, 30) . ' <span>...</span>';
        } else {
            $trimstring = $string;
        }

        echo '<p class="card-text">' . $trimstring . ".</p>";
        echo '<p><strong>Details </strong>' . '<br>' .
            '<a href="details.php?id=' . $movie['id'] . '">' . $movie['title'] . '</a></p>';
        echo '<button class="addToPlaylist">Add to Playlist</button> <br> </div>';
        echo '</div>';
    }

    echo '</div>';
    echo '</section>';

    ?>

</body>

</html>