<?php
include "../components/db/db_connect.php"; // import database
// include "../components/fetchProducts/fetchProducts.php"; // import method to fetch the products that are ordered
include "../components/orderModal/orderModal.php"; // import method to order modal to show more details about the order

echo "<div id='accordion'>";
getOrderCards($DBConnect);
echo "</div>";

function getOrderCards($DBConnect)
{
    $selectProducts = "SELECT purchase_id, purchase_verificationNumber, purchase_isPaid FROM purchase WHERE purchase_status = 'pending'";
    if ($executeSelectProducts = mysqli_prepare($DBConnect, $selectProducts)) {
        if ($execution = mysqli_stmt_execute($executeSelectProducts)) {
            mysqli_stmt_bind_result($executeSelectProducts, $orderId, $purchase_verificationNumber, $purchasePaid);
            mysqli_stmt_store_result($executeSelectProducts);
            if (mysqli_stmt_num_rows($executeSelectProducts) != 0) {

                while (mysqli_stmt_fetch($executeSelectProducts)) {
                    ?>
                    <div class="order_overview--item">
                        <div class="order_overview--header">
                            <h5>Order No.</h5>
                            <h5><?php echo $orderId; ?></h5>
                            <div class="payment-icon" title="Shows if the order is paid">
                                <?php if ($purchasePaid == 1) {
                                    echo '<i class="far fa-check-circle payment"></i>';
                                } else {
                                    echo '<i class="far fa-times-circle payment-fail"></i>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="order_overview--content">
                            <ul class="list-white">
                                <?php fetchProducts($orderId, $DBConnect); ?>
                            </ul>
                        </div>
                        <div class="order_overview--buttons">
                            <form action="index.php?page=order-overview" method="post" id="submit-finish"
                            ">
                            <input type="hidden" name="purchase_id" class="pid" id="purchase_id"
                                   value="<?php echo $orderId ?>">
                            <button onclick="finishOrderWithoutRefresh(<?php echo $orderId; ?>)"
                                    type="submit" name="finish"
                                    id="<?php echo $orderId ?>"
                                    class="modal-button btn btn-white finish">
                                <span>finish order</span>
                            </button>
                            </form>
                            <button type="button" id="<?php echo $orderId; ?>"
                                    class="modal-button btn btn-white" data-toggle="modal"
                                    data-target="#modal<?php echo $orderId; ?>">
                                <span>details</span>
                            </button>
                        </div>
                        <div class="order_overview--timer">
                            <h5><?php echo $purchase_verificationNumber ?></h5>
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

?>
<script>
    // sends ajax request to the finish-order.php so that the page itself does not need to refresh after every submit
    function finishOrderWithoutRefresh(pid) {
        event.preventDefault();
        var purchaseId = pid;
        // console.log(purchaseId); // print out id for debugging and testing reasons
        $.ajax({
            type: 'POST', // method how the data is transfered
            url: 'finish-order.php', // file where the actual processing happens
            data: {'id': purchaseId}, // Date that is send to the finish-order.php
        })
    }

    function cancelOrder(pid) {
        event.preventDefault();
        var purchaseId = pid;
        // console.log(purchaseId); // print out id for debugging and testing reasons
        $.ajax({
            type: 'POST', // method how the data is transfered
            url: 'cancel-order.php', // file where the actual processing happens
            data: {'id': purchaseId}, // Date that is send to the finish-order.php
        })
    }
</script>