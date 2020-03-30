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
    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/themes/smoothness/jquery-ui.css" />
    <link rel="stylesheet" href="app/style/imports/main.css">
</head>

<body>
    <header>
        <?php require_once 'nav-bar.php'; ?>
    </header>
    <section>
        <h1>Welcome to our scuffed site</h1>
        <form>
            <label for="autocomplete">Search :</label>
            <input type="text" id="autocomplete" name="autocomplete">
            <input type="button" value="" id="lol">
        </form>
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
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js"></script>
    <script>
        /*$(function() {
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
        });*/
        $(function() {

            // Single Select
            $("#autocomplete").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "search.php",
                        type: 'post',
                        dataType: "json",
                        data: {
                            search: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    // Set selection
                    $('#autocomplete').val(ui.item.label);
                    $('#lol').val(ui.item.value);

                    return false;
                }
            });

        })
        $('#lol').click(function() {
            console.log($(this).val());
            window.location.href = './details.php?id=' + $(this).val()
        })
    </script>
</body>

</html>