<?php 
    /**
     * register_new.php
     *
     * Frank E. Mathes
     * fmathes1@hotmail.com
     *
     * This program creates the password changed page for a sample book store
     * website.  When arriving here, the old password is verified. If it is it is correct,
     * the new pasword is matched to its confirmed password. If the new password matches
     * the registered page the member's password is updated and the new password page  
     * is displayed.
     *
     * This project is being created as part of a final project for CS50x and
     * launch code final project spring of 2014.
     */
 
    require_once("../includes/config.php");

	require_once("../includes/user_authentication_functions.php");
	
	require_once("../includes/shoppingCartDBFnctns.php");

function updatePassword(&$updt_pwd)
{
#    print_r($_POST);
    print_r($updt_pwd);
    // validate all password inputfields have data
	if ((($updt_pwd['passwordOld'] == NULL)))
	{
			apologize("You failed to enter an old password.");
	}
	
	if ((($updt_pwd['password'] == NULL)))
	{
			apologize("You failed to enter a new password.");
	}
	
	if ((($updt_pwd['password2'] == NULL)))
	{
			apologize("You failed to enter an confirming password.");
	}
	
	// prepare data for validity checks 
	$in_username = $updt_pwd['username'];
	$in_password_old = $updt_pwd['passwordOld'];
	$in_password = $updt_pwd['password'];
	$in_password2 = $updt_pwd['password2'];
	
	
	$in_username = trim($in_username);
	$in_password_old = trim($in_password_old);
	
	$in_password = trim($in_password);
	$in_password2 = trim($in_password2);
	
	// check password lengths valid
	if ((strlen($in_password) < 5) || (strlen($in_password) > 16))
	{
	    apologize("Password length is outside of range 5 to 16, try again.");
	}
		
	// confirm new password matches confirmation password
	if ($in_password != $in_password2)
	{
      apologize("Passwords do not match, try again.");
   	}
	
	// verify old password matches customer currently logged in
	$c_id = getCustomerID($in_username, $in_password_old);
	
	if ($c_id <= 0)	
	{
		$msg = "Old password not valid, re-enter. ";
		apologize($msg);
    }
     
    // input has been successfully edited, update password for this customer     
   	$chg_result =  changePassword($c_id, $in_password);
	
	if ($chg_result == 'updtntcmplt')
	{
		apologize("Unable to update password at this time, try again later.");	
	}
}
?>
<?php
// mainline starts here
    if ($stat == "logout")
  	{	
		$user_info = $_SESSION['user_info'];
		
		$in_username = $user_info['username'];
#		$in_password = $user_info['password'];
		$in_firstname = $user_info['firstname'];
		$in_lastname = $user_info['lastname'];
		
	    $in_password_old = $_POST['passwdOld'];
	    $in_password = $_POST['passwd'];
	    $in_password2 = $_POST['passwd2'];

	    $in_username = trim($in_username);
	    $in_password_old = trim($in_password_old);
	    $in_password = trim($in_password);
	    $in_password2 = trim($in_password2);
	
	    $user_info = array('username'=>$in_username, 'passwordOld'=>$in_password_old, 
	                       'password'=>$in_password, 'password2'=>$in_password2);
	                       
	    updatePassword($user_info);

	    render("password_new_form.php", ["stat" => $stat, "title" => "Password Update Successful", 
	                                    "in_firstname" => $in_firstname, "in_lastname" => $in_lastname]);
    }
	else
	{
		$stat = 'login';
		apologize("Sorry you arrived here without logging in! Please <a href='logon.php'>login</a>, 
		            or <a href='register.php'>register</a> then login.");
	}	                                
	
?>
