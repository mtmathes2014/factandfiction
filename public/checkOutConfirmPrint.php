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
	
	$custAddress = array('ca_id'=>0,'addresstype'=>'', 'streetaddress'=>'', 'city'=>'', 'state_id'=>'', 'zip'=>'', 'email'=>'', 'phone'=>'', 'cell'=>'');
	
	$blngCustAddress = $custAddress;
	$shpngCustAddress = $custAddress;
		
 	if ($stat == 'logout')
  	{	
		#echo("begin address processing\n");
		$user_info = $_SESSION['user_info'];
		
		$username = $user_info['username'];
		$username = trim($username);
		$password = $user_info['password'];
		$password = trim($password);
		$in_fullName = $user_info['firstname'] . ' ' . $user_info['lastname'];
		$shpngFullName = $in_fullName;
		
		$c_id = getCustomerID($username, $password);
									 
		$retval = getBillingAddress($c_id, $custAddress);
		
		#echo("billing address is " . $retval . "\n");
		
		$sameasbilling = ' ';
		
		if ($retval == 'addrsfnd')
		{		
			$blngCustAddress = $custAddress;
			$mailAddressType = $blngCustAddress['addresstype'];
			if ($mailAddressType == 'b')
			{
				$sameasbilling = 'checked="checked"';
				$shpngFullName = 'Same As Billing';
			}
			else
			{
				$retval = getShippingAddress($c_id, $custAddress);
				if ($retval == 'addrsfnd')
				{
					$shpngCustAddress = $custAddress;
				}
			}
		}
	}
	else
	{
		$stat = 'login';
	}
    
    $streetAddressBlng = $blngCustAddress['streetaddress'];
	$cityBlng = $blngCustAddress['city'];
	$stateBlng = $blngCustAddress['state_id'];
	$zipBlng = $blngCustAddress['zip'];
	$emailBlng = $blngCustAddress['email'];
	$phoneBlng = $blngCustAddress['phone'];
	$cellBlng = $blngCustAddress['cell'];
		
	$streetAddressShpng = $shpngCustAddress['streetaddress'];
	$cityShpng = $shpngCustAddress['city'];
	$stateShpng = $shpngCustAddress['state_id'];
	$zipShpng = $shpngCustAddress['zip'];
	$emailShpng = $shpngCustAddress['email'];
	$phoneShpng = $shpngCustAddress['phone'];
	$cellShpng = $shpngCustAddress['cell'];
	
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
                        
            // output confirmation screen
            renderPrint("checkOutConfirmPrint_form.php", ["stat" => $stat, "title" => "Order Print", "orderItems" => $orderItems, 
                                               "in_fullName" => $in_fullName, "streetAddressBlng" =>   $streetAddressBlng,
				                               "cityBlng" => $cityBlng, "stateBlng" => $stateBlng, "zipBlng" => $zipBlng, 
				                               "emailBlng" => $emailBlng, "phoneBlng" => $phoneBlng, "cellBlng" => $cellBlng,
				                               "shpngFullName" => $shpngFullName, "o_id" => $o_id,
				                               "sameasbilling" => $sameasbilling, "streetAddressShpng" => $streetAddressShpng,
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
    


