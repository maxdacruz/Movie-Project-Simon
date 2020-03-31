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
    <label for="name">Playlist Name</label>
    <input type="text" name="name" id="name">
    <input type="submit" value="Add">
  </form>
  <?php



  $result_query = array();
  require_once 'database.php';
  $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
  //$MoviesQuery = "SELECT * FROM movie";

  $playlistquery = "SELECT * FROM movie_playlist, movie, playlist where movie_id = movie.id and user_id =" . $_SESSION['userid'] . " GROUP BY playlist.id";
  $result = mysqli_query($connect, $playlistquery);
  $playlists = mysqli_fetch_all($result, MYSQLI_ASSOC);

  foreach ($playlists as $playlist) {
    echo "<div id='result'>";
    echo '<h2>' . $playlist['name'] . "</h2>";
    echo '<h3>' . $playlist['release_year'] . "</h3>";
    echo "</div>";
  }

  ?>
  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
  <script>
    $(function() {
      $('input[type="submit"]').click(function(e) {
        console.log('test');
        e.preventDefault();
        $.ajax({
          url: 'addplaylist.php',
          type: 'post',
          data: $('form').serialize(),
          success: function(result) {
            console.log('ok');
            window.location.href = "./playlist.php"
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