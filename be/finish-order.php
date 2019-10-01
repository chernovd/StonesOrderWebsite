<?php
/**
 * Created by PhpStorm.
 * User: lukir
 * Date: 21.06.2019
 * Time: 08:24
 */
include "../components/db/db_connect.php";
$status = "ready";
$id = $_POST['id'];

$updateQuery = "UPDATE purchase SET purchase_status = ? WHERE purchase_id = ?";
if ($insertStatement = mysqli_prepare($DBConnect, $updateQuery)) {
    mysqli_stmt_bind_param($insertStatement, "si", $status, $id);
    if ($insertExecute = mysqli_stmt_execute($insertStatement)) {
        echo $updateQuery;
        echo "<script>alert('Success')</script>";
    } else {
        echo "<script>alert('Something went wrong')</script>";
        echo mysqli_error($DBConnect);
    }
}
mysqli_stmt_close($insertStatement);
?>
