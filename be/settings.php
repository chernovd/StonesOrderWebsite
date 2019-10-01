<?php
//if button working_hours is pressed read the data in the input field
include "../components/pageProtection/pageProtection.php"; // add function to check if the user is allowed to see this page
redirectUser("admin"); // checks if the user is allowed to see the page;

function sethours($DBConnect) {
    
    if (isset($_POST['set_hours'])){
        $tablename = "settings";
        $opening_hours = htmlentities(trim($_POST['opening_hours']));
        $closing_hours = htmlentities(trim($_POST['closing_hours']));

        $sql = "INSERT INTO $tablename (openingHours, closingHours) VALUES (?, ?)";

        if ($stmt = mysqli_prepare($DBConnect, $sql)){
                mysqli_stmt_bind_param($stmt, 'ss', $opening_hours, $closing_hours);
            if (mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
            }
        }mysqli_stmt_close($stmt);
    }
}


function showhours($DBConnect) {
    //ADD A TABLE FOR KITCHEN CONTROL
    $tablename = "settings";
    $SQL = "SELECT openingHours, closingHours FROM $tablename ORDER BY settingsId DESC LIMIT 1";
    $result = mysqli_query($DBConnect, $SQL);
    while ($row = mysqli_fetch_array($result)){
        echo "Opening hours: " . $row['openingHours'] . "<br>";
        echo "Closing hours: " . $row['closingHours'] . "<br>";
    }
}



function emergency_shut_down($DBConnect) {
    if (isset($_POST['emergency'])){
        if (isset($_POST['check'])){
            $emergency = 1;
            
            $sql = "INSERT INTO settings (emergencyStop) VALUES ($emergency) WHERE MAX(settingsId)";
            mysqli_query($DBConnect, $sql);
        }
    }
}
?>

<div id='box'>
    <form action='' method='POST' id='set_hours'>
        <input type='time' name='opening_hours' id='time'>
        <input type='time' name='closing_hours' id='time'>
        <input type='submit' name='set_hours' id='submit' value='Set hours'> 
        <?php sethours($DBConnect) ?>
    </form>

    <span><p>Current working hours are set to:</p>
        <p> 
            <?php showhours($DBConnect); ?>
        </p>
    </span>
    <hr>

    <form action='' method='POST' id='emergency'>
        <p>
            <input type='checkbox' name='check' id='check'>
            <label for='check'>I want to execute Emergency Stop</label>
        </p>
        <p><input type='submit' name='emergency' id='submit' value='Emergency Stop'></p>
        <?php emergency_shut_down($DBConnect); ?>
    </form>
    

</div>
