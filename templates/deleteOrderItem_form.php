<?php
     /**
     * deleteOrderItem_form.php
     *
     * Frank E. Mathes
     * fmathes1@hotmail.com
     *
     * This template displays the order item information  
     * delete form. It determines whether the item is about
     * to be deleted, or, has been deleted and displays the
     * appropiete message accordingly.
     *
     * This project is being created as part of a final project for CS50x and
     * launch code final project spring of 2014.
     */
if ($nbrPostItems > 0)
   {
?>
<p class="error">You have successfully deleted your order item <?=$in_title?>. 
    <br />You may return to the <a href="shoppingCart.php">Shopping Cart</a>.</p>
<?
   }
   else
   {
?>
<p class="error">Are you certain you want to delete the following item?</p>
<?
   }
?>

 <form name="deleteForm"  id="deleteForm" method="post" action="deleteOrderItem.php">
 <table style="width: 500px; border: solid; margin-left: 150px">
    <tr>
      <td style="width: 25%; text-align: left; padding: 5px;"><b>Title ID: </td>
      <td style="width: 75%; text-align: left; padding: 5px;"> <input type="text" name="title_id" id="title_id" size=15 maxlength=15 value="<?=$in_title_id?>"  readonly="readonly" style=" border: none; background-color:#eef3da; text-align:left; padding: 3px" /></td>
      </tr>
    <tr >
      <td style="width: 25%; text-align: left; padding: 5px;">Title: </td>
      <td style="width: 75%; text-align: left; padding: 5px;"><input type="text" name="title" id="title" size=40 maxlength=40 value="<?=$in_title?>"   readonly="readonly" style=" border: none; background-color:#eef3da; text-align:left; padding: 3px"/></td>
   </tr>
 
   <tr>
      <td style="width: 25%; text-align: left; padding: 5px;">Notes: </td>
      <td style="width: 75%; text-align: left; padding: 5px;"><textarea name="notes" id="notes" cols="40" rows="5" readonly="readonly" style=" border: none; background-color:#eef3da; text-align:left; padding: 3px"><?=$in_notes?></textarea></td>
   </tr>
   <tr>
     <td style="width: 25%; text-align: left; padding: 5px;">Price: </td>
     <td style="width: 75%; text-align: right; padding: 5px;"><input type="text" name="price" size="6" maxlength="6" value="$<?=number_format($in_price, 2, '.', '')?>"  readonly="readonly" style=" border: none; background-color:#eef3da; text-align:right; padding: 3px"></td>
   </tr>
   <tr>
     <td style="width: 25%; text-align: left; padding: 5px;">Purchase Quantity:</td>
     <td style="width: 70%; text-align: right; padding: 5px;"><input type="text" name="quantity" id="quantity" size="5" maxlength="5" value="<?=$in_quantity?>" readonly="readonly" style=" border: none; background-color:#eef3da; text-align:right; padding: 3px"> </td>
   </tr>
    <tr>
     <td style="width: 25%; text-align: left; padding: 5px;"><input name="oi_id" type="hidden" value="<?=$oi_id?>" />&nbsp;</td>
     <td style="width: 75%; text-align: center; padding: 5px;"><input type="submit" name="Sumit" id="Submit"  value="Delete Item"  <?=$disableSubBtn?> />&nbsp;<input type="button" name="Cancel" id="Cancel" value="Cancel" <?=$disableSubBtn?> onclick="history.back()" /></td>
   </tr>
 </table>
 </form>
 <p>&nbsp:</p>
