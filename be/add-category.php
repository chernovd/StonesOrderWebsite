<?php
/**
 * Created by PhpStorm.
 * User: lukir
 * Date: 24.06.2019
 * Time: 19:48
 */

function addCategory($DBConnect)
{
    if (isset($_POST['add'])) {
        $categoryName = $_POST['category'];

        $addProduct = "INSERT INTO productcategory (pc_id, pc_name) VALUES (NULL, ?);";
        if ($insertStatement = mysqli_prepare($DBConnect, $addProduct)) {
            mysqli_stmt_bind_param($insertStatement, "s", $categoryName);
            if ($insertExecute = mysqli_stmt_execute($insertStatement)) {
                echo "<script>alert('Success')</script>";
            } else {
                echo "<script>alert('Something went wrong')</script>";
                echo mysqli_error($DBConnect);
            }
        }
        mysqli_stmt_close($insertStatement);
    }
}

addCategory($DBConnect);
?>

<h1 class="main-headline">Add category</h1>
<div class="add-category_wrapper">
    <form action="index.php?page=add-category" method="post">
        <div class="form_wrapper">
            <div class="form_element">
                <label for="category" class="main_label">Category:</label>
                <input required type="text" name="category" class="form_input" placeholder="Tostie">
            </div>
        </div>
        <div class="button_wrapper-half">
            <button type="submit" name="add" class="btn btn-gray">add category</button>
        </div>
    </form>
</div>
