<?php include("inc/header.php"); ?> 
<!--Main Page wrapper-->
<!--admin.php-->
<div id="page">
<!--echo any errors if redirected here-->
<?php echo message(); ?>
<h2>Admin Panel</h2>
<!--
remaining reqs:

CRUD for:
news
products
home
social
 
 
-->
    <a href="home.php?admin=1"><div class="admin"><p><i class="fa fa-home"></i> Manage Home Page</p></div></a>
    
    <a href="products.php?admin=1"><div class="admin"><p><i class="fa fa-tag"></i> Manage Products Page</p></div></a>
    
    <a href="social.php?admin=1"><div class="admin"><p><i class="fa fa-user"></i> Manage Social Page</p></div></a>
    
    <a href="news.php?admin=1"><div class="admin"><p><i class="fa fa-newspaper-o"></i> Manage News Page</p></div></a>
    
        <a href="subscriptions.php?admin=1"><div class="admin"><p><i class="fa fa-users"></i> Manage Subscriptions</p></div></a>
        
        
                <a href="order_log.php?admin=1"><div class="admin"><p><i class="fa fa-shopping-cart"></i> View Orders</p></div></a>
    
<!--    <a href="orders.php?admin=1"><div class="admin"><p><img src="img/icons/cart.png" title="Edit Orders Form" /> Manage Orders Form</p></div></a>-->
 
 

    
    

 



 

</div> <!-- end #page -->
<?php include("inc/footer.php"); ?> 