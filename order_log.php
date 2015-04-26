<?php include("inc/header.php"); ?> 
<!--Main Page wrapper-->
<!--orders_log.php-->
<div id="page">
 
<!--echo any errors if redirected here-->
<?php echo message(); ?>
<!--if coming from admin panel, show "editing"-->

<?php 

 
//if admin, display "admin" in header
if($admin==1){
    echo "<h2><span id=\"admin\">Viewing Orders Log</span></h2>";
    echo "<a href=order_log.php?admin=1>All</a> | <a href=order_log.php?admin=1&sort=1>Shipped</a> | <a href=order_log.php?admin=1&sort=0>Unshipped</a><hr/> ";
}

?>

<!--  LET USER OR ADMIN SEARCH FOR ORDERS-->
  
          <form id="searchbar" action="search.php?orders&admin=<?php echo $admin; ?>" method="post">
        <input type="text" name="query" value="" placeholder="SEARCH BY ORDER ID#" />   
 
<!--        //submit button with font awesome icon-->
      <input type="submit" name="submit" value="&#xf002;" />
        </form> 
        
        
   <?php 

 if($admin==1){
//GET ORDERS
    
    if(isset($_GET['sort'])){
        $shipped=$_GET['sort'];
    $q = "SELECT * FROM orders WHERE shipped={$shipped} ORDER BY id DESC"; 
    }else{
$q = "SELECT * FROM orders ORDER BY id DESC"; 
    }
$r = @mysqli_query ($connection, $q);     

if($r){   
    //GET ORDER ID INTO VARIABLE TO PUT INTO PRODUCTS ORDERS JOINT TABLE
//    $order=mysqli_fetch_assoc($r);
    
    foreach($r as $order){
    $order_id=$order['id'];
        
        if(!$order['shipped']){
    echo "<a href=\"edit.php?shipped=".$order['id']."\"><i class=\"fa fa-truck\"></i> Mark As Shipped</a> <br/><br/>";}else{
        echo "<h3 style=\"color:red\"><i class=\"fa fa-truck\"></i> SHIPPED</h3>";
        }
    echo "<strong>Order ID# ".$order_id."</strong><br/>";
    echo $order['first_name']." ".$order['last_name']."<br/>";
    echo $order['address']." ".$order['city']." ".$order['zip']."<br/><br/>";
        
        //GET PRODUCTS ORDERED
        $products_q = "SELECT * FROM orders_products WHERE order_id={$order_id}"; 
        $result = @mysqli_query ($connection, $products_q);     

        if($result){
            
            echo "<strong>Products: </strong><br/>";
            foreach($result as $product){
                
                $product_id=$product['product_id'];
                
                //GET PROFUCT INFO 
        $orders_q = "SELECT * FROM products WHERE id={$product_id} ORDER BY id DESC"; 
        $order_result = @mysqli_query ($connection, $orders_q);     
                
                if($order_result){
                    
                    foreach($order_result as $info){
                    
                    echo "<a href=\"view_product.php?product_id=".$info['id']."\">Product ID# ".$info['id']." ".$info['name']."</a>  - ".$info['price']."<br/>";
                    }
                    
                   
                
                }else{ echo "No Products"; }

                
            
            }
            
            
             echo "<hr/>";
        }else{
        echo "No Products!";
        }
     
    
}//end loop through each order
    }else{
    // ORDER ID NOT FOUND
         echo "You Have No Orders";
         
}//end ceck for order ID
   
    
    }//end make sure is admin
 ?>
 
</div> <!-- end #page -->
<?php include("inc/footer.php"); ?> 