<?php
/**
 * login.php
 *
 * Frank E. Mathes
 * fmathes1@hotmail.com
 *
 * This program creates the login page for a sample book store
 * website.  When arriving here, the visitor has the option of 
 * signing into an existing account, or, opening a new account.
 *
 * This project is being created as part of a final project for CS50x and
 * launch code final project spring of 2014.
 */
 
require_once("../includes/config.php");

 render("login_form.php", ["stat" => $stat, "title" => "Login"]);

?>

