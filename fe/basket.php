<?php
include_once "../components/db/db_connect.php";
$now = time();
if (isset($_SESSION["discard_after"]) && $now > $_SESSION["discard_after"]) {
    session_destroy();
}
$_SESSION["discard_after"] = $now + 900;
?>
    <div id="box">
        <div id="box_left">
            <?php
            $TableName = "product";
            if (isset($_SESSION["order"])){
            if (isset($_POST["remove"])) {
                unset($_SESSION["order"][$_POST["index"]]);
            }
            foreach ($_SESSION["order"] as $index => $id) {
            if ($id != "") {
            $SQLstring2 = "SELECT count(product_id) , product_name , product_image, price FROM " . $TableName . " WHERE product_id=" . $id;
            if ($stmt = mysqli_prepare($DBConnect, $SQLstring2)) {
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $countID, $name, $img, $price);
                mysqli_stmt_store_result($stmt);
                while (mysqli_stmt_fetch($stmt)) {
                    echo "<div id='basket_card_submit'>";
                    echo "<div id='basket_card_box'>";
                    echo "<div id='basket_img_box'>";
                    echo "<img id='basket_img_box_image' src='" . $img . "'>";
                    echo "</div>";
                    echo "<div id='id'><span id='span_id'>" . $countID . "x</span></div>";
                    echo "<div id='name'><span id='span_name'>" . $name . "</span></div>";
                    echo "<div id='price'><span id='span_price'>" . $price . " &euro;</span></div>";
                }
            }
            ?>
            <form action="index.php?page=basket" method="POST">
                <input type="hidden" value="<?php echo $index; ?>" name="index">
                <button id='cross' type="submit" value="Remove" name="remove">
                    <i class="fas fa-times" style='font-size: 35px'></i>
                </button>
            </form>
        </div>
        <?php
        echo "</div>";
        }
        }
        }
        if (empty($_SESSION["order"]) || !isset($_SESSION["order"])) {
            echo "<h1>Your cart is empty <a href='index.php?page=order'>click here</a> if you would like to order food</h1>";
        }
        ?>
    </div>
    <div id="box_right">
        <div id='basket_list'>
            <div id='basket_list_top'>
                <p>Your Order</p>
                <div id="line"></div>
            </div>

            <div id='basket_list_middle'>
                <?php
                $total_price = 0;
                if (isset($_SESSION["order"])) {
                    foreach ($_SESSION["order"] as $index => $id) {
                        if ($id != "") {
                            $SQLstring2 = "SELECT count(product_id) , product_name , price FROM " . $TableName . " WHERE product_id=" . $id;
                            if ($stmt = mysqli_prepare($DBConnect, $SQLstring2)) {
                                mysqli_stmt_execute($stmt);
                                mysqli_stmt_bind_result($stmt, $countID, $name, $price);
                                mysqli_stmt_store_result($stmt);
                                while (mysqli_stmt_fetch($stmt)) {
                                    echo "<div id='preview'>
                                    <div id='id'><span id='span_id'>" . $countID . "x</span></div>";
                                    echo "<div id='name'><span id='span_name'>" . $name . "</span></div>";
                                    echo "<div id='price'><span id='span_price'>" . $price . " &euro;</span></div>";
                                    echo "<input type='hidden' value=" . $index . " name='index'></div>";
                                    $total_price += ($price);
                                }
                            }
                        }
                    }
                }
                ?>
            </div>

            <div id='basket_list_low'>
                <p><i class="fas fa-shopping-basket"></i></p>
                <div id="line"></div>
                <p>Total: <?php echo $total_price; ?> &euro;</p>

            </div>
        </div>
        <div id="textarea">
            <form action="index.php?page=payment" method="POST">
                <textarea placeholder="Enter your special needs and/or requirements"></textarea>
                <input type="submit" name="pay" id="save" value="Proceed to checkout">
            </form>
        </div>
    </div>
    <form action="index.php?page=basket" method="POST">
        <input type="hidden" value="<?php echo $index; ?>" name="index">
    </form>
<?php
echo "</div>";
?>
    </div>

<?php
// save proccess
if (isset($_POST["save"])) {
    $rnd = rand(0, 9999);
    $proccess = "pending";
    $paid = 1;
    $TableName3 = "purchase";
//save into purchase
    $SQLstring3 = "INSERT INTO " . $TableName3 . " (`purchase_id`, `purchase_verificationNumber`, `purchase_status`, `purchase_isPaid` ) VALUES (NULL, ? , ? , ?);";
    if ($stmt = mysqli_prepare($DBConnect, $SQLstring3)) {
        mysqli_stmt_bind_param($stmt, 'sss', $rnd, $proccess, $paid);
        $QueryResult = mysqli_stmt_execute($stmt);
    }
//get the purchase id
    $SQLstring4 = "SELECT `purchase_id` FROM " . $TableName3 . " WHERE `purchase_verificationNumber` =" . $rnd;
    if ($stmt = mysqli_prepare($DBConnect, $SQLstring4)) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $countID);
        mysqli_stmt_store_result($stmt);
        while (mysqli_stmt_fetch($stmt)) {
            echo $countID;
        }
    }
    $TableName4 = "productspurchased";
//insert the order to  productspurchased
    foreach ($_SESSION["order"] as $index) {
        $SQLstring3 = "INSERT INTO " . $TableName4 . " (`pp_id`, `product_id`, `purchase_id` ) VALUES (NULL, ? , ? );";
        if ($stmt = mysqli_prepare($DBConnect, $SQLstring3)) {
            mysqli_stmt_bind_param($stmt, 'ss', $index, $countID);
            $QueryResult = mysqli_stmt_execute($stmt);
        }
    }
}

?>