<?php
include_once "../components/db/db_connect.php";
$now = time();
if (isset($_SESSION["discard_after"]) && $now > $_SESSION["discard_after"]) {
    session_destroy();
}
$_SESSION["discard_after"] = $now + 900;

if (isset($_POST['pay'])) {
    ?>

    <div class="row">
        <div class="col-75">
            <div class="container">
                <form action="index.php?page=verification" method="POST">

                    <div class="row">
                        <div class="col-50">
                            <h3>Billing Address</h3>
                            <label for="fname"> Full Name</label>
                            <input type="text" id="fname" name="firstname" placeholder="Jakob Smit">
                            <label for="email"> Email</label>
                            <input type="text" id="email" name="email" placeholder="example@mail.com">
                            <label for="adr">Address</label>
                            <input type="text" id="adr" name="address" placeholder="House# Street">
                            <label for="city"> City</label>
                            <input type="text" id="city" name="city" placeholder="City">

                            <div class="row">
                                <div class="col-50">
                                    <label for="municipality">Municipality</label>
                                    <input type="text" id="municipality" name="municipality" placeholder="Drenthe">
                                </div>
                                <div class="col-50">
                                    <label for="zip">Zip</label>
                                    <input type="text" id="zip" name="zip" placeholder="10001">
                                </div>
                            </div>
                        </div>

                        <div class="col-50">
                            <h3>Payment</h3>
                            <label for="fname">Accepted Cards</label>
                            <div class="icon-container">
                                <i class="fab fa-cc-visa" style="color:navy;"></i>
                                <i class="fab fa-cc-amex" style="color:blue;"></i>
                                <i class="fab fa-cc-mastercard" style="color:red;"></i>
                                <i class="fab fa-cc-discover" style="color:orange;"></i>
                            </div>
                            <label for="cname">Name on Card</label>
                            <input type="text" id="cname" name="cardname" placeholder="Jakob Smit">
                            <label for="ccnum">Credit card number</label>
                            <input type="text" id="ccnum" name="cardnumber" placeholder="0000-0000-0000-0000">
                            <label for="expmonth">Exp Month</label>
                            <input type="text" id="expmonth" name="expmonth" placeholder="September">

                            <div class="row">
                                <div class="col-50">
                                    <label for="expyear">Exp Year</label>
                                    <input type="text" id="expyear" name="expyear" placeholder="2020">
                                </div>
                                <div class="col-50">
                                    <label for="cvv">CVV</label>
                                    <input type="text" id="cvv" name="cvv" placeholder="352">
                                </div>
                            </div>
                        </div>

                    </div>
                    <label>
                        <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                    </label>
                    <input type="submit" value="Authorize Payment" class="btn" name='save'>
                </form>
            </div>
        </div>

        <div class="col-25">
            <div class="container">
                <h4>Cart
                    <span class="price" style="color:black">
          <i class="fa fa-shopping-cart"></i> 
          <b></b>
        </span>
                </h4>

                <?php
                $TableName = "product";
                $total_price = 0;
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
                                echo "<div id='name_payment'><span id='span_name'>" . $name . "</span></div>";
                                echo "<div id='price_payment'><span id='span_price'>" . $price . " &euro;</span></div>";
                                echo "<input type='hidden' value=" . $index . " name='index'></div>";
                                $total_price += ($price);
                            }
                        }
                    }
                }
                ?>
                <p id='pInvis'>.</p>
                <hr/>
                <h4>Total <span class="price" style="color:black"><b><?php echo $total_price; ?> &euro;</b></span></h4>
            </div>
        </div>
    </div>


    <?php
} else {
    echo "<script>window.location.replace('index.php?page=order');</script>";
}


?>