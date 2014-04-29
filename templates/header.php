<?php
     /**
     * header.php
     *
     * Frank E. Mathes
     * fmathes1@hotmail.com
     *
     * This template displays fact and fiction book store web page header.
     *
     * This project is being created as part of a final project for CS50x and
     * launch code final project spring of 2014.
     */

?>
<!DOCTYPE html>

<html>

    <head>
       
         <link href="css/main.css" rel="stylesheet" > 
            
        <?php if (isset($title)): ?> 
            <title><?= $title ?></title> 
        <?php else: ?>
            <title>Fact And Fiction</title>
        <?php endif ?> 
 
    </head>
    <body>
        <div id="fb-root"></div>
            <script>
              window.fbAsyncInit = function() {
                FB.init({
                  appId      : '{your-app-id}',
                  status     : true,
                  xfbml      : true
                });
              };

              (function(d, s, id){
                 var js, fjs = d.getElementsByTagName(s)[0];
                 if (d.getElementById(id)) {return;}
                 js = d.createElement(s); js.id = id;
                 js.src = "//connect.facebook.net/en_US/all.js";
                 fjs.parentNode.insertBefore(js, fjs);
               }(document, 'script', 'facebook-jssdk'));
            </script>      
        <div id="container">
           <!-- <a name="top"></a> -->
            <div id="pageheader">
                <img src="graphics/header01.jpg" width="800" height="125" alt="Fact And Fiction Logo">
            </div>
            <div class="navigation">

	            <a href="index.php">Home</a> | <a href="store.php">Books </a>  
	            <?php if (isset($stat)): ?>
	                <?php if ($stat == 'logout'): ?>
	                    | <a href="shoppingCart.php"> Shopping Cart </a>  | 
	                    <a href="checkOut.php"> Check Out </a> | 
	                    <!-- <a href="checkOutaccount.php"> My Account </a> | -->
	                    <a href="logout.php"> Log Out</a>
	                 <?php else: ?>
	                    | <a href="login.php"> Log In</a>
                     <?php endif ?>
                <?php endif ?>
            </div>       
    <?php if (isset($title)): ?>
         <h2><?= htmlspecialchars($title) ?></h2>
    <?php endif ?>
  
    

