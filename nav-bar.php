<?php session_start();
var_dump($_SESSION);
?>
<nav class="nav">

    <ul>
        <li><a href="./homepage.php">Home</a></li>
        <li><a href="./catalogue.php?limit=0">Movies</a></li>
        <?php if (!isset($_SESSION['logedin'])) {
            echo '<li><a href="./login.php">Login</a></li>';
            echo '<li><a href="./register.php">Register</a></li>';
        } ?>
        <?php if (isset($_SESSION['logedin'])) {
            echo '<li><a  href="./logout.php">Log Out</a></li>';
            echo '<li><a href="./playlist.php">Playlist</a></li>';
        } ?>


    </ul>
</nav>