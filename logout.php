<?php
session_start();
unset($_SESSION['logedin']);
unset($_SESSION['userid']);
?>

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

<script>
  window.location.href = "./login.php";
</script>