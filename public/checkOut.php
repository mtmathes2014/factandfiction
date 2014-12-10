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
        
		// initialize the shipping address status fields
		$sameasbilling = ' ';
		$disableSubBtn = " ";
		
		// get the order address information array
		$o_id = getOrderId($c_id);
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
#	            echo("<p class='error'>mail address type = $mailAddressType </p>");
	   
		        if ($mailAddressType == 'b')
		        {
			        $sameasbilling = 'checked="checked"';
		        }
		        else
		        {
			        $retval = getOrderShippingAddress($o_id, $ordrAddress);
			        if ($retval == 'addrsfnd')
			        {
#		        echo("<p class='error'>same as billing = $sameasbilling </p>");
		                $fullNameShpng = $ordrAddress['fullName'];
		                $streetAddressShpng = $ordrAddress['streetaddress'];
		                $cityShpng = $ordrAddress['city'];
		                $stateShpng = $ordrAddress['state_id'];
		                $zipShpng = $ordrAddress['zip'];
		                $emailShpng = $ordrAddress['email'];
		                $phoneShpng = $ordrAddress['phone'];
		                $cellShpng = $ordrAddress['cell'];
		            }
		            else
		            {
		                apologize("Unable to get order shipping address.");
		            }
		        }

		    }
		    else
		    {
		        // attempt to obtain the billing address information
		        $retval = getBillingAddress($c_id, $custAddress);
		
		        // set up the shipping address information
		        $fullNameBlng = $user_info['firstname'] . ' ' . $user_info['lastname'];
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
		            // initialize order billing address with customer billing address
		            $ordrAddress['addresstype'] = $custAddress['addresstype'];
		            $ordrAddress['fullName']= $user_info['firstname'] . ' ' . $user_info['lastname']; 
		            $ordrAddress['streetAddress'] = $custAddress['streetaddress']; 
		            $ordrAddress['city'] = $custAddress['city'];
		            $ordrAddress['state_id'] = $custAddress['state_id'];
		            $ordrAddress['zip'] = $custAddress['zip'];
		            $ordrAddress['email'] = $custAddress['email']; 
		            $ordrAddress['phone'] = $custAddress['phone'];
		            $ordrAddress['cell'] = $custAddress['cell'];
		            $retval =  addOrderAddress($o_id, $ordrAddress);
			        #echo("add shipping address is " . $retval . "\n"); 
			        if ($retval  <> 'addrsinserted')
					{
					    apologize("Unable to add order billing address.");
					} 
		            else
		            {
			            $mailAddressType = $custAddress['addresstype'];
			            if ($mailAddressType == 'b')
			            {
				            $sameasbilling = 'checked="checked"';
			            }
			            else
			            {
				            $retval = getShippingAddress($c_id, $custAddress);
				            if ($retval == 'addrsfnd')
		                    {
		                        // load order shippingg address inf    
		                        // set up the shipping address information
		                        $firstNameShpng = $user_info['firstname'];
		                        $lastNameShpng = $user_info['lastname'];
		                        $streetAddressShpng = $custAddress['streetaddress'];
		                        $cityShpng = $custAddress['city'];
		                        $stateShpng = $custAddress['state_id'];
		                        $zipShpng = $custAddress['zip'];
		                        $emailShpng = $custAddress['email'];
		                        $phoneShpng = $custAddress['phone'];
		                        $cellShpng = $custAddress['cell'];
		                        
			                    // initialize order shipping address with customer shipping address
	                            $ordrAddress['addresstype'] = $custAddress['addresstype'];
	                            $ordrAddress['fullName']= $user_info['firstname'] . ' ' . $user_info['lastname']; 
	                            $ordrAddress['streetAddress'] = $custAddress['streetaddress']; 
	                            $ordrAddress['city'] = $custAddress['city'];
	                            $ordrAddress['state_id'] = $custAddress['state_id'];
	                            $ordrAddress['zip'] = $custAddress['zip'];
	                            $ordrAddress['email'] = $custAddress['email']; 
	                            $ordrAddress['phone'] = $custAddress['phone'];
	                            $ordrAddress['cell'] = $custAddress['cell'];
	                            $retval =  addOrderAddress($o_id, $ordrAddress);
		                        #echo("add shipping address is " . $retval . "\n"); 
		                        
		                        if ($retval  <> 'addrsinserted')
				                {
				                    apologize("Unable to add customeer shipping address.");
				                } 
		                    }
		                    else
		                    {
		                         apologize("Unable to get customer billing address.");
		                    }
                        }
                    }
		        }
		
			}
	    }
	    else
	    {
	        apologize("Unable to proceed with check out, cannot find order.");
	    }
	    				 	
        render("checkOut_form.php", ["stat" => $stat, "title" => "Check Out", 
                                "fullNameBlng" => $fullNameBlng, "streetAddressBlng" => $streetAddressBlng, 
                                "cityBlng" => $cityBlng, "stateBlng" => $stateBlng, 
                                "zipBlng" => $zipBlng, "emailBlng" => $emailBlng, "phoneBlng" => $phoneBlng, "cellBlng" => $cellBlng,
                                "fullNameShpng" =>  $fullNameShpng, "streetAddressShpng" => $streetAddressShpng, 
                                "cityShpng" => $cityShpng, "stateShpng" => $stateShpng, 
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

