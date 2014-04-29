<?php 
    /**
     * member.php
     *
     * Frank E. Mathes
     * fmathes1@hotmail.com
     *
     * This program creates the member page for a sample book store
     * website.  When arriving here, the visitor has the attempted
     * to login to an existing member account. The program validates
     * the attempt. If valid, it give the member an option of updating
     * member information, or, going shopping. If not valid, it gives
     * the visitor an appropriate error message with the option to 
     * return to the login screen, or, to register as a new user.
     *
     * This project is being created as part of a final project for CS50x and
     * launch code final project spring of 2014.
     */
 
    require_once("../includes/config.php");
	require_once("../includes/user_authentication_functions.php");
?>
<?php 
function verifyUserLogin(&$user_info)
{
	if (($user_info['username'] == NULL) )
	{

		apologize("You failed to enter a user name or password.");
	}
	
	if (($user_info['password'] == NULL))
	{

		apologize("You failed to enter a user name or password.");
	}

	$in_username = $user_info['username'];
	$in_password = $user_info['password'];
	
	$in_username = trim($in_username);
	$in_password = trim($in_password);
		
	$firstname = ' ';
	$lastname = ' ';
	
	$nuser_info = array('username'=>$in_username, 'password'=>$in_password, 'firstname'=>$firstname, 'lastname'=>$lastname);
	
	$get_result = login($nuser_info);
		
    if ($get_result == 'userntfnd')
    {
        apologize("User name password combination not registered, go to Registration screen. Or, re-enter.");
    }
 	else
	{
		$lastname =  $nuser_info['lastname'];
		$firstname = $nuser_info['firstname'];
		$user_info['lastname'] =  $lastname;
		$user_info['firstname'] = $firstname;
#		encrypt_all_pwds();
	}
}
?>
<?
	
	
	$in_username = $_POST['username'];
	$in_password = $_POST['passwd'];
	
	$in_username = trim($in_username);
	$in_password = trim($in_password);
	
	$firstname  = ' ';
	$lastname   = ' ';
	
	$user_info = array('username'=>$in_username, 'password'=>$in_password, 'firstname'=>$firstname, 'lastname'=>$lastname);
	
 	verifyUserLogin($user_info);
	
	$lastname =  $user_info['lastname'];
	
	$firstname = $user_info['firstname'];
	
	$_SESSION['user_info']=$user_info;
	
	$stat = 'logout';
	
	render("member_form.php", ["stat" => $stat, "title" => "Member", "lastname" => $lastname, "firstname" => $firstname]);

?>
