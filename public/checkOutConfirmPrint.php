<?php
     /**
     * checkOutConfirmPrint.php
     *
     * Frank E. Mathes
     * fmathes1@hotmail.com
     *
     * This program allows the visiting member to print the confirmed
     * order. The customer has arrived here by pressing the
     * print confirm link on the checkOutConfirm screen.
     *
     * This project is being created as part of a final project for CS50x and
     * launch code final project spring of 2014.
     */
     
    require_once("../includes/config.php");
    require_once("../includes/shoppingCartDBFnctns.php");    

# mainline starts here
	
	// initialize the order address information array
	$ordrAddress = array('oa_id'=>0,'addresstype'=>'', 'fullName'=>'', 
	                     'streetAddress'=>'', 'city'=>'', 'state_id'=>'', 'zip'=>'', 
	                     'email'=>'', 'phone'=>'', 'cell'=>'');
	                     
	// initialize the order billing address fields
	$fullNameBlng = $ordrAddress['fullName'];
    $streetAddressBlng = $ordrAddress['streetAddress'];
    $cityBlng = $ordrAddress['city'];
    $stateBlng = $ordrAddress['state_id'];
    $zipBlng = $ordrAddress['zip'];
    $emailBlng = $ordrAddress['email'];
    $phoneBlng = $ordrAddress['phone'];
    $cellBlng = $ordrAddress['cell'];
	
	// initialize the order shipping address fields
	$fullNameShpng = $ordrAddress['fullName'];
    $streetAddressShpng = $ordrAddress['streetAddress'];
    $cityShpng = $ordrAddress['city'];
    $stateShpng = $ordrAddress['state_id'];
    $zipShpng = $ordrAddress['zip'];
    $emailShpng = $ordrAddress['email'];
    $phoneShpng = $ordrAddress['phone'];
    $cellShpng = $ordrAddress['cell'];
		
	$o_id = $_GET['o_id'];	
		
 	if ($stat == 'logout')
  	{	
		#echo("begin address processing\n");
		$user_info = $_SESSION['user_info'];
		
		$username = $user_info['username'];
		$username = trim($username);
		$password = $user_info['password'];
		$password = trim($password);
		$in_fullName = $user_info['firstname'] . ' ' . $user_info['lastname'];
		$shpngFullName = "Same As Billing";
		
#		$c_id = getCustomerID($username, $password);
		
#		// get the order address information array
#		$o_id = getOrderId($c_id);
#		echo("<p class='error'>Order id  = $o_id </p>");
		if ($o_id > 0)
		{
			// attempt to obtain the billing address information
		    $retval = getOrderBillingAddress($o_id, $ordrAddress);
		    if ($retval == 'addrsfnd')
		    {   
		        // set up the shipping address information
		        $fullNameBlng = $ordrAddress['fullName'];
		        $streetAddressBlng = $ordrAddress['streetAddress'];
		        $cityBlng = $ordrAddress['city'];
		        $stateBlng = $ordrAddress['state_id'];
		        $zipBlng = $ordrAddress['zip'];
		        $emailBlng = $ordrAddress['email'];
		        $phoneBlng = $ordrAddress['phone'];
		        $cellBlng = $ordrAddress['cell'];
		        $mailAddressType = $ordrAddress['addresstype'];
		        if ($mailAddressType == 'b')
		        {
			        $sameasbilling = 'checked="checked"';
		        }
		        else
		        {
			        $retval = getOrderShippingAddress($o_id, $ordrAddress);
			        if ($retval == 'addrsfnd')
		            {   
			            $fullNameShpng = $ordrAddress['fullName'];
	                    $shpngFullName = ' ';
	                    $streetAddressShpng = $ordrAddress['streetAddress'];
	                    $cityShpng = $ordrAddress['city'];
	                    $stateShpng = $ordrAddress['state_id'];
	                    $zipShpng = $ordrAddress['zip'];
	                    $emailShpng = $ordrAddress['email'];
	                    $phoneShpng = $ordrAddress['phone'];
	                    $cellShpng = $ordrAddress['cell'];
	                }
	                else
		            {
		                apologize("Unable to get order shipping address info.");
			        }
		        }
		    }
		    else
		    {
		        apologize("Unable to get order billing address info.");
			}
	    }
	    else
	    {
	        apologize("Unable to print order confirmation, cannot find order.");
	    }
									 
    }
	else
	{
		$stat = 'login';
	}

    if ($stat == 'login')
    {
	    $msg = "We sincerely apologize for allowing you to get to the check out ";
	    $msg .= "without having logged on.<br />Please click the below link and log in so that we meet your literary needs.";
	    apologize($msg);
    }
    else
    {
        
#        $_o_id = getOrderId($c_id);
        $nbrGetItems = count($_GET);
	
	    $o_id = 0;
	    if ($nbrGetItems > 0)
	    {
		    $o_id = $_GET['o_id'];
	    } 
       
        if ($o_id > 0)
        { 
            $orderItems = [];
            
            $orderItems = buildStatmentDetail($o_id);
                        
            // output confirmation screen  "sameasbilling" => $sameasbilling, 
            renderPrint("checkOutConfirmPrint_form.php", ["stat" => $stat, "title" => "Order Print", "orderItems" => $orderItems, 
                                               "fullNameBlng" => $fullNameBlng,  "streetAddressBlng" =>   $streetAddressBlng,
				                               "cityBlng" => $cityBlng, "stateBlng" => $stateBlng, "zipBlng" => $zipBlng, 
				                               "emailBlng" => $emailBlng, "phoneBlng" => $phoneBlng, "cellBlng" => $cellBlng,
				                               "shpngFullName" => $shpngFullName, "o_id" => $o_id, "fullNameShpng" =>  $fullNameShpng, 
				                               "streetAddressShpng" => $streetAddressShpng,
				                               "cityShpng"=> $cityShpng, "stateShpng" => $stateShpng, "zipShpng" => $zipShpng,
				                               "emailShpng" => $emailShpng, "phoneShpng" => $phoneShpng, "cellShpng" => $cellShpng]);
        }
        else
        {
	        $msg = "We sincerely apologize for allowing you to get to the check out ";
	        $msg .= "without having purchased anything, please return to the store so that we meet your literary needs.";
	        apologize($msg);
        }
        
    }
    


