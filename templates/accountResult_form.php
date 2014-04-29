<?php
     /**
     * accountResult_form.php
     *
     * Frank E. Mathes
     * fmathes1@hotmail.com
     *
     * This template displays the visiting member relevant 
     * address information. 
     *
     * This project is being created as part of a final project for CS50x and
     * launch code final project spring of 2014.
     */
    //  load address form
?>
 <form name="addressForm"  id="addressForm" method="post" action="accountResult.php">
 <table style="width: 650px; border: solid; margin-left: 75px">
   <tr>
         <td style="width: 34%; border: none; text-align: left; padding: 5px;">&nbsp;</td>
         <td style="width: 33%; border: none; text-align: left; padding: 5px; font-weight: bold;">Billing Address:</td>
         <td style="width: 33%; border: none; text-align: left; padding: 5px; font-weight: bold;">Shipping Address:</td>
     </tr>
    <tr>
      <td style="width: 34%; border: none; text-align: left; padding: 5px; font-weight: bold;"><b>Name: </td>
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
      <td style="width: 34%; border: none; text-align: left; padding: 5px;"><input type="submit" name="Submit" id="Submit"  value="Save"></td>
      <td style="width: 33%; border: none; text-align: center; padding: 5px;">&nbsp;</td>
      <td style="width: 33%; border: none; text-align: left; padding: 5px;"><input type="button" name="Cancel" id="Cancel" value="Cancel" onclick="history.back()"></td>
   </tr>
 </table>
 </form>
 <p>&nbsp;</p>
 <p></p>

