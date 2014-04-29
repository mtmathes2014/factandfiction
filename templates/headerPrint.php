<?php
     /**
     * headerPrint.php
     *
     * Frank E. Mathes
     * fmathes1@hotmail.com
     *
     * This template displays fact and fiction book store web page print header.
     *
     * This project is being created as part of a final project for CS50x and
     * launch code final project spring of 2014.
     */

?>
<!DOCTYPE html>

<html>

    <head>
       
         <link href="css/print.css" rel="stylesheet" >
            
        <?php if (isset($title)): ?> 
            <title><?= $title ?></title> 
        <?php else: ?>
            <title>Fact And Fiction</title>
        <?php endif ?> 
 
    </head>
    <body >   
    <div id="container">   
     
    <?php if (isset($title)): ?>
         <h2><?= htmlspecialchars($title) ?></h2>
    <?php endif ?>
  
    

