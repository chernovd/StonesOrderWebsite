<?php
/**
 * Created by PhpStorm.
 * User: lukaskirchhoff
 * Date: 25.05.19
 * Time: 16:03
 */


function fetchProducts($orderId, $DBConnect)
{
    $getProducts = "SELECT p.product_name 
                        FROM product AS p 
                        JOIN productspurchased AS po ON po.product_id = p.product_id 
                        JOIN purchase AS o ON o.purchase_id = po.purchase_id 
                        WHERE o.purchase_id = $orderId";


    if ($exeGetProducts = mysqli_prepare($DBConnect, $getProducts)) {
        if ($execution = mysqli_stmt_execute($exeGetProducts)) {
            mysqli_stmt_bind_result($exeGetProducts, $product_name);
            mysqli_stmt_store_result($exeGetProducts);
            if (mysqli_stmt_num_rows($exeGetProducts) != 0) {
                while (mysqli_stmt_fetch($exeGetProducts)) {
                    ?>
                    <li>
                        <?php echo $product_name; ?>
                    </li>
                    <?php
                }
            } else {
                echo "No products choosen";
            }
        } else {
            echo "Problem with executing";
        }
    } else {
        echo $getProducts;
        echo "Problem with preparing 2";

    }
}