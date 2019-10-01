<?php
// include "../components/db/db_connect.php"; // import database
include "../components/fetchProducts/fetchProducts.php"; // import method to fetch the products that are ordered

function orderModal($DBConnect)
{

    $selectProducts = "SELECT purchase_id, purchase_verificationNumber FROM purchase WHERE purchase_status = 'pending'";

    if ($executeSelectProducts = mysqli_prepare($DBConnect, $selectProducts)) {
        if ($execution = mysqli_stmt_execute($executeSelectProducts)) {
            mysqli_stmt_bind_result($executeSelectProducts, $orderId, $purchase_verificationNumber);
            mysqli_stmt_store_result($executeSelectProducts);
            if (mysqli_stmt_num_rows($executeSelectProducts) != 0) {
                echo "<div id='accordion'>";
                while (mysqli_stmt_fetch($executeSelectProducts)) {
                    ?>
                    <div class="modal fade" id="modal<?php echo $orderId; ?>" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-box-wrapper">
                                        <div class="modal-box">
                                            <p class="modal-headline">Order Details</p>
                                            <p><b>Prodcuts ordered</b></p>
                                            <ul>
                                                <?php fetchProducts($orderId, $DBConnect); ?>
                                            </ul>
                                        </div>
                                        <div class="modal-box">
                                            <p class="modal-headline">Customer Details</p>
                                            <p><b>Name</b><br>
                                            Customer Name
                                            </p>
                                            <p><b>Order No.</b><br>
                                                <?php echo $orderId; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <form action="index.php?page=order-overview" method="post" id="submit-finish">
                                        <input type="hidden" name="purchase_id" class="pid" id="purchase_id"
                                               value="<?php echo $orderId ?>">
                                        <button onclick="cancelOrder(<?php echo $orderId; ?>)"
                                                type="submit" name="finish"
                                                id="<?php echo $orderId ?>"
                                                class="modal-button btn btn-white finish">
                                            <span>cancel order</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "No tickets yet";
            }
        } else {
            echo "Problem with executing";
        }
    } else {
        echo "Problem with preparing";
    }
}