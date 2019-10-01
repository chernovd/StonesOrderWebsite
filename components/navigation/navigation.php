<?php
/**
 * User: Lukas Kirchhoff
 * Date: 17.06.19
 */

// This function prints out the navigation for the admin fadein from the right side
function getAdminMenu()
{
    ?>
    <nav class="pushy pushy-right">
        <div class="pushy-content">
            <h1 class="main-headline">Menu</h1>
            <ul>
                <!-- Menu Structure -->
                <li class="pushy-link"><a href="../../../Stones-Order-App/be/index.php?page=order-overview">Order
                        Overview</a></li>
                <li class="pushy-link"><a href="../../../Stones-Order-App/be/index.php?page=order-history">Order
                        History</a></li>
                <li class="pushy-link"><a href="../../../Stones-Order-App/be/index.php?page=menu-overview">Menu
                        Overview</a></li>
                <li class="pushy-link"><a href="../../../Stones-Order-App/be/index.php?page=settings">Settings</a></li>
                <li class="pushy-link"><a href="../../../Stones-Order-App/be/index.php?page=statistics">Statistics</a>
                <li class="pushy-link"><a href="../../../Stones-Order-App/be/log_out.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <?php
}

// This function prints out the navigation for the User fadein from the right side
function getUserMenu()
{
    ?>
    <nav class="pushy pushy-right">
        <div class="pushy-content">
            <h1>Menu</h1>
            <ul>
                <!-- Menu Structure -->
                <li class="pushy-link"><a href="../../../Stones-Order-App/fe/index.php?page=order">Menu</a></li>
                <li class="pushy-link"><a href="../../../Stones-Order-App/fe/index.php?page=basket">Basket</a></li>
            </ul>
        </div>
    </nav>
    <?php
}

// This function prints out the navigation for the staff fadein from the right side
function getStaffMenu()
{
    ?>
    <nav class="pushy pushy-right">
        <div class="pushy-content">
            <h1>Menu</h1>
            <ul>
                <!-- Menu Structure -->
                <li class="pushy-link"><a href="../../../Stones-Order-App/be/index.php?page=order-overview">Order
                        Overview</a></li>
                <li class="pushy-link"><a href="../../../Stones-Order-App/be/index.php?page=order-history">Order
                        History</a></li>
            </ul>
        </div>
    </nav>
    <?php
}

// this function will show you the correct menu depending on the user type which is saved in the session
function getExactMenu()
{
    if (!isset($_SESSION['type'])) {
        $userType = "";
    } else {
        $userType = $_SESSION['type'];
    }

    if ($userType == "admin") {
        getAdminMenu();
    } else if ($userType == "staff") {
        getStaffMenu();
    } else {
        getUserMenu();
    }
}