<?php

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

    <section class="movies">

        <div class="grid">
            <div class="card">
                <img src="" />
                <div>test title</div>
            </div>
        </div>

    </section>

</body>

</html>

<?php

include_once 'database.php';
$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, 'idk_movies');

?>
