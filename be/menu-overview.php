<?php
include "../components/pageProtection/pageProtection.php"; // add function to check if the user is allowed to see this page
redirectUser("admin"); // checks if the user is allowed to see the page;
?>
<div class="product-wrapper">
    <h1 class="main-headline">Menu Overview</h1>
    <div class="button_wrapper-half">
        <div class="button-wrapper">
            <a href="index.php?page=add-product" class="btn btn-gray">Add Product</a>
        </div>
        <div class="button-wrapper">
            <a href="index.php?page=add-category" class="btn btn-gray">Add Category</a>
        </div>
    </div>
    <h2 class="sub-headline">Active products</h2>
    <?php getAllActiveProducts($DBConnect); ?>
    <h2 class="sub-headline">Inactive products</h2>
    <?php getAllInactiveProducts($DBConnect); ?>
</div>


<?php
function getAllActiveProducts($DBConnect)
{
    $selectProducts = "SELECT product_id, product_name, product_image, product_status FROM product WHERE product_status = 1";

    if ($executeSelectProducts = mysqli_prepare($DBConnect, $selectProducts)) {
        if ($execution = mysqli_stmt_execute($executeSelectProducts)) {
            mysqli_stmt_bind_result($executeSelectProducts, $productId, $productName, $productImg, $productStatus);
            mysqli_stmt_store_result($executeSelectProducts);
            if (mysqli_stmt_num_rows($executeSelectProducts) != 0) {
                while (mysqli_stmt_fetch($executeSelectProducts)) {
                    ?>
                    <div class="product_item-wrapper">
                        <div class="product_item-img">
                            <img src="<?php echo $productImg; ?>" alt="<?php echo $productName; ?>">
                        </div>
                        <div class="product_item-name">
                            <h2><?php echo $productName; ?></h2>
                        </div>
                        <div class="product_item-status">
                            <form action="index.php?page=menu-overview" method="post">
                                <input type="hidden" name="pid" value="<?php echo $productId ?>">
                                <input type="hidden" name="status" value="<?php echo $productStatus ?>">
                                <button class="btn btn-white" name="submit" type="submit" onclick="location.reload();">
                                    Deactivate
                                </button>
                            </form>
                        </div>
                        <div class="product_item-details">
                            <form action="index.php?page=edit-product&pid=<?php echo $productId; ?>" method="post">
                                <button type="submit" class="btn btn-white">Edit product</button>
                            </form>
                        </div>
                    </div>
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


function getAllInactiveProducts($DBConnect)
{
    $selectProducts = "SELECT product_id, product_name, product_image, product_status FROM product WHERE product_status = 0";

    if ($executeSelectProducts = mysqli_prepare($DBConnect, $selectProducts)) {
        if ($execution = mysqli_stmt_execute($executeSelectProducts)) {
            mysqli_stmt_bind_result($executeSelectProducts, $productId, $productName, $productImg, $productStatus);
            mysqli_stmt_store_result($executeSelectProducts);
            if (mysqli_stmt_num_rows($executeSelectProducts) != 0) {
                while (mysqli_stmt_fetch($executeSelectProducts)) {
                    ?>
                    <div class="product_item-wrapper">
                        <div class="product_item-img">
                            <img src="<?php echo $productImg; ?>" alt="<?php echo $productName; ?>">
                        </div>
                        <div class="product_item-name">
                            <h2><?php echo $productName; ?></h2>
                        </div>
                        <div class="product_item-status">
                            <form action="index.php?page=menu-overview" method="post">
                                <input type="hidden" name="pid" value="<?php echo $productId ?>">
                                <input type="hidden" name="status" value="<?php echo $productStatus ?>">
                                <button class="btn btn-white" name="submit" type="submit"
                                        onclick="location.reload();">Activate
                                </button>
                            </form>
                        </div>
                        <div class="product_item-details">
                            <form action="index.php?page=edit-product&pid=<?php echo $productId; ?>" method="post">
                                <button type="submit" class="btn btn-white">Edit product</button>
                            </form>
                        </div>
                    </div>
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

if (isset($_POST['submit'])) {
    $getProductStatus = $_POST['status'];
    $getProductId = $_POST['pid'];
    if ($getProductStatus == 1) {
        $updateQuery = "UPDATE product SET product_status = 0 WHERE product_id = ?";
    } else {
        $updateQuery = "UPDATE product SET product_status = 1 WHERE product_id = ?";
    }

    if ($updateStmt = mysqli_prepare($DBConnect, $updateQuery)) {
        mysqli_stmt_bind_param($updateStmt, "i", $getProductId);
        if (mysqli_stmt_execute($updateStmt) == TRUE) {
            // SUCCESS
        }
    } else {
        error_message("Error", "Cannot prepare the update");
    }
}
?>
