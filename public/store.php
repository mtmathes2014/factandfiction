<?php

    /**
     * store.php
     *
     * Frank E. Mathes
     * fmathes1@hotmail.com
     *
     * This program creates the store page for a sample book store
     * website. Creates a list of available books for the visitor, 
     * or, member to review.
     *
     * This project is being created as part of a final project for CS50x and
     * launch code final project spring of 2014.
     */
 
    require_once("../includes/config.php");

    $myQuery = "SELECT title_id, title, price, notes,  quantityOnHand, unit ";
    $myQuery .=  " FROM titles  ";
    $myQuery .=  " WHERE ";
    $myQuery .= "quantityOnHand > 0";
    $myQuery .=  ";";
     
    $results  = query($myQuery);

    # count the number of rows returned...should more than zero messages in there...
    if (!($results === false))
    {
        $rows = count($results);
#        echo("<p class='error'>row count = $rows </p>");
       
        if ($rows > 0)
        {
            $books = [];
            foreach ($results as $row)
            {
		       	$books[] = ["title_id" => $row['title_id'], 
		                    "title" => $row['title'],
		                   	"price" => $row['price'],
			                "notes" => $row['notes'], 
		                   	"quanttityOnHand" => $row['quantityOnHand'],
		                   	"unit" => $row['unit']];
           	}	
           	// render book list
            render("store.php", ["stat" => $stat, "title" => "Book Inventory", "books" => $books]);
       	}
       	else
       	{
            apologize("Sorry no books in inventory.");
        }
    }    
    else
    {
        apologize("Store closed at this time.");
    }

?>

