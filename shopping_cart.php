<?php include("inc/header.php");  ?> 
 
  <div id="page"> 
 
 
 
 <?php

    //ADD TO SHOPPING CART ARRAY
if(isset($_GET['add'])){

    array_push($array, $_GET['add']);
     
    // Set session variable
    $_SESSION["cart"] = $array; 
    $_SESSION["message"]="Added To Cart!";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  
}//end submit


    //ADD TO SHOPPING CART ARRAY
if(isset($_GET['remove'])){

//    unset($array, $_GET['remove']);
    unset($array[array_search($_GET['remove'],$array)]);
     
    // Set session variable
    $_SESSION["cart"] = $array; 
    $_SESSION["message"]="Added To Cart!";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  
}//end submit
 ?>
 
 <h2>Shopping Cart</h2>
<?php
if(isset($_SESSION["cart"])){
foreach ($_SESSION["cart"] as $key => $value){
     
    $q = "SELECT * FROM products WHERE id={$value}"; 
    $r = @mysqli_query ($connection, $q); 

    if($r){
        $array = mysqli_fetch_assoc($r);
        echo "".$array['name']." ".$array['price']." <a href=\"shopping_cart.php?remove=".$array['id']."\"><i class=\"fa fa-trash-o\"></i></a><br/>";
    }

}
}else{
    echo "No items in your cart!<br/><Br/>";
}
?>
<br/>
<br/>
<br/>
<div id="createButton"><a href="orders.php">Continue To Checkout  &raquo;</a></div>


 

 
</div> <!-- end #page -->
<?php include("inc/footer.php"); ?> 