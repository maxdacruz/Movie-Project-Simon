<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  require_once 'database.php';

  $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

  $query = 'SELECT * FROM cars';

  $result = mysqli_query($connect, $query);

  $carlist = mysqli_fetch_all($result, MYSQLI_ASSOC);

  var_dump($carlist);

  foreach ($carlist as $car) {

    echo '<p>' . $car['model'] . '</p>';
    echo '<p>' . $car['manufactorer'] . '</p>';
    echo '<img src="' . $car['photo'] . '">';
    echo '<p>' . $car['price'] . '</p>';
    echo '<p>' . $car['type'] . '</p>';
    echo '<a href="editcar.php?id=' . $car['id'] . '">EDIT</a>';
    echo '<form method="post">';
    echo '<input type="hidden" name="lol" value="' . $car['id'] . '">';
    echo '<input name="delete" type="submit" value="delete">';
    echo '</form>';
  }


  if (isset($_POST['delete'])) {

    $querydelete = 'DELETE FROM cars WHERE id =' . $_POST['lol'];

    mysqli_query($connect, $querydelete);
    var_dump(mysqli_query($connect, $querydelete));
  }

  ?>

</body>

</html>