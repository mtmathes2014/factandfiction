<?php
     /**
     * shoppingCart_form.php
     *
     * Frank E. Mathes
     * fmathes1@hotmail.com
     *
     * This template displays fact and fiction book store web shopping cart page form.
     *
     * This project is being created as part of a final project for CS50x and
     * launch code final project spring of 2014.
     */

?>
<table style="width: 700; border: solid; margin-left: 50px">
		<tr>
		<th style="width: 10%; text-align: center;">Item #</th>
        <th style="width: 45%; text-align: center;">Title</th>
		<th style="width: 10%; text-align: center;">Price</th>
		<th style="width: 10%; text-align: center;">Quantity</th>
        <th style="width: 15%; text-align: center;">Cost</th>
        <th style="width: 5%; text-align: center;">&nbsp;</th>
        <th style="width: 5%; text-align: center;">&nbsp;</th>
		</tr>
		<?php
         $total = 0.00;
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
		<td style="width: 45%;  padding:3; text-align: left;"><?=$title?></td> 
		<td style="width: 10%; text-align: right; padding: 3">$<?=number_format($price, 2, '.', '') ?></td>
        <td style="width: 10%; text-align: right; padding: 3"><?=$quantity?></td>
        <td style="width: 15%; text-align: right; padding: 3">$<?=number_format($amount, 2, '.', '') ?></td>
         <td style="width: 5%; text-align: center; padding: 3"><a href="priceCalculator.php?title_id=<?=$title_id?>">update</a></td>	
         <td style="width: 5%; text-align: center; padding: 3"><a href="deleteOrderItem.php?title_id=<?=$title_id?>&item_id=<?=$item_id?>">delete</a></td>	
		</tr>
		
      <?  			
 		}

		?>
		<tr>
        <td style="width: 10%; text-align: center;">&nbsp;</td>
		<td style="width: 45%;  padding:3; text-align: left;">&nbsp;</td> 
		<td style="width: 10%; text-align: right; padding: 3">&nbsp;</td>
        <td style="width: 10%; text-align: right; padding: 3">sub total:</td>
        <td style="width: 15%; text-align: right; padding: 3">$<?=number_format($total, 2, '.', '')?></td>	
        <td style="width: 5%; text-align: center;">&nbsp;</td>
        <td style="width: 5%; text-align: center;">&nbsp;</td>
		</tr>
		</table>
		<p>&nbsp;</p>
