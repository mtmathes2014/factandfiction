<?php
    /**
     * checkOut.php
     *
     * Frank E. Mathes
     * fmathes1@hotmail.com
     *
     * This program allows the visiting member to display relevant 
     * address information prior to buying the order. The member 
     * initially arrives here from the shopping cart via a Post activity.
     *
     * This project is being created as part of a final project for CS50x and
     * launch code final project spring of 2014.
     */
     
    require_once("../includes/config.php");
    require_once("../includes/shoppingCartDBFnctns.php");
	
 	if ($stat == "logout")
  	{	
		$user_info = $_SESSION['user_info'];
		
		$username = $user_info['username'];
		$username = trim($username);
		$password = $user_info['password'];
		$password = trim($password);
		$in_fullName = $user_info['firstname'] . ' ' . $user_info['lastname'];
		
		$c_id = getCustomerID($username, $password);
		
		// initialize the customer address information array
		$custAddress = array('ca_id'=>0,'addresstype'=>'', 'streetaddress'=>'', 
		                    'city'=>'', 'state_id'=>'', 'zip'=>'', 'email'=>'',
		                     'phone'=>'', 'cell'=>'');
							 
		// attempt to obtain the billing address information
		$retval = getBillingAddress($c_id, $custAddress);
		
		// set up the shipping address information
		$streetAddressBlng = $custAddress['streetaddress'];
		$cityBlng = $custAddress['city'];
		$stateBlng = $custAddress['state_id'];
		$zipBlng = $custAddress['zip'];
		$emailBlng = $custAddress['email'];
		$phoneBlng = $custAddress['phone'];
		$cellBlng = $custAddress['cell'];
		
		// set up the shipping address information
		$sameasbilling = ' ';
		$disableSubBtn = " ";
		if ($retval == 'addrsfnd')
		{
			$mailAddressType = $custAddress['addresstype'];
			if ($mailAddressType == 'b')
			{
				$sameasbilling = 'checked="checked"';
			}
			else
			{
				$retval = getShippingAddress($c_id, $custAddress);
			}
		}
		
		// set up the shipping address information
		$streetAddressShpng = $custAddress['streetaddress'];
		$cityShpng = $custAddress['city'];
		$stateShpng = $custAddress['state_id'];
		$zipShpng = $custAddress['zip'];
		$emailShpng = $custAddress['email'];
		$phoneShpng = $custAddress['phone'];
		$cellShpng = $custAddress['cell'];
		
		
        render("account_form.php", ["stat" => $stat, "title" => "Check Out", "in_fullName" => $in_fullName,
                                "streetAddressBlng" => $streetAddressBlng, "cityBlng" => $cityBlng, "stateBlng" => $stateBlng, 
                                "zipBlng" => $zipBlng, "emailBlng" => $emailBlng, "phoneBlng" => $phoneBlng, "cellBlng" => $cellBlng,
                                "streetAddressShpng" => $streetAddressShpng, "cityShpng" => $cityShpng, "stateShpng" => $stateShpng, 
                                "zipShpng" => $zipShpng, "emailShpng" => $emailShpng, "phoneShpng" => $phoneShpng, "cellShpng" => $cellShpng,
                                "sameasbilling" => $sameasbilling, "disableSubBtn" => $disableSubBtn]); 
	}
	else
	{
		$stat = 'login';
		apologize("Sorry you arrived here without logging in! Please <a href='logon.php'>login</a>, 
		            or <a href='register.php'>register</a> then login.");
	}
?>

