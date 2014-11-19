<?php
    /**
     * deleteOrderItem.php
     *
     * Frank E. Mathes
     * fmathes1@hotmail.com
     *
     * This program allows the visiting member to remove an item from 
     * the member's shopping cart. The member initially arrives here
     * from the shopping cart via a Get activity.
     *
     * This project is being created as part of a final project for CS50x and
     * launch code final project spring of 2014.
     */
require_once("../includes/config.php");
require_once("../includes/shoppingCartDBFnctns.php");

	# mainline begins here
	$nbrGetItems = count($_GET);
	
	$nbrPostItems = count($_POST);
	
	$oi_id = 0;
	$in_title_id = ' ';
	
	// initialize keys depending upon how member arrived here
	if ($nbrGetItems > 1)
	{
		$oi_id = $_GET['item_id'];
		$in_title_id = $_GET['title_id'];
	}
	else if ($nbrPostItems > 0)
	{
		$oi_id = $_POST['oi_id'];
		$in_title_id = $_POST['title_id'];
	}
		
	// initialize the item's book title information array
	$title_info = array('title_id'=>$in_title_id, 'title'=>' ', 
	                    'pub_id'=>' ', 'au_id'=>' ', 'price'=>0.00, 'notes'=>' ' ,
	                    'pubdate'=>time(), 'quantityonhand'=>0, 'unit'=>' ' , 'image'=>' ');
	
	// get the item's book title information
	$result = get_title_info($title_info);

	$in_title = $title_info['title'];
	$in_pub_id = $title_info['pub_id'];
	$in_au_id = $title_info['au_id'];
	$in_price = $title_info['price'];
	$in_price = round($in_price, 2);
	$in_price =  money_format('%i', $in_price);
	$in_notes = $title_info['notes'];
	$in_pubdate = $title_info['pubdate'];
	$in_quantityonhand  = $title_info['quantityonhand'];
	$in_quantity = 0;
	$in_unit = $title_info['unit'];
	$in_image = $title_info['image'];
	
	// initialize the disable submit button string
	$disableSubBtn = ' ';

 	// delete order item if member logged in
 	if ($stat == 'logout')
  	{	
		$user_info = $_SESSION['user_info'];
		$username = $user_info['username'];
		$username = trim($username);
		$password = $user_info['password'];
		$password = trim($password);
		$c_id = getCustomerID($username, $password);
		$o_id = getOrderId($c_id);
		if (($o_id > 0) && ($result == 'titlefnd'))
		{
			$in_quantity = getOrderItemQuantity($o_id, $in_title_id);
			// only delete after user has had a chance to view the ordered item
			 if ($nbrPostItems > 0)
			 {
				 $stat = deleteOrderItemQantity($oi_id);
				 if (!($stat === false))
				 {
					 $in_quantity = (-1) * $in_quantity; 
					 $amount = $in_quantity * $in_price;
					 $stat = updateOrder($o_id, $amount, 0, 0, 0);
					 $stat = adjust_title_quantity($in_title_id, $in_quantity);
					 $oi_id = 0;
					 $in_title_id = ' ';
					 $stat = "logout";
					 $disableSubBtn = 'disabled="disabled"';
				 }
			 }
		}
	}
	else
	{
		$disableSubBtn = 'disabled="disabled"';
	}

    // display delete order item page with relevant message using $nbrGetItems 
    render("deleteOrderItem_form.php", ["stat" => $stat, "title" => "Delete Item", "nbrGetItems" => $nbrGetItems, "nbrPostItems" => $nbrPostItems,
                                        "oi_id" => $oi_id, "in_title_id" => $in_title_id, "in_title" => $in_title, 
	                                    "in_price" => $in_price, "in_notes" => $in_notes, "in_quantity" => $in_quantity,
	                                    "disableSubBtn" => $disableSubBtn]); 
	
?>

