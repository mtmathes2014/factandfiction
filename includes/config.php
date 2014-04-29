<?php
    /**
     * config.php
     *
     * Frank E. Mathes
     * fmathes1@hotmail.com
     *
     * This file initializes each page  for a sample book store
     * website.  Cloned from Problem Set 7 of  CS50x, it give the visitor 
     * the option of signing into an existing account, or, opening a 
     * new account, or, just browsing the bookstore offerings. (The 
     * original forced the visitor to login, or, register.)
     *
     * This project is being created as part of a final project for CS50x and
     * launch code final project spring of 2014.
     */
 
    // display errors, warnings, and notices
    ini_set("display_errors", true);
    error_reporting(E_ALL);

    // requirements
    require("constants.php");
    require("functions.php");

    // enable sessions
    session_start();
    
    // enable the guest to login, or, just browse
    if (isset($_SESSION["user_info"]))
  	{	
		$stat = "logout";
	}
	else
	{
		$stat = "login";
	}

?>
