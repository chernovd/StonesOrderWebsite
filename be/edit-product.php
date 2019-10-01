<?php
/**
 * Lukas Kirchhoff
 * 13.06.2019
 * */

include "../components/imageUpload/imageUpload.php"; // Includes a script that moves the image to a certain folder
include "../components/pageProtection/pageProtection.php"; // add function to check if the user is allowed to see this page
redirectUser("admin"); // checks if the user is allowed to see the page;

getProductInformation($DBConnect);
updateProduct($DBConnect);
/* Get all the product data for a defined product */
function getProductInformation($DBConnect)
{
    $selectProducts = "SELECT * FROM product WHERE product_id = $_GET[pid];";

    if ($executeSelectProducts = mysqli_prepare($DBConnect, $selectProducts)) {
        if ($execution = mysqli_stmt_execute($executeSelectProducts)) {
            mysqli_stmt_bind_result($executeSelectProducts, $productId, $pcId, $productName, $productProducingTime, $productSpecial, $productImage, $productStatus, $price);
            mysqli_stmt_store_result($executeSelectProducts);
            if (mysqli_stmt_num_rows($executeSelectProducts) != 0) {
                while (mysqli_stmt_fetch($executeSelectProducts)) {
                    ?>
                    <h1 class="main-headline"><?php echo $productName; ?></h1>
                    <form method="post" action="index.php?page=edit-product&pid=<?php echo $productId ?>"
                          enctype="multipart/form-data">
                        <div class="form_wrapper">

                            <div class="form_element">
                                <label for="name" class="main_label">Name:</label>
                                <input type="text" name="name" class="form_input" value="<?php echo $productName; ?>">
                            </div>

                            <div class="form_element">
                                <label for="price" class="main_label">Price:</label>
                                <input type="text" name="price" class="form_input" value="<?php echo $price; ?>">
                            </div>

                            <div class="form_element">
                                <label for="Status" class="main_label">Status:</label>
                                <select class="form_input" name="status_select">
                                    <?php
                                    if ($productStatus == 1) {
                                        ?>
                                        <option selected="selected" value="1">Activate</option>
                                        <option value="0">Deactivate</option>
                                        <?php
                                    } else {
                                        ?>
                                        <option selected="selected" value="0">Dectivate</option>
                                        <option value="1">Activate</option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form_element">
                                <label for="image" class="main_label">Producing Time:</label>
                                <input type="text" name="producing_time" class="form_input"
                                       value="<?php echo $productProducingTime; ?>">
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
                                <input type="file" name="fileToUpload" class="form_input" value="<?php echo $productImage; ?>">
                                <div class="image-block">
                                    <img src="<?php echo $productImage; ?>" alt="Product">
                                </div>
                            </div>
                            -->
                            <div class="form_element">
                                <button type="submit" name="save" class="btn btn-gray">save changes</button>
                            </div>
                        </div>
                    </form>
                    <?php
                }
            } else {
                error_message("Results", "There a no results to show");
            }
        } else {
            error_message("Executing", "Problem with executing the SQL command");
        }
    } else {
        error_message("Preparing", "Problem with preparing the SQL command");
    }
}


function updateProduct($DBConnect)
{
    if (isset($_POST['save'])) {
        $name = htmlentities($_POST['name']); // product name
        $price = htmlentities($_POST['price']); // price from the product
        $status = htmlentities($_POST['status_select']); // is product active or inactive
        $time = htmlentities($_POST['producing_time']); // time to produce a product
        $category = htmlentities($_POST['select_category']); // product category
        $id = $_GET['pid']; // Get the product id
        // $image = $_POST['img'];
        $image = "https://robohash.org/optioquasidicta.png?size=100x100&set=set1"; // product image
        $special = htmlentities(''); // allergies from products

        $updateQuery = "UPDATE product SET pc_id = ?, product_name = ?, product_producingTime = ?, product_special = ?, product_image = ?, product_status = ?, price = ? WHERE product_id = ?";
        if ($insertStatement = mysqli_prepare($DBConnect, $updateQuery)) {
            mysqli_stmt_bind_param($insertStatement, "isissisi", $category, $name, $time, $special, $image, $status, $price, $id);
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