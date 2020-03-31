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

    <div class="filter">
        <form method="get">
            <input type="button" value="DESC" name="test">
            <input type="button" value="ASC" name="test">

        </form>
    </div>

    <?php

    if (isset($GET)) {
        $order = $_GET['test'];
    } else {
        $order = 'ASC';
    }


    require_once 'database.php';
    $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);



    $limit = $_GET['limit'] ? $_GET['limit'] : 0;
    $prev = $limit - 5;
    $next = $limit + 5;
    $MoviesQuery = "SELECT * FROM movie ORDER BY release_year $order  LIMIT $limit,$next";
    $playlists = "SELECT * FROM playlist where user_id =" . $_SESSION['userid'];
    $result = mysqli_query($connect, $MoviesQuery);
    $result2 = mysqli_query($connect, $playlists);
    $movies = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $playlists = mysqli_fetch_all($result2, MYSQLI_ASSOC);

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
        echo '<p class="card-text"> <strong>Release Year </strong><br>' . $movie['release_year'] . "</p>";
        $string =  $movie['Synopsis'];
        if (strlen($string) > 30) {
            $trimstring = substr($string, 0, 30) . ' <span>...</span>';
        } else {
            $trimstring = $string;
        }

        echo '<p class="card-text">' . $trimstring . ".</p>";
        echo '<p><strong>Details </strong>' . '<br>' .
            '<a href="details.php?id=' . $movie['id'] . '">' . $movie['title'] . '</a></p>';

        echo '<label for="playlist">Choose a Playlist:</label>';
        echo '<select id="playlist">';

        foreach ($playlists as $playlist) {
            echo '<option value="' . $playlist['id'] . ',' . $movie['id'] . '">' . $playlist['name'] . ' </option>';
        };
        echo '</select>';
        echo '<input type="submit" value="Add to Playlist">';
        echo '</div>';
        echo '</div>';
    }

    echo '</div>';
    echo '</section>';

    ?>
    <div id="result"></div>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $('input[type="submit"]').click(function(e) {
                console.log('test');
                e.preventDefault();
                $.ajax({
                    url: 'addtoplaylist.php',
                    type: 'post',
                    dataType: "html",
                    data: {
                        selected: $('#playlist option:selected').val()
                    },
                    success: function(result) {
                        $('#result').html(result);
                        console.log(result);
                    },
                    error: function(err) {
                        console.log('notok');
                    }
                });
            });
        });
    </script>
</body>

</html>