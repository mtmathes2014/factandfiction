<?php
     /**
     * register_form.php
     *
     * Frank E. Mathes
     * fmathes1@hotmail.com
     *
     * This template displays fact and fiction book store web registration page form.
     *
     * This project is being created as part of a final project for CS50x and
     * launch code final project spring of 2014.
     */

?>
<form method=post action="register_new.php">
 <table style="width: 550px; border: none; margin-left: 100px">
    <tr>
      <td style="border: none;width: 75%; text-align: left; padding: 5px;"><b>First Name</b> (max 15 chars): </td>
      <td style="border: none;width: 25; text-align: left; padding: 5px;"><input type="text" name="fname" size="15" maxlength="15"></td>
      </tr>
   <tr>
      <td style="border: none;width: 75%; text-align: left; padding: 5px;"><b>Last Name</b> (max 20 chars): </td>
      <td style="border: none;width: 25%; text-align: left; padding: 5px;"><input type="text" name="lname" size="20" maxlength="20"></td>
   </tr>
   <tr>
      <td style="border: none;width: 25%; text-align: left; padding: 5px;"><b>Preferred User Name</b> (between 5 and 16 chars): </td>
      <td style="border: none;width: 75%; text-align: left; padding: 5px;"><input type="text" name="username" size="16" maxlength="16"></td>
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

     <td style="border: none; width: 75%; text-align: left; padding: 5px;"><input type="submit" value="Register"></td>
   </tr>
 </table>
 <p></p>

 </form>
