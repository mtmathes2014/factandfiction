<?php
    /**
     * shoppintCart.php
     *
     * Frank E. Mathes
     * fmathes1@hotmail.com
     *
     * This program creates the shopping cart page for a sample book store
     * website.  It adds any new item received from the price calculator
     * result if present.
     *
     * This project is being created as part of a final project for CS50x and
     * launch code final project spring of 2014.
     */
 

require_once("../includes/config.php");
require_once("../includes/shoppingCartDBFnctns.php");

function buildShoppingCart($_o_id, $stat)
{
#	# set up query for items ordered by this customer

    $orderItems = [];
    
    $orderItems =  buildStatmentDetail($_o_id);
    
    render("shoppingCart_form.php", ["stat" => $stat, "title" => "Shopping Cart", "orderItems" => $orderItems]); 
}
	
	
	$nbrGetItems = count($_GET);
	
	$nbrPostItems = count($_POST);
	
	if ($stat == 'logout')
	{
		$user_info = $_SESSION['user_info'];
		
		$username = $user_info['username'];
		$username = trim($username);
		$password = $user_info['password'];
		$password = trim($password);
		
		$c_id = getCustomerID($username, $password);
		
		$o_id = getOrderId($c_id);
		#echo("<p class='error'>Order id  = $o_id </p>");
		if ($o_id > 0)
		{
			$oi_stat = true;
			if ($nbrPostItems > 0)
			{
				$title_id = $_POST['title_id'];
				$quantity = $_POST['quantity'];
				$price = $_POST['price'];
				$price = str_replace("$", "0", $price);
#				echo("<p class='error'>Price = $price </p>");
				$prev_quantity = getOrderItemQuantity($o_id, $title_id);
#				echo("<p class='error'>Previous quantity = $prev_quantity </p>");
				
				if ($prev_quantity == 0)
				{
					$oi_stat = addOrderItem($o_id, $title_id, $quantity);
					$oi_stat = adjust_title_quantity($title_id, $quantity);
				}
				else
				{
					$oi_id = getOrderItemNumber($o_id, $title_id);
#					echo("<p class='error'>Order Item Number = $oi_id </p>");
					$oi_stat = updateOrderItemQantity($oi_id, $quantity);
					$delta = ($quantity - $prev_quantity);
					$amount = $delta * $price;
#					echo("<p class='error'>Order total adjustment = $amount </p>");
#					echo("<p class='error'>Order number, o_id  = $o_id </p>");
#					echo("<p class='error'>amount  = $amount </p>");
					$oi_stat = updateOrder($o_id, $amount, 0, 0, 0);
					$oi_stat = adjust_title_quantity($title_id,$delta);
				}
			}
			if (!($oi_stat === false))
			{
				buildShoppingCart($o_id, $stat);
			}
			else
			{
				apologize("Unable to add order item to order");
			}
		}
		else
		{
			apologize("Unable to add order");	
		}
	}
	else
	{   
	    $msg = "We sincerely apologize for allowing you to get to the shopping cart ";
	    $msg .= "without having logged on.<br />Please click the LOGIN link and log in so that we meet your literary needs."/
		apologize($msg);
	}

?>

