<?php
/**
 * logout.php
 *
 * Frank E. Mathes
 * fmathes1@hotmail.com
 *
 * This program creates the logout page for a sample book store
 * website.  When arriving here, the visitor logs out and returns
 * to the initial landing page of the website
 *
 * This project is being created as part of a final project for CS50x and
 * launch code final project spring of 2014.
 */

require_once("../includes/config.php");

    // end session
    logout();

    // reset visitor status to browse
    $stat = 'login';

    render("index_form.php", ["stat" => $stat, "title" => "Welcome"]);	  

?>
