<?php
     /**
     * checkOutResult.php
     *
     * Frank E. Mathes
     * fmathes1@hotmail.com
     *
     * This program allows the visiting member to enter relevant 
     * address information prior to buying the order. The member 
     * initially arrives here from the shopping cart via a Post activity.
     *
     * This project is being created as part of a final project for CS50x and
     * launch code final project spring of 2014.
     */
     
    require_once("../includes/config.php");
    require_once("../includes/shoppingCartDBFnctns.php");
    
function validateAddressFields(&$blngOrdrAddress, &$shpngOrdrAddress)
{
	$nbrAddressFlds = count($_POST);
	
#	print_r($_POST);
								
	if ($nbrAddressFlds < 1)
	{
		apologize("You must enter all the required fields.");
	}
	#echo("about to validate billing fields\n");
	# validate billing address fields
	if (($_POST['fullNameBlng'] == NULL) || ($_POST['fullNameBlng'] == ' '))
	{
		apologize("You need to enter a Billing Name");
	}
	if (($_POST['streetAddressBlng'] == NULL) || ($_POST['streetAddressBlng'] == ' '))
	{
		apologize("You need to enter a Billing Street Address");
	}
	if (($_POST['cityBlng'] == NULL) || ($_POST['cityBlng'] == ' '))
	{
		apologize("You need to enter a Billing City.");
	}
	if (($_POST['stateBlng'] == NULL) || ($_POST['stateBlng'] == ' '))
	{
		apologize("You need to enter a Billing State");
	}
	if (($_POST['zipBlng'] == NULL) || ($_POST['zipBlng'] == ' '))
	{
		 apologize("You need to enter a Billing Zip Code.");
	}
	if (($_POST['emailBlng'] == NULL) || ($_POST['emailBlng'] ==' '))
	{
		apologize("You need to enter a Billing Email Address.");
	}
	
	#echo("billing fields validated, about to validate shipping fields\n");
	# validate shipping address fields if not checked same as shipping
	if (!($_POST['checkShpng'] == 'yes'))
	{
	    if (($_POST['fullNameShpng'] == NULL) || ($_POST['fullNameShpng'] == ' '))
	    {
		    apologize("You need to enter a Shipping Name");
	    }
		if (($_POST['streetAddressShpng'] == NULL) || ($_POST['streetAddressShpng'] == ' '))
		{
			apologize("You need to enter a Shipping Street Address.");
		}
		if (($_POST['cityShpng'] == NULL) || ($_POST['cityShpng'] == ' '))
		{
			apologize("You need to enter a Shipping City.");
		}
		if (($_POST['stateShpng'] == NULL) || ($_POST['stateShpng'] == ' '))
		{
			apologize("You need to enter a Shipping State.");
		}
		if (($_POST['zipShpng'] == NULL) || ($_POST['zipShpng'] == ' '))
		{
			apologize("You need to enter a Shipping Zip Code.");
		}
		if (($_POST['emailShpng'] == NULL) || ($_POST['emailShpng'] == ' '))
		{
			apologize("You need to enter a Shipping Email Address.");
		}
	}
	#echo("address fields checked okay, save data\n");
	#Address fields validates, load address fields
	$blngOrdrAddress['fullName'] = $_POST['fullNameBlng'];
	$blngOrdrAddress['streetAddress'] = $_POST['streetAddressBlng'];
	$blngOrdrAddress['city'] = $_POST['cityBlng'];
	$blngOrdrAddress['state_id'] = $_POST['stateBlng'];
	$blngOrdrAddress['zip'] = $_POST['zipBlng'];
	$blngOrdrAddress['email'] = $_POST['emailBlng'];
	$blngOrdrAddress['phone'] = $_POST['phoneBlng'];
	$blngOrdrAddress['cell'] = $_POST['cellBlng'];
	if ($_POST['checkShpng'] == 'yes')
	{
	    #echo("detected same as billing\n");
		$blngOrdrAddress['addresstype'] = 'b';
	}
	else
	{
		$blngOrdrAddress['addresstype'] = 's';
		$shpngOrdrAddress['addresstype'] = 'm';
		$shpngOrdrAddress['fullName'] = $_POST['fullNameShpng'];
		$shpngOrdrAddress['streetAddress'] = $_POST['streetAddressShpng'];
		$shpngOrdrAddress['city'] = $_POST['cityShpng'];
		$shpngOrdrAddress['state_id'] = $_POST['stateShpng'];
		$shpngOrdrAddress['zip'] = $_POST['zipShpng'];
		$shpngOrdrAddress['email'] = $_POST['emailShpng'];
		$shpngOrdrAddress['phone'] = $_POST['phoneShpng'];
		$shpngOrdrAddress['cell'] = $_POST['cellShpng'];
	}
	
}

