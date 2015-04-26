<?php include("inc/header.php"); ?> 
<!--Main Page wrapper-->
<!--social.php-->
<div id="page">
<!--echo any errors if redirected here-->
<?php echo message(); ?>

 
  <?php  
if(isset($_GET['order_id'])){
$order_id=$_GET['order_id'];

echo "<h2>Thank Your For Your Order!</h2>";
    
$q = "SELECT * FROM orders WHERE id={$order_id}"; 
$r = @mysqli_query ($connection, $q); 

if($r){ 
foreach($r as $row){

 //SHOW ORDER INFO
    echo "<h2>Order ID#".$order_id."</h2>";
    echo "<h2>".$row['first_name']." ".$row['last_name']."</h2>";
    echo "<p>".$row['address']."</p>"; 
    echo "<p>".$row['city'].", ".$row['state']."</p>"; 
    echo "<p>".$row['zip']."</p>";
    
    
    //GET PRODUCTS IN THIS ORDER
$q2 = "SELECT * FROM orders_products WHERE order_id={$order_id}"; 
$r2 = @mysqli_query ($connection, $q2); 

if($r2){
    $products=mysqli_fetch_assoc($r2);
    
     
foreach($r2 as $row){
 
 
    //GET PRODUCT INFO  
    $q3 = "SELECT * FROM products WHERE id={$row['product_id']}"; 
    $r3 = @mysqli_query ($connection, $q3); 

    if($r3){ 
     
        foreach($r3 as $row){
            echo "<a href=\"view_product.php?product_id=".$row['id']."\"> ".$row['name']."</a> ".$row['price']."<br/>";
        }
    }else{
    echo "No products were found2!";
    }


}//end loop through orders_products table
}else{
    echo "No products were found!";
}
    
 
  }//end foreach
}else{
    echo "This order was not found!";
}//end query db for social posts
    
}else{

   redirect_to("orders.php");
}//end if isset
?>

</div> <!-- end #page -->
<?php include("inc/footer.php"); ?> 