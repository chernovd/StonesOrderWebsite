<?php
include_once "../components/db/db_connect.php";
$now = time();
if (isset($_SESSION["discard_after"]) && $now > $_SESSION["discard_after"]) {
    session_destroy();
}
$_SESSION["discard_after"] = $now + 900;
if (isset($_POST["save"])) {
    $rnd = rand(0, 9999);
    $proccess = "pending";
    $paid = 1;
    $TableName3 = "purchase";
    //save into purchase
    $SQLstring3 = "INSERT INTO " . $TableName3 . " (`purchase_id`, `purchase_verificationNumber`, `purchase_status`, `purchase_isPaid` ) VALUES (NULL, ? , ? , ?);";
    if ($stmt = mysqli_prepare($DBConnect, $SQLstring3)) {
        mysqli_stmt_bind_param($stmt, 'sss', $rnd, $proccess, $paid);
        $QueryResult = mysqli_stmt_execute($stmt);
    }
    //get the purchase id
    $SQLstring4 = "SELECT purchase_id FROM " . $TableName3 . " WHERE purchase_verificationNumber = ?";
    if ($stmt = mysqli_prepare($DBConnect, $SQLstring4)) {
        mysqli_stmt_bind_param($stmt, 'i', $rnd);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $countID);
        mysqli_stmt_store_result($stmt);
        while (mysqli_stmt_fetch($stmt)) {
            $countID;
        }
    }
    $TableName4 = "productspurchased";
    //insert the order to  productspurchased
    $index = "";
    foreach ($_SESSION["order"] as $index) {
        $SQLstring3 = "INSERT INTO " . $TableName4 . " (`pp_id`, `product_id`, `purchase_id` ) VALUES (NULL, ? , ? );";
        if ($stmt = mysqli_prepare($DBConnect, $SQLstring3)) {
            mysqli_stmt_bind_param($stmt, 'ss', $index, $countID);
            $QueryResult = mysqli_stmt_execute($stmt);
        }
    }
    echo "<h1 >Your order was succes, your pick up code is " . $rnd . "</h1>";
}
?>