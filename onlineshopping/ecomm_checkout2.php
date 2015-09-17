<?php
session_start();
require 'db.inc.php';

$db = mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD) or
    die ('Unable to connect. Check your connection parameters.');

mysql_select_db(MYSQL_DB, $db) or die(mysql_error($db));

$session = session_id();

if (isset($_POST['same_info'])) 
{
    $_POST['shipping_first_name'] = $_POST['first_name'];
    $_POST['shipping_last_name'] = $_POST['last_name'];
    $_POST['shipping_address_1'] = $_POST['address_1'];
    $_POST['shipping_address_2'] = $_POST['address_2'];
    $_POST['shipping_city'] = $_POST['city'];
    $_POST['shipping_state'] = $_POST['state'];
    $_POST['shipping_zip_code'] = $_POST['zip_code'];
    $_POST['shipping_phone'] = $_POST['phone'];
    $_POST['shipping_email'] = $_POST['email'];
}
?>
<html>
 <body>
  <title>Checkout Step 2 of 3</title>
  <style type="text/css">
   th { background-color: #999;}
   td { vertical-align: top; }
   .odd_row { background-color: #EEE; }
   .even_row { background-color: #FFF; }
  </style>
 </head>
 <body>
  <h1>Comic Book Appreciation Store</h1>
  <h2>Order Checkout</h2>
  <ol>
   <li>Enter Billing and Shipping Information</li>
   <li><strong>Verify Accuracy of Order Information and Send Order</strong></li>
   <li>Order Confirmation and Receipt</li>
  </ol>
   <table style="width: 75%;">
    <tr>
     <th style="width: 100px;"> </th><th>Item Name</th><th>Quantity</th>
     <th>Price Each</th><th>Extended Price</th>
    </tr>
<?php
$query = 'SELECT
        t.product_code, qty,
        name, description, price
    FROM
        ecomm_temp_cart t JOIN ecomm_products p ON
            t.product_code = p.product_code
    WHERE
        session = "' . $session . '"
    ORDER BY
        t.product_code ASC';
$results = mysql_query($query, $db) or die (mysql_error($db));

$rows = mysql_num_rows($results);

$total = 0;
$odd = true;
while ($row = mysql_fetch_array($results)) {
    echo ($odd == true) ? '<tr class="odd_row">' : '<tr class="even_row">';
    $odd = !$odd; 
    extract($row);
?>
     <td style="text-align:center;">
      <img src="images/<?php echo $product_code; ?>.jpg"
       alt="<?php echo $name; ?>"/>
     </td>
     <td><?php echo $name; ?></td>
     <td><?php echo $qty; ?></td>
     <td style="text-align: right;">$<?php echo $price; ?></td>
     <td style="text-align: right;">$<?php echo number_format($price*$qty,2); ?> 
     </td>
    </tr>
<?php
    $total = $total + $price * $qty;
}
?>
   </table>
   <p>Your total before shipping and tax is:
    <strong>$<?php echo number_format($total, 2); ?></strong></p>
   <table>
    <tr>
     <td>
      <table>
       <tr>
        <th colspan="2">Billing Information</th>
       </tr><tr>
        <td>First Name:</td>
        <td><?php echo $_POST['first_name'];?></td>
       </tr><tr>
        <td>Last Name:</td>
        <td><?php echo $_POST['last_name'];?></td>
       </tr><tr>
        <td>Billing Address:</td>
        <td><?php echo $_POST['address_1'];?></td>
       </tr><tr>
        <td> </td>
        <td><?php echo $_POST['address_2'];?></td>
       </tr><tr>
        <td>City:</td>
        <td><?php echo $_POST['city'];?></td>
       </tr><tr>
        <td>State:</td>
        <td><?php echo $_POST['state'];?></td>
       </tr><tr>
        <td>Zip Code:</td>
        <td><?php echo $_POST['zip_code'];?></td>
       </tr><tr>
        <td>Phone Number:</td>
        <td><?php echo $_POST['phone'];?></td>
       </tr><tr>
        <td>Email Address:</td>
        <td><?php echo $_POST['email'];?></td>
        </td>
       </tr><tr>
        <td colspan="2" style="text-align: center;">
<?php
	if (isset($_POST['same_info'])) 
	{
    echo 'Shipping information is same as billing.';
	}
?>
        </td>
       </tr>
      </table>
     </td>
     <td>
<?php
	if (!isset($_POST['same_info'])) 
	{
?>
      <table>
       <tr>
        <th colspan="2">Shipping Information</th>
       </tr><tr>
        <td>First Name:</td>
        <td><?php echo $_POST['shipping_first_name'];?></td>
       </tr><tr>
        <td>Last Name:</td>
        <td><?php echo $_POST['shipping_last_name'];?></td>
       </tr><tr>
        <td>Billing Address:</td>
        <td><?php echo $_POST['shipping_address_1'];?></td>
       </tr><tr>
        <td> </td>
        <td><?php echo $_POST['shipping_address_2'];?></td>
       </tr><tr>
        <td>City:</td>
        <td><?php echo $_POST['shipping_city'];?></td>
       </tr><tr>
        <td>State:</td>
        <td><?php echo $_POST['shipping_state'];?></td>
       </tr><tr>
        <td>Zip Code:</td>
        <td><?php echo $_POST['shipping_zip_code'];?></td>
       </tr><tr>
        <td>Phone Number:</td>
        <td><?php echo $_POST['shipping_phone'];?></td>
       </tr><tr>
        <td>Email Address:</td>
        <td><?php echo $_POST['shipping_email'];?></td>
        </td>
       </tr>
      </table>
<?php
}
?>
     </td>
    </tr>
   </table>
   <form method="post" action="ecomm_checkout3.php">
    <div>
     <input type="submit" name="submit" value="Process Order"/>
     <input type="hidden" name="first_name"
      value="<?php echo $_POST['first_name'];?>"/>
     <input type="hidden" name="last_name"
      value="<?php echo $_POST['last_name'];?>"/>
     <input type="hidden" name="address_1"
      value="<?php echo $_POST['address_1'];?>"/>
     <input type="hidden" name="address_2"
      value="<?php echo $_POST['address_2'];?>"/>
     <input type="hidden" name="city"
      value="<?php echo $_POST['city'];?>"/>
     <input type="hidden" name="state"
      value="<?php echo $_POST['state'];?>"/>
     <input type="hidden" name="zip_code"
      value="<?php echo $_POST['zip_code'];?>"/>
     <input type="hidden" name="phone"
      value="<?php echo $_POST['phone'];?>"/>
     <input type="hidden" name="email"
      value="<?php echo $_POST['email'];?>"/>
     <input type="hidden" name="shipping_first_name"
      value="<?php echo $_POST['shipping_first_name'];?>"/>
     <input type="hidden" name="shipping_last_name"
      value="<?php echo $_POST['shipping_last_name'];?>"/>
     <input type="hidden" name="shipping_address_1"
      value="<?php echo $_POST['shipping_address_1'];?>"/>
     <input type="hidden" name="shipping_address_2"
      value="<?php echo $_POST['shipping_address_2'];?>"/>
     <input type="hidden" name="shipping_city"
      value="<?php echo $_POST['shipping_city'];?>"/>
     <input type="hidden" name="shipping_state"
      value="<?php echo $_POST['shipping_state'];?>"/>
     <input type="hidden" name="shipping_zip_code"
      value="<?php echo $_POST['shipping_zip_code'];?>"/>
     <input type="hidden" name="shipping_phone"
      value="<?php echo $_POST['shipping_phone'];?>"/>
     <input type="hidden" name="shipping_email"
      value="<?php echo $_POST['shipping_email'];?>"/>
    </div>
   </form>
 </body>
</html>