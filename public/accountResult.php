<?php
     /**
     * accountResult.php
     *
     * Frank E. Mathes
     * fmathes1@hotmail.com
     *
     * This program allows the visiting member to enter relevant 
     * address information.
     *
     * This project is being created as part of a final project for CS50x and
     * launch code final project spring of 2014.
     */
     
    require_once("../includes/config.php");
    require_once("../includes/shoppingCartDBFnctns.php");
    
function validateAddressFields(&$blngCustAddress, &$shpngCustAddress)
{
	$nbrAddressFlds = count($_POST);
	
	#print_r($_POST);
	
	##echo("\n");
								
	if ($nbrAddressFlds < 1)
	{
		apologize("You must enter all the required fields.");
	}
	#echo("about to validate billing fields\n");
	# validate billing address fields
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
	$blngCustAddress['streetaddress'] = $_POST['streetAddressBlng'];
	$blngCustAddress['city'] = $_POST['cityBlng'];
	$blngCustAddress['state_id'] = $_POST['stateBlng'];
	$blngCustAddress['zip'] = $_POST['zipBlng'];
	$blngCustAddress['email'] = $_POST['emailBlng'];
	$blngCustAddress['phone'] = $_POST['phoneBlng'];
	$blngCustAddress['cell'] = $_POST['cellBlng'];
	if ($_POST['checkShpng'] == 'yes')
	{
	    ##echo("detected same as billing\n");
		$blngCustAddress['addresstype'] = 'b';
	}
	else
	{
		$blngCustAddress['addresstype'] = 's';
		$shpngCustAddress['addresstype'] = 'm';
		$shpngCustAddress['streetaddress'] = $_POST['streetAddressShpng'];
		$shpngCustAddress['city'] = $_POST['cityShpng'];
		$shpngCustAddress['state_id'] = $_POST['stateShpng'];
		$shpngCustAddress['zip'] = $_POST['zipShpng'];
		$shpngCustAddress['email'] = $_POST['emailShpng'];
		$shpngCustAddress['phone'] = $_POST['phoneShpng'];
		$shpngCustAddress['cell'] = $_POST['cellShpng'];
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
	
	$custAddress = array('ca_id'=>0,'addresstype'=>'', 'streetaddress'=>'', 'city'=>'', 'state_id'=>'', 'zip'=>'', 'email'=>'', 'phone'=>'', 'cell'=>'');
	
	$blngCustAddress = $custAddress;
	$shpngCustAddress = $custAddress;
	$blngCustAddressOld = $custAddress;
	$shpngCustAddressOld = $custAddress;
	
	#  define state variables here
	$same_as_shipping_new = true;
	$same_as_shipping_old = true;
	
	validateAddressFields($blngCustAddress, $shpngCustAddress);
	
	#echo("session status is " . $stat . "\n");
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
											 
		$retval = getBillingAddress($c_id, $blngCustAddressOld);
		
		#echo("billing address is " . $retval . "\n");
			
		$sameasbilling = ' ';
		$mailAddressType = ' ';
		
		if ($retval == 'addrsfnd')
		{
            $same_as_shipping_old = checkBillingAddressType($blngCustAddressOld);
            if ($same_as_shipping_old == false)
            {
                $retval = getShippingAddress($c_id, $shpngCustAddressOld);
                #echo("shipping address is " . $retval . "\n");
                if ($retval <> 'addrsfnd')
                {
			        apologize("Unable to retrieve Shipping Address.");
                }           
            }
	
	        $same_as_shipping_new = checkBillingAddressType($blngCustAddress);
	        
            if ($same_as_shipping_old == true)
            {
                if ($same_as_shipping_new == false)
			    {
			        $blngCustAddress['addresstype'] = 's';
			        $retval =  addCustAddress($c_id, $shpngCustAddress);
			        #echo("add shipping address is " . $retval . "\n"); 
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
                    $blngCustAddress['addresstype'] = 'b';
                    $retval =  deleteCustAddress($shpngCustAddressOld['ca_id']);
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
                    $shpngCustAddress['ca_id'] = $shpngCustAddressOld['ca_id'];
					$retval = updateCustAddress($shpngCustAddressOld['ca_id'], $shpngCustAddress);
					#echo("update shipping address is " . $retval . "\n");
					if ($retval  <> 'addrsupdated')
					{
					    apologize("Unable to update Shipping Address.");
					}
			    }
					
			}
			$blngCustAddress['ca_id'] = $blngCustAddressOld['ca_id'];
			$retval = updateCustAddress($blngCustAddressOld['ca_id'], $blngCustAddress);
			#echo ("The billing update return value is ".$retval);
			if ($retval  <> 'addrsupdated')
			{
			    apologize("Unable to update Billing Address.");
			}
		}
		else
		{
			$sameasbilling = ' ';
			$retval =  addCustAddress($c_id, $blngCustAddress);
			#echo("add billing address is " . $retval . "\n");
			if ($retval == 'addrsinserted')
			{
				$mailAddressType = $blngCustAddress['addresstype'];
				if ($mailAddressType == 'b')
				{
					$sameasbilling = 'checked="checked"';
					$shpngFullName = 'Same As Billing';
				}
				else
				{
					$retval =  addCustAddress($c_id, $shpngCustAddress);
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
	
		 render("accountResult_form.php", ["stat" => $stat, "title" => "Account Result", 
                                               "in_fullName" => $in_fullName, "streetAddressBlng" =>   $streetAddressBlng,
				                               "cityBlng" => $cityBlng, "stateBlng" => $stateBlng, "zipBlng" => $zipBlng, 
				                               "emailBlng" => $emailBlng, "phoneBlng" => $phoneBlng, "cellBlng" => $cellBlng,
				                               "shpngFullName" => $shpngFullName,
				                               "sameasbilling" => $sameasbilling, "streetAddressShpng" => $streetAddressShpng,
				                               "cityShpng"=> $cityShpng, "stateShpng" => $stateShpng, "zipShpng" => $zipShpng,
				                               "emailShpng" => $emailShpng, "phoneShpng" => $phoneShpng, "cellShpng" => $cellShpng]);
	}
	else
	{
		#$stat = 'login';
		$msg = "We sincerely apologize for allowing you to get to the account maintenance ";
	    $msg .= "without having logged on.<br />Please click the below link and log in so that we meet your literary needs.";
	    apologize($msg);
	}
### end of mainline
