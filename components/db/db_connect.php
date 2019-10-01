<?php
/**
 * Created by PhpStorm.
 * User: lukaskirchhoff
 * Date: 21.05.19
 * Time: 19:39
 */

$servername = "127.0.0.1";
$username = "root";
$password = "";
$tablename = "stones";

// Create connection
$DBConnect = mysqli_connect($servername, $username, $password);
mysqli_select_db($DBConnect, $tablename);
?>
