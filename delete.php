<?php include("inc/header.php"); 


if(isset($_GET["article_id"])){

//DELETE NEWS ARTICLE
    
  $article_id=$_GET["article_id"];

  $query = "DELETE FROM news WHERE id = {$article_id} LIMIT 1";
  $result = mysqli_query($connection, $query);

  if ($result && mysqli_affected_rows($connection) == 1) {
    // Success
    $_SESSION["message"] = "Article Deleted!";
    redirect_to("news.php?admin=1");
  } else{
    // Failure
    $_SESSION["message"] = "Could not delete this article";
    redirect_to("news.php?admin=1");
  }

}//END DELETE NEWS ARTICLE



if(isset($_GET["header"])){

//DELETE NEWS ARTICLE
    
  $header_id=$_GET["header"];

  $query = "DELETE FROM headers WHERE id = {$header_id} LIMIT 1";
  $result = mysqli_query($connection, $query);

  if ($result && mysqli_affected_rows($connection) == 1) {
      
      
//        $img6 = "SELECT * FROM home_page_content WHERE id=6 LIMIT 1"; 
//        $result6 = @mysqli_query ($connection, $img6); 
//        if($result6){
//            $header_img=mysqli_fetch_assoc($result6);
//            if($header_img['content']==$header_id){
//                //change deleted header image
//                
//            $query  = "UPDATE home_page_content SET ";
//            $query .= "content = '' ";
//            $query .= "WHERE id = 6 ";
//            $query .= "LIMIT 1";
//            $result = mysqli_query($connection, $query);
//
//            if ($result && mysqli_affected_rows($connection) == 1) {
//            // Success
//            $_SESSION["message"] = "Changes Made!";
//            redirect_to("home.php?admin=1");
//            } else {
//            // Failure
//            $_SESSION["message"] = "Changes Failed";
//            redirect_to("home.php?admin=1");
//
//            }
//                
//                
//            }
//        }
      
      
    // Success
    $_SESSION["message"] = "Header Deleted!";
    redirect_to("home.php?admin=1");
  } else{
    // Failure
    $_SESSION["message"] = "Could not delete this header";
    redirect_to("home.php?admin=1");
  }

}//END DELETE HEADER IMAGE




if(isset($_GET["product_id"])){

//DELETE PRODUCT
    
  $product_id=$_GET["product_id"];

  $query = "DELETE FROM products WHERE id = {$product_id} LIMIT 1";
  $result = mysqli_query($connection, $query);

  if ($result && mysqli_affected_rows($connection) == 1) {
       
    // Success
    $_SESSION["message"] = "Product Deleted!";
    redirect_to("products.php?admin=1");
  } else{
    // Failure
    $_SESSION["message"] = "Could not delete this product";
    redirect_to("products.php?admin=1");
  }

}//END DELETE PRODUCT



if(isset($_GET["social_id"])){

//DELETE PRODUCT
    
  $social_id=$_GET["social_id"];

  $query = "DELETE FROM social WHERE id = {$social_id} LIMIT 1";
  $result = mysqli_query($connection, $query);

  if ($result && mysqli_affected_rows($connection) == 1) {
    // Success
    $_SESSION["message"] = "Social Item Deleted!";
    redirect_to("social.php?admin=1");
  } else{
    // Failure
    $_SESSION["message"] = "Could not delete this social item";
    redirect_to("social.php?admin=1");
  }

}//END DELETE PRODUCT



 



    
    


?>