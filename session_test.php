<?php include("inc/header.php");  ?> 
 
  <div id="page"> 
 
 
 
 <?php

if(!isset($_SESSION["cart"])){
//Set array
$array = array();

}else{

    $array = $_SESSION["cart"];

}

  

    //ADD TO ARRAY
if(isset($_GET['cart'])){

    array_push($array, $_GET['cart']);
     
    // Set session variable
    $_SESSION["cart"] = $array; 
     
    
 

}//end submit

print_r($_SESSION['cart']);
//    print_r($array);

?>
 <br/>
 <h2>Products</h2>
 <a href="session_test.php?cart=1">Item 1</a><br/>
 <a href="session_test.php?cart=2">Item 2</a><br/>
 <a href="session_test.php?cart=3">Item 3</a><br/>
 <a href="session_test.php?cart=4">Item 4</a><br/>

 
</div> <!-- end #page -->
<?php include("inc/footer.php"); ?> 