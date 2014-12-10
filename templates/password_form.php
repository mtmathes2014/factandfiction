<?php
     /**
     * password_form.php
     *
     * Frank E. Mathes
     * fmathes1@hotmail.com
     *
     * This template displays fact and fiction book store web password change page form.
     *
     * This project is being created as part of a final project for CS50x and
     * launch code final project spring of 2014.
     */

?>
<form method=post action="password_new.php">
 <table style="width: 550px; border: none; margin-left: 100px">
    <tr>
     <td style="border: none;width: 25%; text-align: left; padding: 5px;"><b>Old Password</b> (between 5 and 16 chars): </td>
     <td style="border: none;width: 75%; text-align: left; padding: 5px;"><input type="password" name="passwdOld" size="16" maxlength="16"></td>
   </tr>
   <tr>
     <td style="border: none;width: 25%; text-align: left; padding: 5px;"><b>Password</b> (between 5 and 16 chars): </td>
     <td style="border: none;width: 75%; text-align: left; padding: 5px;"><input type="password" name="passwd" size="16" maxlength="16"></td>
   </tr>
   <tr>
     <td style="border: none;width: 25%; text-align: left; padding: 5px;"><b>Confirm password: </b></td>
     <td style="border: none;width: 75%; text-align: left; padding: 5px;"><input type="password" name="passwd2" size="16" maxlength="16"></td>
   </tr>
	<tr>
     <td style="border: none;width: 25%; text-align: left; padding: 5px;">&nbsp;</td>
     <td style="border: none; width: 75%; text-align: left; padding: 5px;"><input type="submit" value="Change Password"></td>
   </tr>
 </table>
 <p></p>

 </form>
