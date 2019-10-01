<?php
$date = date("Y-m-d");
include "../components/db/db_connect.php";
include "../components/fetchProducts/fetchProducts.php";
include "../components/pageProtection/pageProtection.php"; // add function to check if the user is allowed to see this page
redirectUser("admin"); // checks if the user is allowed to see the page;
?>
<h1 class="main-headline">Order History</h1>
<div class="order-history">
    <form method="post" action="index.php?page=order-history">
        <p>Date: <input type="text" name="date" id="datepicker" placeholder="<?php echo $date ?>"></p>
        <button type="submit" class="btn btn-primary">change list</button>
    </form>

    <div class="history-wrapper">
        <?php
        if (isset($_POST['date'])) {
            $choosenDate = $_POST['date'];
            $selectProducts = "SELECT purchase_id FROM purchase WHERE date(purchase_date) ='$choosenDate'";
        } else {
            $selectProducts = "SELECT purchase_id FROM purchase WHERE purchase_date = '$date'";
        }

        if ($executeSelectProducts = mysqli_prepare($DBConnect, $selectProducts)) {
            if ($execution = mysqli_stmt_execute($executeSelectProducts)) {
                mysqli_stmt_bind_result($executeSelectProducts, $orderId);
                mysqli_stmt_store_result($executeSelectProducts);
                if (mysqli_stmt_num_rows($executeSelectProducts) != 0) {
                    while (mysqli_stmt_fetch($executeSelectProducts)) {
                        ?>
                        <div class="order_history--item">
                            <div class="order_overview--header">
                                <h5>Order No.</h5>
                                <h5><?php echo $orderId; ?></h5>
                            </div>
                            <div class="order_overview--content">
                                <ul class="list-white">
                                    <?php fetchProducts($orderId, $DBConnect); ?>
                                </ul>
                            </div>
                            <div class="order_overview--buttons">
                                <button type="button" id="<?php echo $orderId; ?>"
                                        class="modal-button btn btn-white" data-toggle="modal"
                                        data-target="#exampleModal">
                                    <span>finish order</span>
                                </button>
                                <button type="button" id="<?php echo $orderId; ?>"
                                        class="modal-button btn btn-white" data-toggle="modal"
                                        data-target="#modal<?php echo $orderId; ?>">
                                    <span>details</span>
                                </button>
                            </div>
                            <div class="order_overview--timer">
                                <h5>5:21</h5>
                            </div>
                        </div>
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
                                                    Lukas Kirchhoff</p>
                                                <p><b>Order No.</b><br>
                                                    <?php echo $orderId; ?></p>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-white" data-dismiss="modal">cancel order
                                        </button>
                                        <button type="button" class="btn btn-white">uncompleted order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    error_message("No orders", "Sorry, there are no orders to display for this day");
                }
            } else {
                echo "Problem with executing";
            }
        } else {
            echo "Problem with preparing 1";

        }
        ?>
    </div>
</div>
