<?php include("inc/header.php"); ?> 
<?php 

     
if(isset($_GET['news'])){
    // CREATE NEWS ARTICLE 
 

    $title = mysql_prep($_POST["title"]);
    $content = mysql_prep($_POST["content"]);
 
    $dateTimeVariable = date("F j, Y  g:ia");
      //create user
    $query  = "INSERT INTO news (";
    $query .= "  datetime, content, title ";
    $query .= ") VALUES (";
    $query .= "  '{$dateTimeVariable}', '{$content}','{$title}' ";
    $query .= ") ";
    $new_news_created = mysqli_query($connection, $query);
      
    
      
  
    if ($new_news_created) {
        // Success
      $_SESSION["message"] = "Article Created!";
      redirect_to("news.php"); 
        
    }
    
}


 


if(isset($_GET['products'])){
    // CREATE PRODUCT 
 
    
   //Get Product INFO
    
$title = $_POST["title"]; 
$content = $_POST["content"]; 
$price = $_POST["price"]; 


    
    if(empty($title)){ 
        $title="Untitled";
    }

          //CHECK FOR DIR
    $target_dir = "uploads/";
    if (!file_exists($target_dir)) {
        
        //CREATE DIR and FILE 
    mkdir($target_dir, 0777, true);   
    require_once("inc/upload_product.php"); 

}else{ 
        //DIRECTORY EXISTS. UPLOAD IMAGE
        require_once("inc/upload_product.php"); 
}//end check for directory
    
    
    
    
    
}