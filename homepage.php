<?php
require_once 'database.php';
$connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
$query_categ = 'SELECT c.category, count(f.category_id) counter
FROM category c left join movie f
ON f.category_id = c.id
GROUP BY c.id, c.category ORDER BY counter DESC LIMIT 5';
$query_movie =  'SELECT * FROM movie ORDER BY id DESC LIMIT 3';

$result = mysqli_query($connect, $query_categ);
$result2 = mysqli_query($connect, $query_movie);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IDK Movies</title>

    <link rel="stylesheet" href="app/style/imports/main.css">
</head>

<body>
    <header>
        <?php require_once 'nav-bar.php'; ?>
    </header>
    <section>
        <h1>Welcome to our scuffed site</h1>
        <label for="search">Search :</label> <br>
        <input type="text" name="search" id="search">
        <h2>Results</h2>
        <div id="result"></div>
    </section>
    <section>
        <h2>categorys</h2>
        <?php while ($category = mysqli_fetch_assoc($result)) {
            echo "<p>" . $category['category'] . $category['counter'] . "</p> ";
        }
        ?>
    </section>

    <section class="movies">

        <div class="card">
            <?php
            while ($movie = mysqli_fetch_assoc($result2)) {

                echo '<div class="card-body">';
                
                echo ' <img src="' . $movie['poster'] . '" />';

                echo ' <div>' . $movie['title'] .  '</div>';

                echo '</div>';
            }

            ?>

        </div>

    </section>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $('#search').keyup(function(e) {
                console.log('test');
                e.preventDefault();
                $.ajax({
                    url: 'search.php',
                    type: 'post',
                    data: {
                        search: $('#search').val()
                    },
                    success: function(result) {
                        console.log('ok');
                        $('#result').html(result);
                    },
                    error: function(err) {
                        console.log('notok');
                        $('#result').html(result);
                    }
                });
            });
        });
    </script>
</body>

</html>