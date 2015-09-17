<html>
 <head>
  <title>Comic Book Appreciation Site Product List</title>
  <style type="text/css">
   th { background-color: #999;}
   td { vertical-align: top; }
   .odd_row { background-color: #eee; }
   .even_row { background-color: #fff; }
  .style1 {font-size: 24px}
  </style>
 </head>
 <body>
 <span class="style1">
 <marquee behavior="scroll" direction="left" scrollamount="10"> 
 <strong>Welcome to my online shopee</strong>
 </marquee>
 </span>
<h1>Online  Book Store  </h1>
  <p> <a href="ecomm_view_cart.php">View Cart</a></p>
  <p>Thanks for visiting our site! Please see our list of awesome products
below, and click on the link for more information:</p>
  <table style="width:75%;" border="1" align="center">
<?php		
require 'db.inc.php';

$db = mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD) or
    die ('Unable to connect. Check your connection parameters.');

mysql_select_db(MYSQL_DB, $db) or die(mysql_error($db));

$query = 'SELECT
        product_code, name, price
    FROM
        ecomm_products
    ORDER BY
        product_code ASC';
$result = mysql_query($query, $db)or die(mysql_error($db));

$odd = true;
while ($row = mysql_fetch_array($result)) 
{
    echo ($odd == true) ? '<tr class="odd_row">' : '<tr class="even_row">';
    $odd = !$odd; 
    extract($row);
    echo '<td style="text-align: center; width:100px;"><a href="' .
        'ecomm_view_product.php?product_code=' . $product_code .
        '"><img src="images/' . $product_code .'.jpg" alt="' . $name .
        '"/></a></td>';
    echo '<td><a href="ecomm_view_product.php?product_code=' . $product_code .
			'">' . $name . '</a></td>';
    echo '<td style="text-align: right;"><a href="ecomm_view_product.php?' . 
        'product_code=' . $product_code . '">' . $price . '</a></td>';
    echo '</tr>';
}
?>
  </table>
 </body>
</html>
