<?php require_once("functions/session.php"); 
require_once("functions/functions.php"); 
require_once("functions/db_connection.php"); 
require_once("functions/validation_functions.php"); 

//check to see if came from admin page
if(isset($_GET['admin'])){
    if($_GET['admin']==1){
    $admin=1;
    }else{
    $admin=0;
    }
    }else{
    $admin=0;
}

//SHOPPING CART

if(!isset($_SESSION["cart"])){
//Set array
$array = array();

}else{
    $array = $_SESSION["cart"];
}
?>
<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     
     <title>CTEC127 Final</title> 
     <link rel="stylesheet" href="css/style.css">
     <script src="js/jquery_2.1.1.js"></script>
     <link href='http://fonts.googleapis.com/css?family=Merriweather:400,400italic,900italic,900' rel='stylesheet' type='text/css'>
 <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
 
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<!--
    Author: Isobel Lennox
    Created: Winter 2015
    For: CTEC 127 Finl Project 
-->
 
    
 
 

 </head>
 <body> 
    <header> 
  <h1><a href="home.php">CTEC Solutions</a> <span id="admin">
   <?php 

//if admin, display "admin" in header
if($admin==1){
    echo "Admin";
}   ?></span></h1>
   
<!--   <a id="logout" class="right" href="logout.php"><img src="img/icons/logout.png" title="Log Out" /> Logout</a> -->
   
   
   
     	<ul>
     	
 
<li><a href="home.php"><i class="fa fa-home"></i>
 Home</a></li>
<li><a href="products.php"><i class="fa fa-tag"></i>
 Products</a></li>
<li><a href="social.php"><i class="fa fa-user"></i>
 Social</a></li>
<li><a href="news.php"><i class="fa fa-newspaper-o"></i>
 News</a></li>
<li><a href="shopping_cart.php"><i class="fa fa-shopping-cart"></i>
View Cart</a></li>
 
<!--
 <li><a href="orders.php"><i class="fa fa-shopping-cart"></i>
 Order</a></li>
-->
<li><a href="admin.php"><i class="fa fa-cog"></i>
 Admin Panel</a></li>
 
       </ul> 
     
     
     
    </header>
 