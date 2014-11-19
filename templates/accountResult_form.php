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
 <table style="width: 650px; border: solid; margin-left: 10px">
   <tr>
         <td style="width: 34%; border: none; text-align: left; padding: 5px;">
            &nbsp;
         </td>
         <td style="width: 33%; border: none; text-align: left; padding: 5px; font-weight: bold;">Billing Address:</td>
         <td style="width: 33%; border: none; text-align: left; padding: 5px; font-weight: bold;">
            Shipping Address:<label>
                         <input type="hidden" value="no" name="checkShpng">
                        <input name="checkShpng" id="checkShpng" type="checkbox" value="yes" <?=$sameasbilling?> />
                        Same As Billing</label>
         </td>
     </tr>
    <tr>
      <td style="width: 34%; border: none; text-align: left; padding: 5px; font-weight: bold;"><b>Name: </td>
      <td style="width: 33%; border: none; text-align: left; padding: 5px;"> 
        <input type="text" name="fullName" id="fullName" size=15 maxlength=15 value="<?=$in_fullName?>" readonly="readonly" style=" border: none; background-color:#eef3da; text-align:left; padding: 3px" />
      </td>
      <td style="width: 33%; border: none; text-align: left; padding: 5px;"> 
        <input type="text" name="fullNameShpng" id="fullNameShpng" size=15 maxlength=15 value="<?=$shpngFullName?>" readonly="readonly" style=" border: none; background-color:#eef3da; text-align:left; padding: 3px" />
      </td>
    </tr>
    <tr>
      <td style="width: 34%; border: none;  text-align: left; padding: 5px; font-weight: bold;">Street Address: </td>
      <td style="width: 33%; border: none; text-align: left; padding: 5px;"> 
        <input type="text" name="streetAddressBlng" id="streetAddressBlng" size=40 maxlength=40 value="<?=$streetAddressBlng?>" style=" border: none; background-color:#ffffff; text-align:left; padding: 3px"/>
      </td>
      <td style="width: 33%; border: none; text-align: left; padding: 5px;">
        <input type="text" name="streetAddressShpng" id="streetAddressShpng" size=40 maxlength=40 value="<?=$streetAddressShpng?>" style=" border: none; background-color:#ffffff; text-align:left; padding: 3px"/>
      </td>
   </tr>
    <tr>
      <td style="width: 34%; border: none; text-align: left; padding: 5px; font-weight: bold;">City: </td>
      <td style="width: 33%; border: none; text-align: left; padding: 5px;">
        <input type="text" name="cityBlng" id="cityBlng" size=40 maxlength=40 value="<?=$cityBlng?>" style=" border: none; background-color:#ffffff; text-align:left; padding: 3px"/>
      </td>
      <td style="width: 33%; border: none; text-align: left; padding: 5px;">
        <input type="text" name="cityShpng" id="cityShpng" size=40 maxlength=40 value="<?=$cityShpng?>" style=" border: none; background-color:#ffffff; text-align:left; padding: 3px"/>
      </td>
   </tr>
    <tr>
      <td style="width: 34%; border: none; text-align: left; padding: 5px; font-weight: bold;">State: </td>
      <td style="width: 33%; border: none; text-align: left; padding: 5px;">
        <input type="text" name="stateBlng" id="stateBlng" size=4 maxlength=2 value="<?=$stateBlng?>" style=" border: none; background-color:#ffffff; text-align:left; padding: 3px"/>
      </td>
      <td style="width: 33%; border: none; text-align: left; padding: 5px;">
        <input type="text" name="stateShpng" id="stateShpng" size=4 maxlength=2 value="<?=$stateShpng?>" style=" border: none; background-color:#ffffff; text-align:left; padding: 3px"/>
      </td>
   </tr>
   <tr>
      <td style="width: 34%; border: none; text-align: left; padding: 5px; font-weight: bold;">Zip Code:</td>
      <td style="width: 33%; border: none; text-align: left; padding: 5px;">
        <input type="text" name="zipBlng" id="zipBlng" size=10 maxlength=10 value="<?=$zipBlng?>" style=" border: none; background-color:#ffffff; text-align:left; padding: 3px"/>
      </td>
      <td style="width: 33%; border: none; text-align: left; padding: 5px;">
        <input type="text" name="zipShpng" id="zipShpng" size=10 maxlength=10 value="<?=$zipShpng?>" style=" border: none; background-color:#ffffff; text-align:left; padding: 3px"/>
      </td>
   </tr>
   <tr>
      <td style="width: 34%; border: none; text-align: left; padding: 5px; font-weight: bold;">Email: </td>
      <td style="width: 33%; border: none; text-align: left; padding: 5px;">
        <input type="text" name="emailBlng" id="emailBlng" size=40 maxlength=100 value="<?=$emailBlng?>" style=" border: none; background-color:#ffffff; text-align:left; padding: 3px"/>
      </td>
      <td style="width: 33%; border: none; text-align: left; padding: 5px;">
        <input type="text" name="emailShpng" id="emailShpng" size=40 maxlength=100 value="<?=$emailShpng?>" style=" border: none; background-color:#ffffff; text-align:left; padding: 3px"/>
      </td>
   </tr>
   <tr>
      <td style="width: 34%; border: none; text-align: left; padding: 5px; font-weight: bold;">Phone: </td>
      <td style="width: 33%; border: none; text-align: left; padding: 5px;">
        <input type="text" name="phoneBlng" id="phoneBlng" size=13 maxlength=15 value="<?=$phoneBlng?>" style=" border: none; background-color:#ffffff; text-align:left; padding: 3px"/>
      </td>
      <td style="width: 33%; border: none; text-align: left; padding: 5px;">
        <input type="text" name="phoneShpng" id="phoneShpng" size=13 maxlength=15 value="<?=$phoneShpng?>" style=" border: none; background-color:#ffffff; text-align:left; padding: 3px"/>
      </td>
   </tr>
   <tr>
      <td style="width: 34%; border: none; text-align: left; padding: 5px; font-weight: bold;">Cell: </td>
      <td style="width: 33%; border: none; text-align: left; padding: 5px;">
        <input type="text" name="cellBlng" id="cellBlng" size=13 maxlength=15 value="<?=$cellBlng?>" style=" border: none; background-color:#ffffff; text-align:left; padding: 3px"/>
      </td>
      <td style="width: 33%; border: none; text-align: left; padding: 5px;">
        <input type="text" name="cellShpng" id="cellShpng" size=13 maxlength=15 value="<?=$cellShpng?>" style=" border: none; background-color:#ffffff; text-align:left; padding: 3px"/>
      </td>
   </tr>
    <tr>
      <td style="width: 34%; border: none; text-align: left; padding: 5px;">
        <input type="submit" name="Submit" id="Submit"  value="Save">
      </td>
      <td style="width: 33%; border: none; text-align: center; padding: 5px;">&nbsp;</td>
      <td style="width: 33%; border: none; text-align: left; padding: 5px;">
        <input type="button" name="Cancel" id="Cancel" value="Cancel" onclick="history.back()">
      </td>
   </tr>
 </table>
 </form>
 <p>&nbsp;</p>
 <p></p>

