<?php
    /**
     * shoppingCartDBFnctns.php
     *
     * Frank E. Mathes
     * fmathes1@hotmail.com
     *
     * This file initializes contains "crud" database functions used to
     * support the shopping cart related functions of the sample bookstore
     * website.
     *
     * This project is being created as part of a final project for CS50x and
     * launch code final project spring of 2014.
     */
  
function getCustomerID($username, $password)
{
	# set up query for username password combination

	$myQuery = "SELECT `c_id`, `username`, `password`";
	$myQuery .= " FROM `customer` ";
	$myQuery .= " WHERE `username` = ? ;"; 
#	$myQuery .= " AND `password`  ? ;";

   # if query is successful, display the data in a table 
   $result = query($myQuery, $username);  
   
   // initialize c_id to 0, a non valid result
   $c_id = 0;
   
   if (!($result === false))
   {
       $rows = count($result);
       if ($rows > 0)
       {
		    $row = $result[0];
		    if (($username == $row["username"]) && (crypt($password, $row["password"]) == $row["password"]))
			{
                $c_id = $row["c_id"];  
			
		    }
		}
		    
	}
  	
	return $c_id;
}
function getOrderId($c_id)
{
	# set up query for ordromer id

	$myQuery = "SELECT `o_id`, `c_id` ";
	$myQuery .= " FROM `order` ";
	$myQuery .= " WHERE `c_id` = ? ";
	$myQuery .= " AND `checkedOut` = 0 ;";
	
           
   # if query is successful, display the data in a table 
   $result = query($myQuery,  $c_id); 
   
   $o_id = -1;
   
   if (!($result === false))
   { 
       $rows = count($result);
       if ($rows > 0)
       {
		    $row = $result[0];
	   	  	if ($c_id == $row["c_id"])
			{
				$o_id = $row["o_id"];  
			}
 		}
   	}
	
	if ($o_id < 0)
	{
		$o_id = addCustOrder($c_id);	
	}
	
	return $o_id;
}
function updateOrder($o_id, $subTotal, $salesTax, $shipping, $checkedOut)
{
	# set up query for ordromer order update
	
	$total = $subTotal +  $salesTax + $shipping;

	$myQuery = "Update `order` ";
	$myQuery .= " set `subtotal` = `subtotal` + ? ,";
	$myQuery .= " `salestax` = `salestax` + ? ,";
	$myQuery .= " `shipping` = `shipping` + ? ,";
	$myQuery .= " `total` = `total` + ? ,";
	$myQuery .= " `checkedout` =  ? ";
	$myQuery .= " WHERE `o_id` = ? ;";
	#echo("<p class='error'>Order number, o_id  = $o_id </p>");
    $stat = query($myQuery, $subTotal, $salesTax, $shipping, $total, $checkedOut, $o_id); 
	
	return $stat;
}

function addCustOrder($c_id)
{
	# set up insert of user info
#	echo("<p class='error'>Customer number, c_id  = $c_id </p>");
   
	$myNewOrder = "Insert into `order` (`c_id`, `dateAdded`) ";
	$myNewOrder .= " values (?, ?)";																	
	
#	$date = new DateTime();
#	$dateAdded = $date->getTimestamp();
#   $dateAdded = "NOW()";
#	$dateAdded = '"' . date("Y-m-d H:i:s") . '"';
	$dateAdded = date("Y-m-d H:i:s");
	
	
#	echo("<p class='error'>Date to be added  = $dateAdded </p>");   
	
#	echo("<p class='error'>Query to be used  = $myNewOrder </p>"); 
	 	
	$stat = query($myNewOrder, $c_id, $dateAdded); 
	
	if (!($stat === false))
	{
		$o_id  =  getOrderId($c_id);
	}
	else
	{
		$o_id = 0;
	}
	
	return $o_id;
}
function addOrderItem($o_id, $title_id, $quantity)
{	
   
	$myOrderItem = "Insert into `orderitem` (`o_id`, `title_id`, `quantity`, `dateAdded`) ";
	$myOrderItem .= " values (?, ?, ?, ?);";																	
	
#	$date = new DateTime();
#	$dateAdded = $date->getTimestamp();
#	$dateAdded = "NOW()";
    $dateAdded = date("Y-m-d H:i:s");   
		
	$stat = query($myOrderItem, $o_id, $title_id, $quantity, $dateAdded); 
	
	if (!($stat === false))
	{	
		$title_info = array('title_id'=>$title_id, 'title'=>' ', 
							'pub_id'=>' ', 'au_id'=>' ', 'price'=>0.00, 
							'notes'=>' ', 'pubdate'=> time(), 
							'quantityonhand'=>0, 'unit'=>' ', 'image'=>' ');
	
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
			$in_unit = $title_info['unit'];
			$in_image = $title_info['image'];
			
			$amount = $in_price * $quantity;
			
			$stat = updateOrder($o_id, $amount, 0, 0, false);
		}
		
	}
	return $stat;
}

