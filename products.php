<?php include("inc/header.php"); ?> 
<!--Main Page wrapper-->
<!--products.php-->
<div id="page">
<!--echo any errors if redirected here-->
<?php echo message(); ?>
<h2><span id="admin">
   <?php 

//if admin, display "admin" in header
if($admin==1){
    echo "Editing";
}   ?></span>  Products </h2>

 



<!--
remaining reqs:

 -list of products: image,title,image from db.products
 -links to product_single page with CRUD
 
 
-->

     <?php 
if($admin==1){
?>
 <hr/>
     <h2>Add Product</h2>
 
    <form action="create.php?products" method="post" enctype="multipart/form-data">
 
        <p>Product Name:
        <input type="text" name="title" value="" /> </p>
        
         <p>Description: <br/>
    <textarea name="content" value="" rows="2" cols="100" maxlength="500"></textarea></p>
         Product Image:
    <input type="file" name="image" id="fileToUpload">
        <h6>Accepted file types: png, jpg, and gif</h6>
        <br/>
        <p>Price:
        <input type="text" name="price" value="" /> </p>
         <br/>
      <input type="submit" name="submit" value="Create" />
    </form>
 <br/>
 <br/>
 <hr/>
 <?php
} ?>




  <?php         

$q = "SELECT * FROM products ORDER BY id DESC"; 
$r = @mysqli_query ($connection, $q); 

if($r){
//    $array = mysqli_fetch_assoc($r);

foreach($r as $row){

   
      ?> 
    <hr/> 
<div class="full">
<section class="thumbnail"><a href="view_product.php?product_id=<?php echo $row['id']; ?>"><img src="<?php echo $row['filepath']; ?>" title="<?php echo $row['name']; ?>" /></a></section>
<section class="product_info">
    <h2><a href="view_product.php?product_id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></h2>
  <p><?php echo $row['description']; ?></p>
 
  </section>   <span id="right"><?php echo $row['price']; ?></span>
  
  </div>
  <br/>
<br/>
<?php 
if($admin==1){
    //if admin, give edit/delete option
    echo "<span class=\"edit\">";
    echo "<a href=\"edit.php?product_id=".$row['id']."\">Edit</a> |";
    echo "<a onclick='return confirm(\"DELETE this article?\");' href=\"delete.php?product_id=".$row['id']."\">Delete</a>";    
    echo "</span>"; 
} 

    }//end foreach
}//end query db for PRODUCTS
?>

 
    
    
    
</div> <!-- end #page -->
<?php include("inc/footer.php"); ?> 