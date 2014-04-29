 <p style="width: 650px; text-align: center; font-weight: bold;">Fact And Fiction Order Number: <?=$o_id?> </p>
 <table style="width: 650px; border: none; margin-left: 75px">
 <tr>
         <td style="width: 34%; border: none; text-align: left; padding: 5px;">&nbsp;</td>
         <td style="width: 33%; border: none; text-align: left; padding: 5px; font-weight: bold;">Billing Address:</td>
         <td style="width: 33%; border: none; text-align: left; padding: 5px; font-weight: bold;">Shipping Address:</td>
     </tr>
    <tr>
      <td style="width: 34%; border: none; text-align: left; padding: 5px; font-weight: bold;">Name: </td>
      <td style="width: 33%; border: none; text-align: left; padding: 5px;"> <?=$in_fullName?></td>
      <td style="width: 33%; border: none; text-align: left; padding: 5px;"> <?=$shpngFullName?></td>
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
      <td style="width: 34%; border: none; text-align: left; padding: 5px; font-weight: bold;">Zip Code: </td>
      <td style="width: 33%; border: none; text-align: left; padding: 5px;"><?=$zipBlng?></td>
      <td style="width: 33%; border: none; text-align: left; padding: 5px;"><?=$zipShpng?></td>
   </tr>
   <tr>
      <td style="width: 34%; border: none; text-align: left; padding: 5px; font-weight: bold;">Email:</td>
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
 </table>
 <p>&nbsp;</p>
    <?
        $total = 0.00;
	  // output table heading with type of table
	?>
	<table sytle="width: 600; border: none; margin-left: 65px" >
		<tr>
		<th style="width: 10%; text-align: center;" >Item #</th>
        <th style="width: 55%; text-align: left;" >Title</th>
		<th style="width: 10%; text-align: right;" >Price</th>
		<th style="width: 10%; text-align: right;" >Quantity</th>
        <th style="width: 15%; text-align: right;" >Cost</th>
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
            $amount = round(($price * $quantity), 2);
            $total += $amount;
    ?>
		<tr>
        <td style="width: 10%; text-align: center;" ><?=$item_id?></td>
		<td style="width: 55%;  padding:3; text-align: left;" ><?=$title?></td> 
		<td style="width: 10%; text-align: right; padding: 3;" >$<?=number_format($price, 2, '.', '')?></td>
        <td style="width: 10%; text-align: right; padding: 3;" ><?=$quantity?></td>
        <td style="width: 15%; text-align: right; padding: 3;" >$<?=number_format($amount, 2, '.', '')?></td>
        </tr>
    <?  			
 		}
		# calculate sales tax and shipping as fixed percentage of sub total
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