function deleteOrderItemQantity($oi_id)
{
	
   # set up delete of order item
   
	$myDelOrdrItm = "Delete from `orderitem` ";
	$myDelOrdrItm .= " Where `oi_id` = ? ;";
	
	$stat = query($myDelOrdrItm, $oi_id); 
	
	return $stat;
}

function updateOrderItemQantity($oi_id, $quantity)
{
	
   # set up update of order item quantity
   
	$myUpdOrderItem = "Update `orderitem` ";
	$myUpdOrderItem .= " set `quantity` = ?";
	$myUpdOrderItem .= " ,  `lastupdate` = ?";
	$myUpdOrderItem .= " Where `oi_id` = ? ;";
			
	$stat = query($myUpdOrderItem, $quantity, mktime(), $oi_id); 
	
	return $stat;
}
function getOrderItemQuantity($o_id, $title_id)
{
	# set up query for an item ordered by this customer

	$myQuery = "SELECT `oi_id`, `quantity` ";
	$myQuery .=  " FROM `orderitem` ";
	$myQuery .=  " WHERE `o_id` = ? ";
	$myQuery .=  " AND `title_id` = ? ;";
	  
   $quantity = 0;	
   
   $result = query($myQuery,  $o_id, $title_id); 
   
   if (!($result === false))
   {
       $rows = count($result);
       if ($rows > 0)
       {
		    $row = $result[0];
	   	  	$item_id = $row["oi_id"]; 
			$quantity = $row["quantity"];
 	    }
   	}
	  
	return  $quantity; 
}
function getOrderItemNumber($o_id, $title_id)
{
	# set up query for an item ordered by this customer

	$myQuery = "SELECT `oi_id`, `quantity` ";
	$myQuery .=  " FROM `orderitem` ";
	$myQuery .=  " WHERE `o_id` = ? ";
	$myQuery .=  " AND `title_id` = ? ;";
	  	
   $item_id = 0;
   $quantity = 0;	
   
   $result = query($myQuery,  $o_id, $title_id); 
   
   if (!($result === false))
   {
       $rows = count($result);
       if ($rows > 0)
       {
		    $row = $result[0];
		    $item_id = $row["oi_id"]; 
			$quantity = $row["quantity"];
 		}
  	}

	return  $item_id; 
}
function get_title_info(&$title_info)
{
	if ($title_info['title_id'] == NULL)
	{
		return "noentry";
	}
	
	$in_title_id = $title_info['title_id'];
	$in_title_id = trim($in_title_id);
		
	# set up query for titlename password combination
	$myQuery = "SELECT `title_id`, `title`, `pub_id`, `au_id`, `price`, ";
	$myQuery .=  "`notes`, `pubdate`, `quantityonhand`, `unit`, `image` ";
	$myQuery .=  "FROM `titles` ";
	$myQuery .=  "where `title_id` = ? ;";

	$namepassexists = false;
	
    $result = query($myQuery,  $in_title_id); 
   
   if (!($result === false))
   {
       $rows = count($result);
       if ($rows > 0)
       {
		    $row = $result[0];
  		    if ($in_title_id == $row["title_id"])
		    {
				 $namepassexists = true;
				 $title_info['title'] =  $row["title"];
				 $title_info['pub_id'] = $row["pub_id"];
				 $title_info['au_id'] = $row["au_id"];
				 $title_info['price'] = $row["price"];
				 $title_info['notes'] = $row["notes"];
				 $title_info['pubdate'] = $row["pubdate"];
				 $title_info['quantityonhand'] = $row["quantityonhand"];
				 $title_info['unit'] = $row["unit"];
				 $title_info['image'] = $row["image"];
			}
  			
 		}
		
		if ($namepassexists == true)
		{
			return 'titlefnd';
		}
		else
		{
	   		return 'titlentfnd';
   		}	
   }
   else
   {
	    return 'titlentfnd';
   }
}
function adjust_title_quantity($title_id, $qtyAdjstmnt)
{		
	# set up update
	$myQuery = "Update `titles` ";
	$myQuery .= "set `quantityonhand` = `quantityonhand` - ? ";
	$myQuery .= "where `title_id` = ?;";
	
	$stat = query($myQuery, $qtyAdjstmnt, $title_id ); 
	
	return $stat;
}
function getBillingAddress($c_id, &$custAddress)
{
# set up query for address
	$myQuery = "SELECT `c_id`, `ca_id`, `ca_addresstype`, `ca_streetaddress`, `ca_city`, ";
	$myQuery .=  " `ca_state_id`, `ca_zip`, `ca_email`, `ca_phone`, `ca_cell` ";
	$myQuery .=  "FROM `custAddress` ";
	$myQuery .=  "where `c_id` = ? ";
	$myQuery .=  " AND `ca_addresstype` IN ('b', 's') ;";
 
    $namepassexists = false;
    
   $result = query($myQuery,  $c_id); 
   
   if (!($result === false))
   {
       $rows = count($result);
       if ($rows > 0)
       {
		    $row = $result[0];
   		    if ($c_id == $row["c_id"])
			{
				$namepassexists = true;
				$custAddress['ca_id'] = $row["ca_id"];
				$custAddress['addresstype'] = $row["ca_addresstype"];
				$custAddress['streetaddress'] = $row["ca_streetaddress"];
				$custAddress['city'] = $row["ca_city"];
				$custAddress['state_id'] = $row["ca_state_id"];
				$custAddress['zip'] = $row["ca_zip"];
				$custAddress['email'] = $row["ca_email"];
				$custAddress['phone'] = $row["ca_phone"];
				$custAddress['cell'] = $row["ca_cell"];
			}
  			
 		}
		
		if ($namepassexists == true)
		{
			return 'addrsfnd';
		}
		else
		{
	   		return 'addrsntfnd';
   		}	
   }
   else
   {
		return 'addrsntfnd';
   }	
		
}
function getShippingAddress($c_id, &$custAddress)
{
# set up query for shipping address
	$myQuery = "SELECT `c_id`, `ca_id`, `ca_addresstype`, `ca_streetaddress`, `ca_city`, ";
	$myQuery .=  " `ca_state_id`, `ca_zip`, `ca_email`, `ca_phone`, `ca_cell` ";
	$myQuery .=  "FROM `custAddress` ";
	$myQuery .=  "where `c_id` = ? ";
	$myQuery .=  " AND `ca_addresstype` = 'm' ;";
	
	$namepassexists = false;
 
    $result = query($myQuery,  $c_id); 
   
   if (!($result === false))
   {
       $rows = count($result);
       if ($rows > 0)
       {
		    $row = $result[0];
            if ($c_id == $row["c_id"])
			{
				$namepassexists = true;
				$custAddress['ca_id'] = $row["ca_id"];
				$custAddress['addresstype'] = $row["ca_addresstype"];
				$custAddress['streetaddress'] = $row["ca_streetaddress"];
				$custAddress['city'] = $row["ca_city"];
				$custAddress['state_id'] = $row["ca_state_id"];
				$custAddress['zip'] = $row["ca_zip"];
				$custAddress['email'] = $row["ca_email"];
				$custAddress['phone'] = $row["ca_phone"];
				$custAddress['cell'] = $row["ca_cell"];
			}
  			
 		}
		
		if ($namepassexists == true)
		{
			return 'addrsfnd';
		}
		else
		{
	   		return 'addrsntfnd';
   		}	
   }
   else
   {
	   
		return 'addrsntfnd';
   }	
}
function addCustAddress($c_id, $custAddress)
{
# set up address insert
	$myQuery = "INSERT INTO `custAddress` (`c_id`, `ca_addresstype`, `ca_streetaddress`, `ca_city`, ";
	$myQuery .=  " `ca_state_id`, `ca_zip`, `ca_email`, `ca_phone`, `ca_cell` )";
	$myQuery .=  "VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?);";
 
   $stat = query($myQuery, $c_id, $custAddress['addresstype'], $custAddress['streetaddress'], 
            $custAddress['city'], $custAddress['state_id'], $custAddress['zip'], $custAddress['email'], 
            $custAddress['phone'], $custAddress['cell']); 
	
	
	if (!($stat === false))
	{
		return 'addrsinserted';
	}
	else
	{
		return 'addrsninserted';
	}
		
}	
function updateCustAddress($ca_id, $custAddress)
{
# set up address update
	$myQuery = "UPDATE `custAddress` ";
	$myQuery .=  " set `ca_addresstype` = ?, ";
	$myQuery .= " `ca_streetaddress`  =  ?, "; 
	$myQuery .= " `ca_city` = ?, ";
	$myQuery .=  " `ca_state_id` = ?, ";
	$myQuery .=  " `ca_zip` = ?, ";
	$myQuery .=  " `ca_email` = ?, "; 
	$myQuery .=  " `ca_phone` = ?, ";
	$myQuery .=  " `ca_cell` = ? ";	
	$myQuery .=  "WHERE `ca_id` = ? ;";
 
   $stat = query($myQuery, $custAddress['addresstype'], $custAddress['streetaddress'], 
            $custAddress['city'], $custAddress['state_id'], $custAddress['zip'], $custAddress['email'], 
            $custAddress['phone'], $custAddress['cell'], $ca_id); 
	
	
	if (!($stat === false))
	{
		return 'addrsupdated';
	}
	else
	{
		return 'addrsnupdated';
	}
		
}

