<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IDK Movies</title>

    <link rel="stylesheet" href="app/style/main.css">
</head>

<body>
    <header>
        <?php require_once 'nav-bar.php'; ?>
    </header>
    <section>
        <h1>Welcome to our scuffed site</h1>
        <label for="search">Search :</label> <br>
        <input type="text" name="search" id="search">
    </section>

    <section class="movies">

        <div class="grid">
            <div class="card">
                <img src="https://images-na.ssl-images-amazon.com/images/I/91NP3x-A2BL._SY445_.jpg" />
                <div>Mov Title</div>
            </div>
        </div>

    </section>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $('input[type="submit"]').click(function(e) {
                console.log('test');
                e.preventDefault();
                $.ajax({
                    url: 'search.php',
                    type: 'post',
                    data: {
                        mysearch: $(this).val()
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