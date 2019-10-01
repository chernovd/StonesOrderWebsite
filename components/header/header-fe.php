<?php
include "../components/db/db_connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../external/pushy/css/pushy.css"> <!-- implements css for off canvas menu -->
    <script
            src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--icon link-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
          integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!--icon link end-->
    <!--Additional accordion link-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>


    <link rel="stylesheet" type="text/css" href="../css/main.css"/>
    <link rel="stylesheet" type="text/css" href="../css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="../css/frontend.css"/>
    <meta charset="UTF-8">
    <title>Index file</title>
</head>
<body>
<div class="header">
    <div class="header_inside">
        <div class="logo_wrapper">
            <img src="../img/Stones_restaurant_logo.png" alt="stones logo">
        </div>
        <div class="off-canves-menu">
            <?php
            if (isset($_GET["page"])) {
                if ($_GET["page"] == "order") {
                    echo "<a href='../fe/index.php?page=basket'><i id='cart' class='fas fa-shopping-cart' style='font-size:40px; '></i></a>";
                } else {
                    echo "<button class='menu-btn' >&#9776; Menu</button>";
                }
            } else {
                echo "<button class='menu-btn' >&#9776; Menu</button>";
            }
            ?>
        </div>
    </div>
</div>