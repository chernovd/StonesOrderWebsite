<?php include "../components/header/header-be.php"; // gets the header part of the page
include "../components/navigation/navigation.php"; // gets the navigation depending on the user type
include "../components/login/login.php"; // include the script for the login menu
getExactMenu(); // get the right menu for every user, depending on the user typ
?>
<div class="site-overlay"></div>
<div class="main_wrapper">

    <?php
    if (isset($_SESSION['loggedIn']) &&$_SESSION['loggedIn'] == true) {
        if (isset($_GET['page'])) {
            $filename = $_GET['page'] . ".php";
            if (file_exists($filename)) {
                include_once $_GET['page'] . ".php";
            } else {
                echo "<h1>Stones k App</h1>";
            }
        } else {
            echo "<h1>Stones P App</h1>";
        }
    } else {
        loginForm($DBConnect);
    }
    ?>
</div>
<?php include "../components/footer/footer.php" ?>
