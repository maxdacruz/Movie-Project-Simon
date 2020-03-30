<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Page</title>

  <link rel="stylesheet" href="app/style/imports/main.css">
</head>

<body>
  <header>
    <?php require_once 'nav-bar.php'; ?>
  </header>
  <main>
    <form method="Post">
      <label for="fname">First name:</label><br>
      <input type="text" id="fname" name="fname"><br>
      <label for="lname">Last name:</label><br>
      <input type="text" id="lname" name="lname"><br>
      <label for="lname">Email:</label><br>
      <input type="email" id="email" name="email"><br>
      <label for="psw">Password:</label><br>
      <input type="password" id="psw" name="psw"><br>
      <label for="psw2">Repeat Password:</label><br>
      <input type="password" id="psw2" name="psw2">
      <input type="submit" value="Send">
    </form>
    <div id="result"></div>
  </main>
  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
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