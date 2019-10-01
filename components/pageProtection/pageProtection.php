<?php
// this function must be implemented in every page
// $user is the type of user that is allowed to see the page ("admin", "staff", "");
// "" means everyone
// if the user is not allowed to see the page there will be a redirect to the index.php page;
function redirectUser($user)
{
    if (!isset($_SESSION['type'])) {
        $user_type = "";
    }

    $user_type = $_SESSION['type']; // get user type from session
    if ($user != "admin-staff") { // check if the page is visible for admin and staff
        if ($user_type != $user) {
            // Show only admin pages
            echo "<script>window.location.replace('index.php');</script>";
        }
    }
}

?>