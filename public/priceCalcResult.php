<?php
    /**
     * priceCalcResult.php
     *
     * Frank E. Mathes
     * fmathes1@hotmail.com
     *
     * This program creates the price calculator result for a sample book store
     * website.  When arriving here, the visitor has the attempted
     * to check the price of a book. The program validates
     * the attempt. If valid, it give the member an option of changing the 
     * quantity, returning to the selection of books available, or if logged in
     * adding the book to the shopping cart. If not valid, it gives
     * the visitor an appropriate error message with the option to 
     * return to the book selection screen, or, to revise the entry.
     *
     * This project is being created as part of a final project for CS50x and
     * launch code final project spring of 2014.
     */
     
require_once("../includes/config.php");
require_once("../includes/shoppingCartDBFnctns.php");

function quantityCheck()
{
	$in_quantityonhand = $_POST['quantityonhand'];
	$in_quantity = $_POST['quantity'];
	$in_title_id = $_POST['title_id'];
	
	$in_quantityonhand = trim($in_quantityonhand);
	$in_quantity = trim($in_quantity);
	
	if (!(is_numeric($in_quantityonhand)))
	{
		$in_quantityonhand = 0;
	}
	
	if (!(is_numeric($in_quantity)))
	{
		apologize("You must enter a numeric purchase quantity.");
	}
	
		
	if ($in_quantity == 0)
	{
		apologize("You need to enter a quantity larger than zero");
	}
		
	if ($in_quantity > $in_quantityonhand)
	{
		apologize("Purchase Quantity exceeds Stock Quantity");
	}
}

#  mainline starts here	
	quantityCheck();
	
	$in_title_id = $_POST['title_id'];
	$in_title = $_POST['title'];
	$in_price = $_POST['price'];
	$in_price = str_replace("$", "0", $in_price);
	$in_notes = $_POST['notes'];
	$in_quantityonhand = $_POST['quantityonhand'];
	$in_quantity = $_POST['quantity'];
	
	$in_price = (double)$in_price;
	$in_amount = $in_price * (double)$in_quantity; 
	$in_price = round($in_price, 2);
	$in_price =  money_format('%i', $in_price);
	$in_amount = round($in_amount, 2);
	$in_amount =  money_format('%i', $in_amount);
	
	$disableSubBtn = ' ';
	$subBtnTitle = 'Add To Cart';
	
	if ($stat == 'logout')
  	{	
		$user_info = $_SESSION['user_info'];
		$username = $user_info['username'];
		$username = trim($username);
		$password = $user_info['password'];
		$password = trim($password);
		$c_id = getCustomerID($username, $password);
		$o_id = getOrderId($c_id);
		if ($o_id > 0)
		{
			$oi_id = getOrderItemNumber($o_id, $in_title_id);
			if ($oi_id > 0)
			{
				$subBtnTitle = 'Update Cart';
			}
		}
	}
	else
	{
		$disableSubBtn = 'disabled="disabled"';
	}

    render("priceCalcResult_form.php", ["stat" => $stat, "title" => "Price Calculation Result", "in_title_id" => $in_title_id, 
                                        "in_title" =>	$in_title, "in_price" => $in_price, "in_notes" => $in_notes,
	                                     "in_quantityonhand" => $in_quantityonhand, 	"in_quantity" => $in_quantity, 
	                                     "in_amount" => $in_amount, "disableSubBtn" => $disableSubBtn, 
	                                     "subBtnTitle" => $subBtnTitle]);

?>
