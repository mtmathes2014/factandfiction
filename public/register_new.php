<?php 
    /**
     * register_new.php
     *
     * Frank E. Mathes
     * fmathes1@hotmail.com
     *
     * This program creates the member registered page for a sample book store
     * website.  When arriving here, the visitor's membership information is 
     * reviewed for completeness and accuracy. If it is complete and accurate,
     * the member is registered with this information if it is not duplicate.
     * If duplicate, the visitor is notified; otherwise, the registered page 
     * is displayed.
     *
     * This project is being created as part of a final project for CS50x and
     * launch code final project spring of 2014.
     */
 
    require_once("../includes/config.php");

	require_once("../includes/user_authentication_functions.php");

function registerCustomer(&$reg_user)
{
	if (($reg_user['username'] == NULL) || ($reg_user['password'] == NULL) 
			|| ($reg_user['firstname'] == NULL) || ($reg_user['lastname'] == NULL))
	{
			apologize("You failed to enter a user name or password.");
	}
	
	$in_username = $reg_user['username'];
	$in_password = $reg_user['password'];
	$in_password2 = $reg_user['password2'];
	$in_firstname = $reg_user['firstname'];
	$in_lastname = $reg_user['lastname'];
	
	$in_username = trim($in_username);
	$in_password = trim($in_password);
	$in_password2 = trim($in_password2);
	$in_firstname = trim($in_firstname);
	$in_lastname = trim($in_lastname);
	
	if ($in_password != $in_password2)
	{
      apologize("Passwords do not match, try again.");
   	}
	
	$user_info = array('username'=>$in_username, 'password'=>$in_password, 'firstname'=>$in_firstname, 'lastname'=>$in_lastname);
	
	$get_result = login($user_info);
	
   if ($get_result == 'notconnected')
   {
      apologize("System not available, please try again later. ");
   }
   else if ($get_result == 'userfnd')
   {
		$msg = "User name password combination already in use. Return to ";
		$msg .= "<a href='login.php'>Login screen</a>. Or, re-enter";
		apologize($msg);
   }
 
   	$add_result = register($user_info);
	
	if ($add_result == 'notconnected')
	{
		apologize("System not available, please try again later.");
	}

	else if ($add_result == 'addfailed')
	{
		apologize("Unable to register at this time, try again later.");	
	}
}
?>
<?php

	$in_username = $_POST['username'];
	$in_password = $_POST['passwd'];
	$in_password2 = $_POST['passwd2'];
	$in_firstname = $_POST['fname'];
	$in_lastname = $_POST['lname'];
	
	$in_username = trim($in_username);
	$in_password = trim($in_password);
	$in_password2 = trim($in_password2);
	$in_firstname = trim($in_firstname);
	$in_lastname = trim($in_lastname);
	

	$user_info = array('username'=>$in_username, 'password'=>$in_password, 'password2'=>$in_password2, 
				   'firstname'=>$in_firstname, 'lastname'=> $in_lastname);

	registerCustomer($user_info);

	render("register_new_form.php", ["stat" => $stat, "title" => "Registration Successful", 
	                                "in_firstname" => $in_firstname, "in_lastname" => $in_lastname]);
	
?>
