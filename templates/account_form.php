<?php
     /**
     * account.php
     *
     * Frank E. Mathes
     * fmathes1@hotmail.com
     *
     * This template displays fact and fiction book store member account
     * address update page.
     *
     * This project is being created as part of a final project for CS50x and
     * launch code final project spring of 2014.
     */

?>
<p><span class="error">*</span> indicates required information</p>
 <form name="addressForm"  id="addressForm" method="post" action="accountResult.php">
    <fieldset>
        <table style="width: 500px; border: solid; margin-left: 150px">
            <tr>
                  <td style="width: 25%; text-align: left; padding: 5px;"><b>Name: </td>
                  <td style="width: 75%; text-align: left; padding: 5px;"> 
                    <input type="text" name="fullName" id="fullName" size=15 maxlength=15 value="<?=$in_fullName?>"  readonly="readonly" style=" border: none; background-color:#eef3da; text-align:left; padding: 3px" /></td>
            </tr>
            <tr>
                 <td style="width: 25%; text-align: left; padding: 5px;">Billing Address:</td>
                 <td style="width: 75%; text-align: left; padding: 5px;">&nbsp;</td>
            </tr>
            <tr>
                  <td style="width: 25%; text-align: left; padding: 5px;">Street Address: <span class="error">*</span> </td>
                  <td style="width: 75%; text-align: left; padding: 5px;">
                        <input type="text" name="streetAddressBlng" id="streetAddressBlng" size=40 maxlength=40 value="<?=$streetAddressBlng?>" style=" border: none; background-color:#ffffff; text-align:left; padding: 3px"/></td>
            </tr>
            <tr>
                  <td style="width: 25%; text-align: left; padding: 5px;">City: <span class="error">*</span></td>
                  <td style="width: 75%; text-align: left; padding: 5px;"><input type="text" name="cityBlng" id="cityBlng" size=40 maxlength=40 value="<?=$cityBlng?>" style=" border: none; background-color:#ffffff; text-align:left; padding: 3px"/></td>
            </tr>
            <tr>
                  <td style="width: 25%; text-align: left; padding: 5px;">State: <span class="error">*</span></td>
                  <td style="width: 75%; text-align: left; padding: 5px;"><input type="text" name="stateBlng" id="stateBlng" size=4 maxlength=2 value="<?=$stateBlng?>" style=" border: none; background-color:#ffffff; text-align:left; padding: 3px"/></td>
           </tr>
           <tr>
                  <td style="width: 25%; text-align: left; padding: 5px;">Zip Code: <span class="error">*</span></td>
                  <td style="width: 75%; text-align: left; padding: 5px;"><input type="text" name="zipBlng" id="zipBlng" size=10 maxlength=10 value="<?=$zipBlng?>" style=" border: none; background-color:#ffffff; text-align:left; padding: 3px"/></td>
           </tr>
           <tr>
                  <td style="width: 25%; text-align: left; padding: 5px;">Email: <span class="error">*</span></td>
                  <td style="width: 75%; text-align: left; padding: 5px;"><input type="text" name="emailBlng" id="emailBlng" size=40 maxlength=100 value="<?=$emailBlng?>" style=" border: none; background-color:#ffffff; text-align:left; padding: 3px"/></td>
           </tr>
           <tr>
                  <td style="width: 25%; text-align: left; padding: 5px;">Phone: </td>
                  <td style="width: 75%; text-align: left; padding: 5px;"><input type="text" name="phoneBlng" id="phoneBlng" size=13 maxlength=15 value="<?=$phoneBlng?>" style=" border: none; background-color:#ffffff; text-align:left; padding: 3px"/></td>
           </tr>
           <tr>
                  <td style="width: 25%; text-align: left; padding: 5px;">Cell: </td>
                  <td style="width: 75%; text-align: left; padding: 5px;"><input type="text" name="cellBlng" id="cellBlng" size=13 maxlength=15 value="<?=$cellBlng?>" style=" border: none; background-color:#ffffff; text-align:left; padding: 3px"/></td>
           </tr>
           <tr>
                 <td style="width: 25%; text-align: left; padding: 5px;">Shipping Address:</td>
                 <td style="width: 75%; text-align: left; padding: 5px;">
                    <label>
                        <input type="hidden" value="no" name="checkShpng">
                        <input name="checkShpng" id="checkShpng" type="checkbox" value="yes" <?=$sameasbilling?> />
                        Same As Billing</label></td>
             </tr>
            <tr>
                  <td style="width: 25%; text-align: left; padding: 5px;">Street Address: <span class="error">*</span></td>
                  <td style="width: 75%; text-align: left; padding: 5px;"><input type="text" name="streetAddressShpng" id="streetAddressShpng" size=40 maxlength=40 value="<?=$streetAddressShpng?>" style=" border: none; background-color:#ffffff; text-align:left; padding: 3px"/></td>
           </tr>
 
           <tr>
                  <td style="width: 25%; text-align: left; padding: 5px;">City: <span class="error">*</span></td>
                  <td style="width: 75%; text-align: left; padding: 5px;"><input type="text" name="cityShpng" id="cityShpng" size=40 maxlength=40 value="<?=$cityShpng?>" style=" border: none; background-color:#ffffff; text-align:left; padding: 3px"/></td>
           </tr>
            <tr>
                  <td style="width: 25%; text-align: left; padding: 5px;">State: <span class="error">*</span></td>
                  <td style="width: 75%; text-align: left; padding: 5px;"><input type="text" name="stateShpng" id="stateShpng" size=4 maxlength=2 value="<?=$stateShpng?>" style=" border: none; background-color:#ffffff; text-align:left; padding: 3px"/></td>
           </tr>
           <tr>
                  <td style="width: 25%; text-align: left; padding: 5px;">Zip Code: <span class="error">*</span></td>
                  <td style="width: 75%; text-align: left; padding: 5px;"><input type="text" name="zipShpng" id="zipShpng" size=10 maxlength=10 value="<?=$zipShpng?>" style=" border: none; background-color:#ffffff; text-align:left; padding: 3px"/></td>
           </tr>
           <tr>
                  <td style="width: 25%; text-align: left; padding: 5px;">Email: </td>
                  <td style="width: 75%; text-align: left; padding: 5px;"><input type="text" name="emailShpng" id="emailShpng" size=40 maxlength=100 value="<?=$emailShpng?>" style=" border: none; background-color:#ffffff; text-align:left; padding: 3px"/></td>
           </tr>
           <tr>
                  <td style="width: 25%; text-align: left; padding: 5px;">Phone: <span class="error">*</span></td>
                  <td style="width: 75%; text-align: left; padding: 5px;"><input type="text" name="phoneShpng" id="phoneShpng" size=13 maxlength=15 value="<?=$phoneShpng?>" style=" border: none; background-color:#ffffff; text-align:left; padding: 3px"/></td>
           </tr>
           <tr>
                  <td style="width: 25%; text-align: left; padding: 5px;">Cell: </td>
                  <td style="width: 75%; text-align: left; padding: 5px;"><input type="text" name="cellShpng" id="cellShpng" size=13 maxlength=15 value="<?=$cellShpng?>" style=" border: none; background-color:#ffffff; text-align:left; padding: 3px"/></td>
           </tr>
            <tr>
                 <td style="width: 25%; text-align: left; padding: 5px;">&nbsp;</td>
                 <td style="width: 75%; text-align: center; padding: 5px;"><input type="submit" name="Submit" id="Submit"  value="Continue">&nbsp;<input type="button" name="Cancel" id="Cancel" value="Cancel" onclick="history.back()"></td>
           </tr>
        </table>
    </fieldset>
 </form>