function checkBillingAddressType($blngAddress)
{

    if ($blngAddress['addresstype'] <> 'b')
    {
        return false;
    }
    else
    {
        return true;      
    }
 }
 

# mainline starts here
	
						 
	// initialize the order address information array
	$ordrAddress = array('oa_id'=>0,'addresstype'=>'', 'fullName'=>'', 
	                     'streetAddress'=>'', 'city'=>'', 'state_id'=>'', 'zip'=>'', 
	                     'email'=>'', 'phone'=>'', 'cell'=>'');
	
	$blngOrdrAddress = $ordrAddress;
	$shpngOrdrAddress = $ordrAddress;
	$blngOrdrAddressOld = $ordrAddress;
	$shpngOrdrAddressOld = $ordrAddress;
	
	$o_id = 0;
#	echo("<p class='error'>Order number, o_id  = $o_id </p>");
	validateAddressFields($blngOrdrAddress, $shpngOrdrAddress);
	
 	if ($stat == 'logout')
  	{	
		#echo("begin address processing\n");
		$user_info = $_SESSION['user_info'];
		
		$username = $user_info['username'];
		$username = trim($username);
		$password = $user_info['password'];
		$password = trim($password);
		$in_fullName = $user_info['firstname'] . ' ' . $user_info['lastname'];
		$shpngFullName = ' ';
							 
		// initialize the order address information array
		$ordrAddress = array('oa_id'=>0,'addresstype'=>'', 'fullName'=>'', 
		                     'streetAddress'=>'', 'city'=>'', 'state_id'=>'', 'zip'=>'', 
		                     'email'=>'', 'phone'=>'', 'cell'=>'');
        
		// initialize the shipping address status fields
		$sameasbilling = ' ';
		$disableSubBtn = " ";
		
		// get the order address information array
		
		$c_id = getCustomerID($username, $password);
									 
		$o_id = getOrderId($c_id);
#	    echo("<p class='error'>Order number, o_id  = $o_id </p>");
		
		$retval = getOrderBillingAddress($o_id, $blngOrdrAddressOld);
	    if ($retval == 'addrsfnd')
	    {   

            $same_as_shipping_old = checkBillingAddressType($blngOrdrAddressOld);
            if ($same_as_shipping_old == false)
            {
                $retval = getOrderShippingAddress($o_id, $shpngOrdrAddressOld);
                #echo("shipping address is " . $retval . "\n");
                if ($retval <> 'addrsfnd')
                {
			        apologize("Unable to retrieve Shipping Address.");
                }           
            }
	
	        $same_as_shipping_new = checkBillingAddressType($blngOrdrAddress);
	        
            if ($same_as_shipping_old == true)
            {
                if ($same_as_shipping_new == false)
			    {
			        $blngOrdrAddress['addresstype'] = 's';
			        $retval =  addOrderAddress($o_id, $shpngOrdrAddress);
#			        echo("<p class='error'>add shipping address is  $retval </p>"); 
			        if ($retval  <> 'addrsinserted')
					{
					    apologize("Unable to add Shipping Address.");
					}       
			    }
			    else
			    {
			        $sameasbilling = 'checked="checked"';
				    $shpngFullName = 'Same As Billing';
			    }
            }
            else
            {
                if ($same_as_shipping_new == true)
                {
                    $blngOrdrAddress['addresstype'] = 'b';
                    $retval =  deleteCustAddress($shpngOrdrAddressOld['oa_id']);
                    #echo("delete shipping address is " . $retval . "\n");
                    if ($retval  <> 'addrsdeleted')
					{
					    apologize("Unable to delete Old Shipping Address.");
					}
                    $sameasbilling = 'checked="checked"';
				    $shpngFullName = 'Same As Billing'; 
                }
                else
                {
                    $shpngOrdrAddress['oa_id'] = $shpngOrdrAddressOld['oa_id'];
					$retval = updateOrderAddress($shpngOrdrAddressOld['oa_id'], $shpngOrdrAddress);
					#echo("update shipping address is " . $retval . "\n");
					if ($retval  <> 'addrsupdated')
					{
					    apologize("Unable to update Shipping Address.");
					}
			    }
					
			}
			$blngOrdrAddress['oa_id'] = $blngOrdrAddressOld['oa_id'];
			$retval = updateOrderAddress($blngOrdrAddressOld['oa_id'], $blngOrdrAddress);
			#echo ("The billing update return value is ".$retval);
			if ($retval  <> 'addrsupdated')
			{
			    apologize("Unable to update Billing Address.");
			}
		}
		else
		{
			$sameasbilling = ' ';
			$retval =  addOrderAddress($o_id, $blngOrdrAddress);
			#echo("add billing address is " . $retval . "\n");
			if ($retval == 'addrsinserted')
			{
				$mailAddressType = $blngOrdrAddress['addresstype'];
				if ($mailAddressType == 'b')
				{
					$sameasbilling = 'checked="checked"';
					$shpngFullName = 'Same As Billing';
				}
				else
				{
					$retval =  addOrderAddress($o_id, $shpngOrdrAddress);
					#echo("add shipping address is " . $retval . "\n");
					if ($retval  <> 'addrsupdated')
	                {
	                    apologize("Unable to update Shipping Address.");
	                }
				}
			}
			else
			{
				$sameasbilling = ' ';	
			}
		}
	}
	else
	{
		$stat = 'login';
	}
    
    $fullNameBlng = $blngOrdrAddress['fullName'];
    $streetAddressBlng = $blngOrdrAddress['streetAddress'];
	$cityBlng = $blngOrdrAddress['city'];
	$stateBlng = $blngOrdrAddress['state_id'];
	$zipBlng = $blngOrdrAddress['zip'];
	$emailBlng = $blngOrdrAddress['email'];
	$phoneBlng = $blngOrdrAddress['phone'];
	$cellBlng = $blngOrdrAddress['cell'];
		
	$fullNameShpng = $shpngOrdrAddress['fullName'];
	$streetAddressShpng = $shpngOrdrAddress['streetAddress'];
	$cityShpng = $shpngOrdrAddress['city'];
	$stateShpng = $shpngOrdrAddress['state_id'];
	$zipShpng = $shpngOrdrAddress['zip'];
	$emailShpng = $shpngOrdrAddress['email'];
	$phoneShpng = $shpngOrdrAddress['phone'];
	$cellShpng = $shpngOrdrAddress['cell'];
	
    if ($stat == 'login')
    {
	    $msg = "We sincerely apologize for allowing you to get to the check out ";
	    $msg .= "without having logged on.<br />Please click the below link and log in so that we meet your literary needs.";
	    apologize($msg);
    }
    else
    {
        
#        $_o_id = getOrderId($c_id); 
       
        if ($o_id > 0)
        { 
            $orderItems = [];
            
            $orderItems = buildStatmentDetail($o_id);
            
            render("checkOutResult_form.php", ["stat" => $stat, "title" => "Check Out", "orderItems" => $orderItems,
                                               "fullNameBlng" => $fullNameBlng, "streetAddressBlng" =>   $streetAddressBlng,
				                               "cityBlng" => $cityBlng, "stateBlng" => $stateBlng, "zipBlng" => $zipBlng, 
				                               "emailBlng" => $emailBlng, "phoneBlng" => $phoneBlng, "cellBlng" => $cellBlng,
				                               "shpngFullName" => $shpngFullName, "sameasbilling" => $sameasbilling,
				                               "fullNameShpng" =>  $fullNameShpng, "streetAddressShpng" => $streetAddressShpng, 
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
    


