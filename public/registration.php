<?php
    /**
     * register.php
     *
     * Frank E. Mathes
     * fmathes1@hotmail.com
     *
     * This program creates the initial registration page for a sample book store
     * website. The visitor enters initial membership registration information here.
     *
     * This project is being created as part of a final project for CS50x and
     * launch code final project spring of 2014.
     */
 
require_once("../includes/config.php");

 render("register_form.php", ["stat" => $stat, "title" => "Register"]);

?>

