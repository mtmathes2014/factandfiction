<?php
    /**
     * user_authentication_functions.php
     *
     * Frank E. Mathes
     * fmathes1@hotmail.com
     *
     * This file initializes contains "crud" database functions used to
     * support the login/register related functions of the sample bookstore
     * website.
     *
     * This project is being created as part of a final project for CS50x and
     * launch code final project spring of 2014.
     */

function register(&$user_info)
{
	/* accepts an array containing four elements: username, password, firstname, 
	   lastname.  adds the contents of the array to the customer table */
	if (($user_info['username'] == NULL) || ($user_info['password'] == NULL) 
		|| ($user_info['firstname'] == NULL) || ($user_info['lastname'] == NULL))
	{
			return "noentry";
	}
	
	$in_username = $user_info['username'];
	$in_password = $user_info['password'];
	$in_firstname = $user_info['firstname'];
	$in_lastname = $user_info['lastname'];
	
	$in_username = trim($in_username);
	$in_password = trim($in_password);
	$in_firstname = trim($in_firstname);
	$in_lastname = trim($in_lastname);
	
       
   # set up insert of user info
   
	$myNewUser = "Insert into customer (username, password, firstname, lastname) ";
	$myNewUser .=  " values (?, ?, ?, ?);";
		
	$stat = query($myNewUser, $in_username, $in_password, $in_firstname, $in_lastname);
	if (!($stat === false))
	{
		return "addokay";
	}
	else
	{
		return "addfailed";
	}
}
function login(&$user_info) 
{
	/* accepts an array containing four elements: username, password, firstname, 
	   lastname.  user is in the customer table and has the corresponding password*/
	if (($user_info['username'] == NULL) || ($user_info['password'] == NULL))
	{
		return "noentry";
	}
	
	$in_username = $user_info['username'];
	$in_password = $user_info['password'];
	
	$in_username = trim($in_username);
	$in_password = trim($in_password);
	
	# set up query for username password combination
	$myQuery = "SELECT username, password, firstname, lastname ";
	$myQuery = $myQuery . "FROM customer ";
	$myQuery = $myQuery . "where username= ? ";
	
    $namepassexists = false; 
     
   # if query is successful, display the data in a table 
   $result = query($myQuery, $in_username);
     
   # count the number of rows returned...should more than zero messages in there...
   if (!($result === false))
    {
        $rows = count($result);
 
        if ($rows == 1)
        {
           $row = $result[0];
           // compare hash of user's input against hash that's in database
           # if (crypt($_POST["password"], $row["hash"]) == $row["hash"])
		   if (($in_username == $row["username"]) && (crypt($in_password, $row["password"]) == $row["password"]))
			{
				 $namepassexists = true;
				 $user_info['lastname'] =  $row["lastname"];
				 $user_info['firstname'] = $row["firstname"];
			}
  			
 		}
 		
		if ($namepassexists == true)
		{
			return 'userfnd';
		}
		else
		{
	   		return 'userntfnd';
   		}	
   }
   else
   {
		return 'userntfnd';
   }
}

function encrypt_all_pwds() 
{
	
	# set up query for username password combination
	$myQuery = "SELECT username, password, firstname, lastname ";
	$myQuery = $myQuery . "FROM customer ;";
   
    # if query is successful, display the data in a table 
    $result = query($myQuery);
     
    # count the number of rows returned...should more than zero messages in there...
    if (!($result === false))
    {
        $rows = count($result);
 
        if ($rows > 0)
        {
           foreach ($result as $row) 
           {
               // compare hash of user's input against hash that's in database
               # if (crypt($_POST["password"], $row["hash"]) == $row["hash"])
               
                $updtsql = "UPDATE factandfictionB.customer ";
                $updtsql .= " SET password = ? ";
                $updtsql .= " WHERE username = ? ";
                $updtsql .= " AND lastname = ? ";
                $updtsql .= " AND firstname = ? ;";
                $parm1 = crypt($row["password"]);
                echo ("password " . $row["password"] . " encrypted to " . $parm1 . " \n");
                $parm2 = $row["username"];
                $parm3 = $row["lastname"];
                $parm4 = $row["firstname"];
               
      			$updstat = query($myQuery, $parm1, $parm2, $parm3, $parm4);
      			if ($updstat === false)
      			{
      			    echo ("password not encrypted for " . $parm2 . " \n");
      			}
  			}
 		}
   }
}
?>
