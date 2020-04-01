<?php

// $_GET gets the variable inside the url link in this example it gets the id inside the url

$carid = $_GET['car'];
require_once 'database.php';

$connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

$query = 'SELECT * FROM cars WHERE cars.id =' . $carid;

$result = mysqli_query($connect, $query);


$carlist = mysqli_fetch_assoc($result);



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <form method="POST">
    <?php

    echo '<label for="fname">model:</label><br>';
    echo ' <input type="text" id="fname" name="model" value="' . $carlist['model'] . '"><br>';
    echo '<label for="lname">manufacturer:</label><br>';
    echo '<input type="text" id="fname" name="manufact" value="' . $carlist['manufactorer'] . '"><br>';
    echo '<input type="hidden" id="fname" name="id" value="' . $carlist['id'] . '"><br>';
    echo '<label for="lname">manufacturer:</label><br>';
    echo '<input  type="submit"  value="edit">';

    ?>

  </form>

  <div id="result"></div>

  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
  <script>
    $(function() {
      $('input[type = "submit"]').click(function(e) {
        console.log('test');
        e.preventDefault();
        $.ajax({
          url: 'changecar.php',
          type: 'post',
          data: $('form').serialize(),
          success: function(result) {
            console.log(result);
            $('#result').html(result);
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