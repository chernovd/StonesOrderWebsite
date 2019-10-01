$(document).ready(function () {
    function loadlink() {
        $('#accordion').load('fetch_orders.php');
    }

// loadlink(); // This will run on page load
    setInterval(function () {
        loadlink() // this will run after every 5 seconds
        console.log("Tick");
    }, 5000);
});

$(function () {
    $("#datepicker").datepicker({dateFormat: 'yy-mm-dd'}).val();
});
