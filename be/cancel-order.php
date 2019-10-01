<?php
/**
 * Created by PhpStorm.
 * User: lukir
 * Date: 21.06.2019
 * Time: 08:24
 */
include "../components/db/db_connect.php";
$status = "picked_up";
$id = $_POST['id'];

$updateQuery = "UPDATE purchase SET purchase_status = ? WHERE purchase_id = ?";
if ($insertStatement = mysqli_prepare($DBConnect, $updateQuery)) {
    mysqli_stmt_bind_param($insertStatement, "si", $status, $id);
    mysqli_stmt_execute($insertStatement);
}
mysqli_stmt_close($insertStatement);
?>

