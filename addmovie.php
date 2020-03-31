
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Movie</title>

  <link rel="stylesheet" href="app/style/imports/main.css">
</head>

<body>
  <header>
    <?php require_once 'nav-bar.php'; ?>
  </header>
  <main>
    <form method="Post">
      <label for="title">Title:</label><br>
      <input type="text" id="title" name="title"><br>
      <label for="poster">Poster:</label><br>
      <input type="text" id="poster" name="poster"><br>
      <label for="category">Category:</label><br>
      <input type="text" id="category" name="category"><br>
      <label for="actor">Actor:</label><br>
      <input type="text" id="actor" name="actor"><br>
      <label for="date">Release Year:</label><br>
      <input type="date" id="releaseyear" name="releaseyear"><br>
      <label for="synopsis">Synopsis:</label><br>
      <input type="text" id="synopsis" name="synopsis"><br>
       <input type="submit" value="Add">
    </form>
  <?php 
  include_once("database.php");
  
  $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
  $title = $_POST['title'];
  $poster =$_POST['poster'];
  $category =$_POST['category'];
  $actor =$_POST['actor'];
  $releaseyear =$_POST['releaseyear'];
  $synopsis = $_POST['synopsis'];
  $addmovie = "INSERT INTO movie(title,poster,category_id,actor_id,release_year,synopsis) VALUES('" . $title . "','" . $poster . "', '1','2','". $releaseyear."','".$synopsis."')";
  $result = mysqli_query($connect, $addmovie);
  var_dump($addmovie);

  ?>
    <div id="result"></div>
  </main>
  <!--   <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
  <script>
    $(function() {
      $('input[type="submit"]').click(function(e) {
        console.log('test');
        e.preventDefault();
        $.ajax({
          url: 'conect.php',
          type: 'post',
          data: $('form').serialize(),
          success: function(result) {
            console.log('ok');
            $('#result').html(result);
            if (result == 'nice') {
              window.location.href = "./homepage.php";
            }
          },
          error: function(err) {
            console.log('notok');
            $('#result').html(result);
          }
        });
      });
    });
  </script> -->
</body>

</html>