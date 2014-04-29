<?php
     /**
     * priceCalculor_form.php
     *
     * Frank E. Mathes
     * fmathes1@hotmail.com
     *
     * This template displays fact and fiction book store web price calculator page form.
     *
     * This project is being created as part of a final project for CS50x and
     * launch code final project spring of 2014.
     */

?>
 <form name="titleForm"  id="titleForm" method="post" action="priceCalcResult.php">
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
     <td style="width: 25%; text-align: left; padding: 5px;">Stock Quantity: </td>
     <td style="width: 75%; text-align: right; padding: 5px;"><input type="text" name="quantityonhand" id="quantityonhand" style=" border: none; background-color:#eef3da; text-align:right; padding: 3px" size="5" maxlength="5" value="<?=$in_quantityonhand?>"  readonly="readonly"></td>
   </tr>
   <tr>
     <td style="width: 25%; text-align: left; padding: 5px;">Purchase Quantity:</td>
     <td style="width: 70%; text-align: right; padding: 5px;"><input type="text" name="quantity" id="quantity" size="5" maxlength="5" value="<?=$in_quantity?>" style=" border: thin; background-color:#ffffff; text-align:right; padding: 3px"> </td>
   </tr>
    <tr>
     <td style="width: 25%; text-align: left; padding: 5px;">&nbsp;</td>
     <td style="width: 75%; text-align: center; padding: 5px;"><input type="submit" name="Sumit" id="Submit"  value="Calculate Price">&nbsp;<input type="button" name="Cancel" id="Cancel" value="Cancel" onclick="history.back()"></td>
   </tr>
 </table>
 </form>
 <p>&nbsp;</p>
