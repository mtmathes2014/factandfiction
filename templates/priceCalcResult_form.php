<?php
     /**
     * priceCalcResult.php
     *
     * Frank E. Mathes
     * fmathes1@hotmail.com
     *
     * This template displays fact and fiction book store web page price
     * calculator result form.
     *
     * This project is being created as part of a final project for CS50x and
     * launch code final project spring of 2014.
     */

?>
<form name="titleForm"  id="titleForm" method="post" action="shoppingCart.php">
 <table  style="width: 500px; border: solid; margin-left: 150px">
    <tr>
      <td style="width: 25%; text-align: left; padding: 5px;">Title ID: </td>
      <td style="width: 75%; text-align: left; padding: 5px;"> <input type="text" name="title_id" id="title_id" size=15 maxlength=15 value="<?=$in_title_id?>"  readonly="readonly" style=" border: none; background-color:#eef3da; text-align:left; padding: 3px"/></td>
      </tr>
    <tr >
      <td  style="width: 25%; text-align: left; padding: 5px;">Title: </td>
      <td  style="width: 75%; text-align: left; padding: 5px;"><input type="text" name="title" id="title" size=40 maxlength=40 value="<?=$in_title?>"  readonly="readonly" style=" border: none; background-color:#eef3da; text-align:left; padding: 3px"/></td>
   </tr>
 
   <tr>
      <td  style="width: 25%; text-align: left; padding: 5px;">Notes: </td>
      <td style="width: 75%; text-align: left; padding: 5px;"><textarea name="notes" id="notes" cols="40" rows="5" readonly="readonly" style=" border: none; background-color:#eef3da; text-align:left; padding: 3px"><?=$in_notes?></textarea></td>
   </tr>
   <tr>
     <td style="width: 25%; text-align: left; padding: 5px;">Price: </td>
     <td style="width: 75%; text-align: right; padding: 5px;"><input type="text" name="price" size=6 maxlength=10 value="$<?=$in_price?>"  readonly="readonly"  style=" border: none; background-color:#eef3da; text-align:right; padding: 3px"/></td>
   </tr>
   <tr>
     <td  style="width: 25%; text-align: left; padding: 5px;"> Quantity:</td>
     <td style="width: 75%; text-align: right; padding: 5px;"><input type="text" name="quantity" id="quantity" size=6 maxlength=6 value="<?=$in_quantity?>" readonly="readonly"  style=" border: none; background-color:#eef3da; text-align:right; padding: 3px"/> </td>
   </tr>
   <tr>
     <td style="width: 25%; text-align: left; padding: 5px;"> Total Cost:</td>
     <td style="width: 75%; text-align: right; padding: 5px;"><input type="text" name="totalcost" id="totalcost" size=7 maxlength=7 value="$<?=$in_amount?>" readonly="readonly" style=" border: none; background-color:#eef3da; text-align:right; padding: 3px"/> </td>
   </tr>
    <tr>
     <td style="width: 25%; text-align: left; padding: 5px;">&nbsp;</td>
     <td style="width: 75%; text-align: center; padding: 5px;"><input type="submit" name="Sumit" id="Submit"  value="<?=$subBtnTitle?>" <?=$disableSubBtn?> />&nbsp;<input type="button" name="Cancel" id="Cancel" value="Cancel" onclick="history.back()"></td>

   </tr>
 </table>
 </form>
 <p>&nbsp;</p>
