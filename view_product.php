<?php include("inc/header.php"); ?> 
<!--Main Page wrapper-->
<!--products.php-->
<div id="page">
<!--echo any errors if redirected here-->
<?php echo message(); ?>

  <?php         
$product_id=$_GET['product_id'];
$q = "SELECT * FROM products WHERE id={$product_id} ORDER BY id DESC"; 
$r = @mysqli_query ($connection, $q); 

if($r){
//    $array = mysqli_fetch_assoc($r);

foreach($r as $row){

   
      ?>  
      <h2><?php echo $row['name']; ?></h2>
 
<img src="<?php echo $row['filepath']; ?>" title="<?php echo $row['name']; ?>" /> 
 
<h3> <?php echo $row['price']; ?> </h3>
  <p><?php echo $row['description']; ?></p>
 
<!--<p>At checkout select Item <strong># <?php echo $row['id']; ?> : <?php echo $row['name']; ?></strong> </p>-->

<a href="shopping_cart.php?add=<?php echo $row['id']; ?>"><i class="fa fa-shopping-cart"></i> Add To Cart</a>


<!--  <div id="createButton"><a href="orders.php">Continue To Checkout  &raquo;</a></div>-->
 
  <br/>
<br/>
<?php 
 

    }//end foreach
}//end query db for PRODUCT
?>

</div> <!-- end #page -->
<?php include("inc/footer.php"); ?> 