<?php
session_start();

// Destroy the session.
// remove all session variables
session_unset();

// destroy the session
session_destroy();

// Redirect to login page
echo "<script>window.location.replace('index.php');</script>";
?>