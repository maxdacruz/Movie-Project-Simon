
<nav class="nav">

    <ul>
        <li><a href="./homepage.php">Home</a></li>
        <li><a href="./catalogue.php">Movies</a></li>
        <li><a href="./login.php">Login</a></li>
        <li><a href="./register.php">Register</a></li>
        <?php if ($_SESSION['logedin']) {
            echo '<li><a href="./login.php">Log Out</a></li>';
        } ?>

    </ul>
