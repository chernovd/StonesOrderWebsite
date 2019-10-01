<?php
include "../components/pageProtection/pageProtection.php"; // add function to check if the user is allowed to see this page
redirectUser("admin"); // checks if the user is allowed to see the page;

$query = "SELECT product.product_name, count(product.product_id), purchase.purchase_date 
          FROM (( product 
          JOIN productspurchased ON productspurchased.product_id = product.product_id) 
          JOIN purchase ON productspurchased.product_id = purchase.purchase_id) 
          WHERE purchase.purchase_isPaid = 1 
          GROUP BY product.product_id
          ORDER BY purchase_date;";

$result = mysqli_query($DBConnect, $query);
$chart_data = "";
while ($row = mysqli_fetch_array($result)){
  $chart_data .= "{ date:'". $row["purchase_date"] ."', productId:".$row["count(product.product_id)"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);

?>

<body>
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 align="center">Stones order app statistics</h2>
   <h3 align="center">All of the stored data from the database</h3>   
   <br /><br />
   <div id="chart"></div>
  </div>
 </body>
</html>
 
<script>
  Morris.Bar({
    element : 'chart',
    data:[<?php echo $chart_data; ?>],
    xkey:'date',
    ykeys:['productId'],
    labels:['Product Sold', 'Product Name'],
    hideHover:'auto',
    stacked:true
  });
</script>