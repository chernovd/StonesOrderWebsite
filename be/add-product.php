<?php

/**
 * Lukas Kirchhoff
 * 15.06.2019
 * */
include "../components/db/db_connect.php"; // include database connection
include "../components/pageProtection/pageProtection.php"; // add function to check if the user is allowed to see this page
redirectUser("admin"); // checks if the user is allowed to see the page;
// include "../components/imageUpload/imageUpload.php"; // Includes a script that uploads the image to a certain folder

addProduct($DBConnect); // call add product method
?>
    <h1 class="main-headline">Add Product</h1>
    <form method="post" action="index.php?page=add-product" enctype="multipart/form-data">
        <div class="form_wrapper">
            <div class="form_element">
                <label for="name" class="main_label">Name:</label>
                <input required type="text" name="name" class="form_input" placeholder="Tostie Cheese & Ham">
            </div>
            <div class="form_element">
                <label for="price" class="main_label">Price:</label>
                <input required type="text" name="price" class="form_input" placeholder="3.95">
            </div>
            <div class="form_element">
                <label for="Status" class="main_label">Status:</label>
                <select required class="form_input" name="status_select">
                    <option selected="selected" value="1">Activate</option>
                    <option value="0">Deactivate</option>
                </select>
            </div>
            <div class="form_element">
                <label for="image" class="main_label">Producing Time:</label>
                <input required type="text" name="producing_time" class="form_input" placeholder="5">
            </div>
            <div class="form_element">
                <label for="Status" class="main_label">Category:</label>
                <?php
                getProductCategories($DBConnect); // gets all categories from the database
                categoryDropdown(); // creates dropdown to choose product category
                ?>
            </div>
            <!--
            <div class="form_element">
                <label for="fileToUpload" class="main_label">Image:</label>
                <input type="file" name="fileToUpload" class="form_input" ">
            </div>
            -->
        </div>
        <div class="button_wrapper-half">
            <button type="submit" name="submit" class="btn btn-gray">save changes</button>
        </div>
    </form>

<?php
/* Insert new Product in the product table */
function addProduct($DBConnect)
{
    if (isset($_POST['submit'])) {
        $name = htmlentities($_POST['name']); // product name
        $price = htmlentities($_POST['price']); // price from the product
        $status = htmlentities($_POST['status_select']); // is product active or inactive
        $time = htmlentities($_POST['producing_time']); // time to produce a product
        $category = htmlentities($_POST['select_category']); // product category
        // $image = $_POST['img'];
        $image = "https://robohash.org/optioquasidicta.png?size=100x100&set=set1"; // product image
        $special = htmlentities(''); // allergies from products


        $addProduct = "INSERT INTO product (pc_id, product_name, product_producingTime, product_special, product_image, product_status, price) VALUES (?, ?, ?, ?, ?, ?, ?)";
        if ($insertStatement = mysqli_prepare($DBConnect, $addProduct)) {
            mysqli_stmt_bind_param($insertStatement, "isissis", $category, $name, $time, $special, $image, $status, $price);
            if ($insertExecute = mysqli_stmt_execute($insertStatement)) {
                echo "<script>alert('Success')</script>";
            } else {
                echo "<script>alert('Something went wrong')</script>";
                echo mysqli_error($DBConnect);
            }
        } else {
            echo "<script>alert('Please fill in all the fields')</script>";
        }
        mysqli_stmt_close($insertStatement);
    }
}