<?php
     /**
     * login_form.php
     *
     * Frank E. Mathes
     * fmathes1@hotmail.com
     *
     * This template displays fact and fiction book store web login page form.
     *
     * This project is being created as part of a final project for CS50x and
     * launch code final project spring of 2014.
     */

?>
<p style="text-align: center;">If you have not registered, please do so by <br />going to the <a href="registration.php">Registration screen</a>.</p>			       
	
<form method=post action="member.php">
    <table  style="width: 500px; border: none; margin-left: 150px">
        <tr>
            <td style="border: none; width: 60%; text-align: right; padding: 5px;"><h3>Members log in here:</h3></td>
            <td style="border: none; width: 40%; text-align: left; padding: 5px;">&nbsp;</td>
        </tr>
        <tr>
            <td style="border: none; width: 60%; text-align: right; padding: 5px;"><b>Username: </b></td>
            <td style="border: none; width: 40%; text-align: left; padding: 5px;"><input type="text" name="username" size="16" maxlength="16"></td>
        </tr>
        <tr>
            <td style="border: none; width: 60%; text-align: right; padding: 5px;"><b>Password: </b></td>
            <td style="border: none; width: 40%; text-align: left; padding: 5px;"><input type="password" name="passwd" size="16" maxlength="16"></td>
        </tr>
        <tr>
            <td style="border: none; width: 60%; text-align: left; padding: 5px;">&nbsp;</td>
            <td style="border: none; width: 40%; text-align: left; padding: 5px;"><input type="submit" value="Log in"></td>
        </tr>
    </table>
 </form>
 <div> 
  <p style="margin-left:auto;margin-right:auto;width:31%;"><a href="store.php"><img src="graphics/open_book.jpg" width="250" height="203" alt="Browse"></a></p>
  <p >&nbsp;</p>
  <p>&nbsp;</p>
</div>
