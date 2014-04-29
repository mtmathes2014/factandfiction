<?php

    /**
     * priceCalculator.php
     *
     * Frank E. Mathes
     * fmathes1@hotmail.com
     *
     * This program displays the price calculator for a sample book store
     * website.  The page displays initializes the expected quantity of
     * books to purchase to 1 as well as displays the quantity on hand.
     *
     * The visitor need not login to use this page. But, if the visitor is 
     * logged in, any associated active order is brought up to display the
     * current quantity ordered.
     *
     * This project is being created as part of a final project for CS50x and
     * launch code final project spring of 2014.
     */
     
require_once("../includes/config.php");

require_once("../includes/shoppingCartDBFnctns.php");

# mainline starts here
	$in_title_id = $_GET['title_id'];
	$in_title = '';
	$in_pub_id = '';
	$in_au_id = '';
	$in_price = 0.00;
	$in_notes = '';
	$in_pubdate = time();
	$in_quantity = 1;
	$in_quantityonhand  = 0;
	$in_unit = '';
	$in_image = '';
	
	$title_info = array('title_id'=>$in_title_id, 'title'=>$in_title, 'pub_id'=>$in_pub_id, 'au_id'=>$in_au_id, 'price'=>$in_price, 'notes'=>$in_notes, 'pubdate'=>$in_pubdate, 'quantityonhand'=>$in_quantityonhand, 'unit'=>$in_unit, 'image'=>$in_image);
	
	$result = get_title_info($title_info);
	
	if ($result == 'titlefnd')
	{
		$in_title = $title_info['title'];
		$in_pub_id = $title_info['pub_id'];
		$in_au_id = $title_info['au_id'];
		$in_price = $title_info['price'];
		$in_notes = $title_info['notes'];
		$in_pubdate = $title_info['pubdate'];
		$in_quantityonhand  = $title_info['quantityonhand'];
		$in_quantity = 1;
		$in_unit = $title_info['unit'];
		$in_image = $title_info['image'];
	}
	
	if ($stat == 'logout')
  	{	
		$stat = 'logout';
		$user_info = $_SESSION['user_info'];
		
		$username = $user_info['username'];
		$username = trim($username);
		$password = $user_info['password'];
		$password = trim($password);
		
		$c_id = getCustomerID($username, $password);
		
		$o_id = getOrderId($c_id);
		
		if ($o_id > 0)
		{
			$in_quantity = getOrderItemQuantity($o_id, $in_title_id);
			if ($in_quantity < 1)
			{
				$in_quantity = 1;
			}
		}
	}
	
    render("priceCalculator_form.php", ["stat" => $stat, "title" => "Price Calculator", "in_title_id" => $in_title_id, 
                                        "in_title" => $in_title, "in_notes" => $in_notes,  "in_price" => $in_price, 
                                        "in_quantityonhand" => $in_quantityonhand, "in_quantity" => $in_quantity]);
?>


