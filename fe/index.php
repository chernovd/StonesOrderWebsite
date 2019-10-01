<?php
session_start(); // start the session;
include "../components/header/header-fe.php"; // includes the header
include "../components/navigation/navigation.php"; // gets the navigation depending on the user type
getExactMenu(); // inserts the userType to know which menu to show;
?>
    <div class="site-overlay"></div>
    <div class="main_wrapper">
        <?php
        ?>

        <?php
        if (isset($_GET['page'])) {
            $filename = $_GET['page'] . ".php";

            if (file_exists($filename)) {
                include_once $_GET['page'] . ".php";
            } else {
                echo "<h1 class='main-headline'>Stones Order App</h1>";
                include_once "mainpage.php";
            }
        } else {
            echo "<h1 class='main-headline'>Stones Order App</h1>";
            include_once "mainpage.php";
        }

        ?>

    </div>
<?php
include "../components/footer/footer.php"; // includes the footer
error_reporting(0);

?>