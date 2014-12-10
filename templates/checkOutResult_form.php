<?php
     /**
     * checkOutResult_form.php
     *
     * Frank E. Mathes
     * fmathes1@hotmail.com
     *
     * This template displays the visiting member relevant 
     * address information the order detail and order summary. 
     *
     * This project is being created as part of a final project for CS50x and
     * launch code final project spring of 2014.
     */
    // first load address form
?>
 <form name="addressForm"  id="addressForm" method="post" action="checkOutConfirm.php">
 <table style="width: 650px; border: solid; margin-left: 75px">
   <tr>
         <td style="width: 34%; border: none; text-align: left; padding: 5px;">&nbsp;</td>
         <td style="width: 33%; border: none; text-align: left; padding: 5px; font-weight: bold;">Billing Address:</td>
         <td style="width: 33%; border: none; text-align: left; padding: 5px; font-weight: bold;">Shipping Address:</td>
     </tr>
    <tr>
      <td style="width: 34%; border: none; text-align: left; padding: 5px; font-weight: bold;"><b>Name: </td>
      <td style="width: 33%; border: none; text-align: left; padding: 5px;"> <?=$fullNameBlng?></td>
      <td style="width: 33%; border: none; text-align: left; padding: 5px;"> <?=$shpngFullName . $fullNameShpng?></td>
    </tr>
    <tr>
      <td style="width: 34%; border: none;  text-align: left; padding: 5px; font-weight: bold;">Street Address: </td>
      <td style="width: 33%; border: none; text-align: left; padding: 5px;"><?=$streetAddressBlng?></td>
      <td style="width: 33%; border: none; text-align: left; padding: 5px;"><?=$streetAddressShpng?></td>
   </tr>
    <tr>
      <td style="width: 34%; border: none; text-align: left; padding: 5px; font-weight: bold;">City: </td>
      <td style="width: 33%; border: none; text-align: left; padding: 5px;"><?=$cityBlng?></td>
       <td style="width: 33%; border: none; text-align: left; padding: 5px;"><?=$cityShpng?></td>
   </tr>
    <tr>
      <td style="width: 34%; border: none; text-align: left; padding: 5px; font-weight: bold;">State: </td>
      <td style="width: 33%; border: none; text-align: left; padding: 5px;"><?=$stateBlng?></td>
      <td style="width: 33%; border: none; text-align: left; padding: 5px;"><?=$stateShpng?></td>
   </tr>
   <tr>
      <td style="width: 34%; border: none; text-align: left; padding: 5px; font-weight: bold;">Zip Code:</td>
      <td style="width: 33%; border: none; text-align: left; padding: 5px;"><?=$zipBlng?></td>
      <td style="width: 33%; border: none; text-align: left; padding: 5px;"><?=$zipShpng?></td>
   </tr>
   <tr>
      <td style="width: 34%; border: none; text-align: left; padding: 5px; font-weight: bold;">Email: </td>
      <td style="width: 33%; border: none; text-align: left; padding: 5px;"><?=$emailBlng?></td>
      <td style="width: 33%; border: none; text-align: left; padding: 5px;"><?=$emailShpng?></td>
   </tr>
   <tr>
      <td style="width: 34%; border: none; text-align: left; padding: 5px; font-weight: bold;">Phone: </td>
      <td style="width: 33%; border: none; text-align: left; padding: 5px;"><?=$phoneBlng?></td>
      <td style="width: 33%; border: none; text-align: left; padding: 5px;"><?=$phoneShpng?></td>
   </tr>
   <tr>
      <td style="width: 34%; border: none; text-align: left; padding: 5px; font-weight: bold;">Cell: </td>
      <td style="width: 33%; border: none; text-align: left; padding: 5px;"><?=$cellBlng?></td>
      <td style="width: 33%; border: none; text-align: left; padding: 5px;"><?=$cellShpng?></td>
   </tr>
    <tr>
      <td style="width: 34%; border: none; text-align: left; padding: 5px;"><input type="submit" name="Submit" id="Submit"  value="Confirm Order"></td>
      <td style="width: 33%; border: none; text-align: center; padding: 5px;">&nbsp;</td>
      <td style="width: 33%; border: none; text-align: left; padding: 5px;"><input type="button" name="Cancel" id="Cancel" value="Cancel" onclick="history.back()"></td>
   </tr>
 </table>
 </form>
 <p>&nbsp;</p>
    <?
        $total = 0.00;
	  // output table heading with type of table
	?>
	<table style="width: 700; border: solid; margin-left: 65px">
		<tr>
		<th style="width: 10%; text-align: center;">Item #</th>
        <th style="width: 55%; text-align: center;">Title</th>
		<th style="width: 10%; text-align: center;">Price</th>
		<th style="width: 10%; text-align: center;">Quantity</th>
        <th style="width: 15%; text-align: center;">Cost</th>
 		</tr>
     <?
	 // output table rows 
	     foreach ($orderItems as $item)
         {
            $item_id = $item["item_id"];
            $title_id = $item["title_id"];
            $title   = $item["title"];
            $price   = $item["price"];
            $quantity = $item["quantity"];
            $amount = $price * $quantity;
            $total += $amount;
    ?>
		<tr>
        <td style="width: 10%; text-align: center;"><?=$item_id?></td>
		<td style="width: 55%;  padding:3; text-align: left;"><?=$title?></td> 
		<td style="width: 10%; text-align: right; padding: 3">$<?=number_format($price, 2, '.', '')?></td>
        <td style="width: 10%; text-align: right; padding: 3"><?=$quantity?></td>
        <td style="width: 15%; text-align: right; padding: 3">$<?=number_format($amount, 2, '.', '')?></td>
        </tr>
      <?  			
 		}
		
		$salestax = round(($total * .10), 2);
		$shipping = round(($total * .18), 2);
		$grandtotal = round(($total + $salestax + $shipping), 2);	
		?>
		

		<tr>
        <td colspan=4 style="width: 10%; text-align: right;">sub total:</td>
        <td style="width: 15%; text-align: right; padding: 5">$<?=number_format($total, 2, '.', '')?></td>	
		</tr>
        <tr>
        <td colspan=4 style="width: 10%; text-align: right;">sales tax:</td>
        <td style="width: 15%; text-align: right; padding: 5">$<?=number_format($salestax, 2, '.', '')?></td>	
		</tr>
        <tr>
        <td colspan=4 style="width: 10%; text-align: right;">shipping:</td>
        <td style="width: 15%; text-align: right; padding: 5">$<?=number_format($shipping, 2, '.', '')?></td>	
		</tr>
        <tr>
        <td colspan=4 style="width: 10%; text-align: right;">grand total:</td>
        <td style="width: 15%; text-align: right; padding: 5">$<?=number_format($grandtotal, 2, '.', '')?></td>	
		</tr>
	</table>
	<p></p>

