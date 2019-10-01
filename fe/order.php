<!DOCTYPE html>

<?php
include_once "../components/db/db_connect.php"; // create database connection


$now = time(); // get current time
if (isset($_SESSION["discard_after"]) && $now > $_SESSION["discard_after"]) {
    session_destroy(); // reset products if user clears basket
}

$_SESSION["discard_after"] = $now + 900
?>

<div id="box">
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div id="panel_soup" class="panel-heading accordion-toggle collapsed" data-toggle="collapse"
                 data-parent="#accordion" data-target="#collapseOne">
                <h4 class="panel-title">Soup</h4>

            </div>
            <div id="collapseOne" class="panel-collapse collapse">
                <div class="panel-body">
                    <?php
                    $SQLstring = "SELECT product_id , product_name , product_special , product_image 
                    FROM ( product 
                        JOIN productcategory ON productcategory.pc_id = product.pc_id) 
                        WHERE productcategory.pc_id = '2'";
                    printCards();
                    ?>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div id="panel_tostie" class="panel-heading accordion-toggle collapsed" data-toggle="collapse"
                 data-parent="#accordion" data-target="#collapseTwo">
                <h4 class="panel-title">Tostie</h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                    <?php
                    $SQLstring = "SELECT product_id , product_name , product_special , product_image 
                    FROM ( product 
                        JOIN productcategory ON productcategory.pc_id = product.pc_id) 
                        WHERE productcategory.pc_id = '3'";
                    printCards();
                    ?>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div id="panel_drinks" class="panel-heading accordion-toggle collapsed" data-toggle="collapse"
                 data-parent="#accordion" data-target="#collapseThree">
                <h4 class="panel-title">Drinks</h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                    <?php
                    $SQLstring = "SELECT product_id , product_name , product_special , product_image 
                    FROM ( product 
                        JOIN productcategory ON productcategory.pc_id = product.pc_id) 
                        WHERE productcategory.pc_id = '1'";
                    printCards();
                    ?>
                </div>
            </div>
        </div>
    </div>


    <?php
    $TableName = "product";
    if (isset($_SESSION['order'])){
        if (isset($_POST["id"]) && count($_SESSION["order"]) < 3) {
            $_SESSION["order"][] = $_POST["id"];
        }
    }else {
        if (isset($_POST["id"])) {
            $_SESSION["order"][] = $_POST["id"];
        }
    }


    function printCards()
    {
        global $DBConnect, $SQLstring;
        if ($stmt = mysqli_prepare($DBConnect, $SQLstring)) {
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $countID, $food, $desc, $img);
            mysqli_stmt_store_result($stmt);
            while (mysqli_stmt_fetch($stmt)) {

                echo "<form action='index.php?page=order' method='POST' id='add'>";
                echo "<button name='submit' id='card_submit' type='submit'>";
                echo "<div id='card'>";
                echo "<img id='card_img' src='" . $img . "'>";
                echo "<div id='card_price'>" . $desc;
                echo $food . "</div>";
                echo "<input type='hidden' name='id' value=" . $countID . ">";
                echo "</div>";
                echo "</button>";
                echo "</form>";
            }
        }

    }

    ?>
</div>