function deleteCustAddress($ca_id)
{
# set up address update
	$myQuery = "DELETE from `custAddress` ";
	$myQuery .=  "WHERE `ca_id` = ? ;";
 
   $stat = query($myQuery, $ca_id); 
	
	
	if (!($stat === false))
	{
		return 'addrsdeleted';
	}
	else
	{
		return 'addrsndelted';
	}
		
}

function getOrderBillingAddress($o_id, &$ordrAddress)
{
# set up query for address
	$myQuery = "SELECT `o_id`, `oa_id`, `oa_addressType`, `oa_fullName`, `oa_streetAddress`, `oa_city`, ";
	$myQuery .=  " `oa_state_id`, `oa_zip`, `oa_email`, `oa_phone`, `oa_cell` ";
	$myQuery .=  "FROM `orderAddress` ";
	$myQuery .=  "where `o_id` = ? ";
	$myQuery .=  " AND `oa_addresstype` IN ('b', 's') ;";
 
    $namepassexists = false;
    
   $result = query($myQuery,  $o_id); 
   
   if (!($result === false))
   {
       $rows = count($result);
       if ($rows > 0)
       {
		    $row = $result[0];
   		    if ($o_id == $row["o_id"])
			{
				$namepassexists = true;
				$ordrAddress['oa_id'] = $row["oa_id"];
				$ordrAddress['addresstype'] = $row["oa_addressType"];
				$ordrAddress['fullName'] = $row["oa_fullName"];
				$ordrAddress['streetAddress'] = $row["oa_streetAddress"];
				$ordrAddress['city'] = $row["oa_city"];
				$ordrAddress['state_id'] = $row["oa_state_id"];
				$ordrAddress['zip'] = $row["oa_zip"];
				$ordrAddress['email'] = $row["oa_email"];
				$ordrAddress['phone'] = $row["oa_phone"];
				$ordrAddress['cell'] = $row["oa_cell"];
			}
  			
 		}
		
		if ($namepassexists == true)
		{
			return 'addrsfnd';
		}
		else
		{
	   		return 'addrsntfnd';
   		}	
   }
   else
   {
		return 'addrsntfnd';
   }	
		
}
function getOrderShippingAddress($o_id, &$ordrAddress)
{
# set up query for shipping address
	$myQuery = "SELECT `o_id`, `oa_id`, `oa_addressType`, `oa_fullName`, `oa_streetAddress`, `oa_city`, ";
	$myQuery .=  " `oa_state_id`, `oa_zip`, `oa_email`, `oa_phone`, `oa_cell` ";
	$myQuery .=  "FROM `orderAddress` ";
	$myQuery .=  "where `o_id` = ? ";
	$myQuery .=  " AND `oa_addresstype` = 'm' ;";
	
	$namepassexists = false;
 
    $result = query($myQuery,  $o_id); 
   
   if (!($result === false))
   {
       $rows = count($result);
       if ($rows > 0)
       {
		    $row = $result[0];
            if ($o_id == $row["o_id"])
			{
				$namepassexists = true;
				$ordrAddress['oa_id'] = $row["oa_id"];
				$ordrAddress['addresstype'] = $row["oa_addressType"];
				$ordrAddress['fullName'] = $row["oa_fullName"];
				$ordrAddress['streetAddress'] = $row["oa_streetAddress"];
				$ordrAddress['city'] = $row["oa_city"];
				$ordrAddress['state_id'] = $row["oa_state_id"];
				$ordrAddress['zip'] = $row["oa_zip"];
				$ordrAddress['email'] = $row["oa_email"];
				$ordrAddress['phone'] = $row["oa_phone"];
				$ordrAddress['cell'] = $row["oa_cell"];
			}
  			
 		}
		
		if ($namepassexists == true)
		{
			return 'addrsfnd';
		}
		else
		{
	   		return 'addrsntfnd';
   		}	
   }
   else
   {
	   
		return 'addrsntfnd';
   }	
}
function addOrderAddress($o_id, $ordrAddress)
{
# set up address insert
	$myQuery = "INSERT INTO `orderAddress` (`o_id`, `oa_addresstype`, ";
	$myQuery .= "`oa_fullName`, `oa_streetAddress`, `oa_city`, ";
	$myQuery .=  " `oa_state_id`, `oa_zip`, `oa_email`, `oa_phone`, `oa_cell` )";
	$myQuery .=  "VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
 
   $stat = query($myQuery, $o_id, $ordrAddress['addresstype'], $ordrAddress['fullName'], 
            $ordrAddress['streetAddress'], $ordrAddress['city'], $ordrAddress['state_id'], 
            $ordrAddress['zip'], $ordrAddress['email'], 
            $ordrAddress['phone'], $ordrAddress['cell']); 
	
	
	if (!($stat === false))
	{
		return 'addrsinserted';
	}
	else
	{
		return 'addrsninserted';
	}
		
}	
function updateOrderAddress($oa_id, $ordrAddress)
{
# set up address update
	$myQuery = "UPDATE `orderAddress` ";
	$myQuery .=  " set `oa_addresstype` = ?, ";
	$myQuery .= " `oa_fullName`  =  ?, "; 
	$myQuery .= " `oa_streetAddress`  =  ?, "; 
	$myQuery .= " `oa_city` = ?, ";
	$myQuery .=  " `oa_state_id` = ?, ";
	$myQuery .=  " `oa_zip` = ?, ";
	$myQuery .=  " `oa_email` = ?, "; 
	$myQuery .=  " `oa_phone` = ?, ";
	$myQuery .=  " `oa_cell` = ? ";	
	$myQuery .=  "WHERE `oa_id` = ? ;";
 
   $stat = query($myQuery, $ordrAddress['addresstype'], $ordrAddress['fullName'], 
            $ordrAddress['streetAddress'], $ordrAddress['city'], $ordrAddress['state_id'], 
            $ordrAddress['zip'], $ordrAddress['email'], 
            $ordrAddress['phone'], $ordrAddress['cell'], $oa_id); 
	
	
	if (!($stat === false))
	{
		return 'addrsupdated';
	}
	else
	{
		return 'addrsnupdated';
	}
		
}

