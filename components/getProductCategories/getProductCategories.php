<?php
/**
 * User: Lukas Kirchhoff
 * Date: 13.06.2019
 */


// Gets all category names and ids that are stored in the database and saves it in an array;
function getProductCategories($DBConnect)
{
    global $rows;
    $query = "SELECT * FROM productcategory";
    $result = $DBConnect->query($query);

    while ($row = $result->fetch_array()) {
        $rows[] = $row;
    }
}

function categoryDropdown()
{
    global $rows;
    ?>
    <select name="select_category" class="form_input">
        <?php
        foreach ($rows as $row) {
            echo "<option value='" . $row[0] . "'>" . $row['0'] . " " . $row['1'] . "</option>";
        }
        ?>
    </select>

    <?php
}

?>