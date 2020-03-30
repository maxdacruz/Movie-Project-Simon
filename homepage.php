<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IDK Movies</title>
</head>
<body>
    
    <section class="movies">

        <div class="grid">
            <div class="card">
                <img src="https://images-na.ssl-images-amazon.com/images/I/91NP3x-A2BL._SY445_.jpg" />
                <div>Mov Title</div>
            </div>
        </div>
        
    </section>

</body>
</html>

<?php 

include_once 'database.php';
$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, 'idk_movies');

?>