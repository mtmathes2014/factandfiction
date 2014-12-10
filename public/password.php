<?php
    /**
     * password.php
     *
     * Frank E. Mathes
     * fmathes1@hotmail.com
     *
     * This program displays the password change page for a sample book store
     * website. The visitor enters old and new password here
     *
     * This project is being created as part of a final project for CS50x and
     * launch code final project spring of 2014.
     */
 
require_once("../includes/config.php");

 render("password_form.php", ["stat" => $stat, "title" => "Change Password"]);

?>

