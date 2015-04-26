<?php include("inc/header.php"); ?> 
<!--Main Page wrapper-->
<!--orders_log.php-->
<div id="page">
 
<!--echo any errors if redirected here-->
<?php echo message(); ?>
<!--if coming from admin panel, show "editing"-->

<?php 

 
 
if(isset($_POST['submit'])){
            echo message(); 
  echo form_errors($errors); 
    
 
  //orders SEARCH  
    
    if(isset($_GET['orders'])){
        //$orders_id=$_GET['orders'];
        
                echo message(); 
  echo form_errors($errors); 
        ?>
    <h2>Searching Orders</h2>

    
      <!--  LET USER OR ADMIN SEARCH FOR ORDERS-->
  
          <form id="searchbar" action="search.php?orders" method="post">
        <input type="text" name="query" value="" placeholder="SEARCH BY ORDER ID#" />   
 
<!--        //submit button with font awesome icon-->
      <input type="submit" name="submit" value="&#xf002;" />
        </form> 
        
        
        
       
       <?php
     
        if(preg_match("/[0-9]+/", $_POST['query'])){
             
             $orders_id=$_POST['query'];
            $no_results=4;
             
            //*****SEARCH ORDERS
            
            
            //GET ALL orderS IN orders
        $order_query="SELECT * FROM orders WHERE id={$orders_id}";
        $order_found=mysqli_query($connection, $order_query);
            //GET NUMBER OF RESULTS
            $order_rows = mysqli_num_rows($order_found);
                    if($order_rows>=1){
 
            //orders FOUND 
            
               foreach($order_found as $order){
                   
             //SHOW ORDERS
                        
        echo "<h2>Order ID# ".$order['id']."</h2><br/>";
                   
                           if(!$order['shipped']){
                               
                               if($admin==1){
    echo "<a href=\"edit.php?shipped=".$order['id']."\"><i class=\"fa fa-truck\"></i> Mark As Shipped</a> <br/><br/>";
                               }else{
                                   
    echo "<i class=\"fa fa-truck\"></i> Not Yet Shipped <br/><br/>";
                               
                               }
                           
                           }else{
        echo "<h3 style=\"color:red\"><i class=\"fa fa-truck\"></i> SHIPPED</h3>";
        }
                   
                   
    echo $order['first_name']." ".$order['last_name']."<br/>";
    echo $order['address']." ".$order['city']." ".$order['zip']."<br/><br/>";
        
        //GET PRODUCTS ORDERED
        $products_q = "SELECT * FROM orders_products WHERE order_id={$order['id']}"; 
        $product_results = @mysqli_query ($connection, $products_q);     

        if($product_results){
            
            echo "<strong>Products: </strong><br/>";
            foreach($product_results as $product){
                
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
                        
                        
               }//ens foreach order found
            
          
 
                         
       
        }else{
               //NO RESULTS
                $no_results-=1;
                echo "<br/><Br/>There are no orders found with the ID#: ".$orders_id."";
            }//END SEARCH orders TABLE
        
        
 
        
        
    }else{
        echo "<br/>Please enter an Order ID Number";
        }//END OF orders SEARCH
    
    }
    
     
    
}
?>  

    </div>
<?php include("inc/footer.php"); ?> 