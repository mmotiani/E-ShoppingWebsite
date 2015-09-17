<?php
session_start();
?>
<html>
 <body>
  <title>Checkout Step 1 of 3</title>
  <style type="text/css">
   th { background-color: #999;}
   td { vertical-align: top; }
   .odd_row { background-color: #EEE; }
   .even_row { background-color: #FFF; }
  </style>
  <script type="text/javascript">

window.onload = function() 
{
    // assign toggle_shipping_visibility to same_info checkbox
    var c = document.getElementById('same_info');
    c.onchange = toggle_shipping_visibility;
}

function toggle_shipping_visibility() 
{
    var c = document.getElementById('same_info');
	var t = document.getElementById('shipping_table');
    // update shipping table's visibility
	
    t.style.display = (c.checked) ? 'none' : '';
}
  </script>
 </head>
 <body>
  <h1>Comic Book Appreciation Store</h1>
  <h2>Order Checkout</h2>
  <ol>
   <li><strong>Enter Billing and Shipping Information</strong></li>
   <li>Verify Accuracy of Order Information and Send Order</li>
   <li>Order Confirmation and Receipt</li>
  </ol>
  <form method="post" action="ecomm_checkout2.php">
   <table border="1">
    <tr>
     <td>
      <table>
       <tr>
        <th colspan="2">Billing Information</th>
       </tr><tr>
        <td><label for="first_name">First Name:</label></td>
        <td><input type="text" id="first_name" name="first_name" size="20"
          maxlength="20"/></td>
       </tr><tr>
        <td><label for="last_name">Last Name:</label></td>
        <td><input type="text" id="last_name" name="last_name" size="20"
          maxlength="20"/></td>
       </tr><tr>
        <td><label for="address_1">Billing Address:</label></td>
        <td><input type="text" id="address_1" name="address_1" size="30"
          maxlength="50"/></td>
       </tr><tr>
        <td> </td>
        <td><input type="text" id="address_2" name="address_2" size="30"
          maxlength="50"/></td>
       </tr><tr>
        <td><label for="city">City:</label></td>
        <td><input type="text" id="city" name="city" size="20"
          maxlength="20"/></td>
       </tr><tr>
        <td><label for="state">State:</label></td>
        <td><input type="text" id="state" name="state" size="2"
          maxlength="2"/></td>
       </tr><tr>
        <td><label for="zip_code">Zip Code:</label></td>
        <td><input type="text" id="zip_code" name="zip_code" size="5"
          maxlength="5"/></td>
       </tr><tr>
        <td><label for="phone">Phone Number:</label></td>
        <td><input type="text" id="phone" name="phone" size="10"
          maxlength="10"/></td>
       </tr><tr>
        <td><label for="email">Email Address:</label></td>
        <td><input type="text" id="email" name="email" size="30"
          maxlength="100"/>
        </td>
       </tr>
	   <tr>
        <td colspan="2" style="text-align: center;">
         <input type="checkbox" id="same_info" name="same_info"
          checked="checked"/>
         <label for="same_info">Shipping information is same as billing</label>
        </td>
       </tr>
      </table>
	
	   <td>
      <table id="shipping_table" style="display:none;" border="1">
       <tr>
        <th colspan="2">Shipping Information</th>
       </tr><tr>
        <td><label for="shipping_first_name">First Name:</label></td>
        <td><input type="text" id="shipping_first_name"
          name="shipping_first_name" size="20" maxlength="20"/></td>
       </tr><tr>
        <td><label for="shipping_last_name">Last Name:</label></td>
        <td><input type="text" id="shipping_last_name"
          name="shipping_last_name" size="20" maxlength="20"/></td>
       </tr><tr>
        <td><label for="shipping_address_1">Shipping Address:</label></td>
        <td><input type="text" id="shipping_address_1" name="shipping_address_1"
          size="30" maxlength="50"/></td>
       </tr><tr>
        <td> </td>
        <td><input type="text" id="shipping_address_2" name="shipping_address_2"
          size="30" maxlength="50"/></td>
       </tr><tr>
        <td><label for="shipping_city">City:</label></td>
        <td><input type="text" id="shipping_city" name="shipping_city" size="20"
          maxlength="20"/></td>
       </tr><tr>
        <td><label for="shipping_state">State:</label></td>
        <td><input type="text" id="shipping_state" name="shipping_state" size="2"
          maxlength="2"/></td>
       </tr><tr>
        <td><label for="shipping_zip_code">Zip Code:</label></td>
        <td><input type="text" id="shipping_zip_code" name="shipping_zip_code"
          size="5" maxlength="5"/></td>
       </tr><tr>
        <td><label for="shipping_phone">Phone Number:</label></td>
        <td><input type="text" id="shipping_phone" name="shipping_phone"
          size="10" maxlength="10"/></td>
       </tr><tr>
        <td><label for="shipping_email">Email Address:</label></td>
        <td><input type="text" id="shipping_email" name="shipping_email"
          size="30" maxlength="100"/>
        </td>
       </tr>
      </table>
     </td>
    </tr><tr>
     <td colspan="2">
      <input type="submit" value="Proceed to Next Step"/>
     </td>
    <tr>
   </table>
  </form>
 </body>
</html>