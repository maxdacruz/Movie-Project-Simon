<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app/style/imports/main.css">
    <title>PLaylist</title>

</head>
<body>
<header>
    <?php require_once 'nav-bar.php'; ?>
  </header>
<form method="Post">
      <label for="addplay">ADD New playlist</label><br>
      <input type="submit" value="Add">
    </form>
    <?php



$result_query = array();
require_once 'database.php';
$connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
//$MoviesQuery = "SELECT * FROM movie";




$playlistquery = "SELECT * FROM movie_playlist, movie, playlist where movie_id = movie.id and user_id = 2";
$result = mysqli_query($connect, $playlistquery);
$playlists = mysqli_fetch_all($result, MYSQLI_ASSOC);

var_dump($playlists);  
foreach ($playlists as $playlist) {
  
   
    echo '<h2>' . $playlist['title'] . "</h2>";
    echo '<h3>' . $playlist['release_year'] . "</h3>";

   
}



?>

</body>
</html>