function deleteOrderAddress($oa_id)
{
# set up address update
	$myQuery = "DELETE from `orderAddress` ";
	$myQuery .=  "WHERE `oa_id` = ? ;";
 
   $stat = query($myQuery, $oa_id); 
	
	
	if (!($stat === false))
	{
		return 'addrsdeleted';
	}
	else
	{
		return 'addrsndelted';
	}
		
}


function buildStatmentDetail($_o_id)
{
	# set up query for items ordered by this ordromer

	$myQuery = "SELECT a.`oi_id` as oi_id, a.`title_id` as `title_id`, ";
	$myQuery .=  "     b.`title` as title, b.`price` as price, ";
	$myQuery .=  "     b.`unit` as unit, a.`quantity` as quantity ";
	$myQuery .=  " FROM `orderitem` a, `titles` b ";
	$myQuery .=  " WHERE a.`title_id` = b.`title_id`";
	$myQuery .=  " and a.`o_id` = ? order by a.`oi_id`;";
	  	
	  	
    $result = query($myQuery,  $_o_id); 
   
    $orderItems = [];
   
    if (!($result === false))
    { 
        $rows = count($result);
#        echo("<p class='error'>row count = $rows </p>");
        
        if ($rows > 0)
        {
            foreach ($result as $row)
            {
            $orderItems[] = ["item_id" => $row["oi_id"],
			                    "title_id" => $row["title_id"], 
		                       	"title" => $row["title"], 
		                       	"price" => $row["price"], 
			                    "unit" => $row["unit"],  
		                       	"quantity" => $row["quantity"]];
		                       	
		    }
		}
       	else
       	{

		    apologize("No order items currently available, try adding an item please!");
       	} 
	}
   	else
   	{

		apologize("No order items currently available, try adding an item please!");
   	}
   	
   	return $orderItems;
}
	
?>
