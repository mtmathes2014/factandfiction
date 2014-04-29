<?php
     /**
     * store.php
     *
     * Frank E. Mathes
     * fmathes1@hotmail.com
     *
     * This template displays fact and fiction book store web store page form.
     *
     * This project is being created as part of a final project for CS50x and
     * launch code final project spring of 2014.
     */

?>
<div style="text-align: left;">
    <table style="width: 700; border: solid; margin-left: 50px">
		<tr>
		    <th style="width: 10%; text-align: center;">Book #</th>
            <th style="width: 60%; text-align: center;">Title</th>
		    <th style="width: 15%; text-align: center;">Price</th>
		    <th style="width: 15%; text-align: center;">&nbsp;</th>
		</tr>
 <?php foreach ($books as $book): ?>
  	  
	   	<tr>
            <td style="width: 10%; text-align: center;"><?=$book["title_id"] ?></td>
            <td style="width: 60%;  padding:3; text-align: left;"><?=$book["title"] ?></td>
	        <td style="width: 15%; text-align: right; padding: 3">$<?=number_format($book["price"], 2, '.', '') ?></td>
		    <td style="width: 15%; text-align: center;"><a href="priceCalculator.php?title_id=<?=$book['title_id'] ?>">More Info</a></td>
	    </tr>

<? endforeach ?>
		
    </table>
    <p>&nbsp;</p>
</div>
