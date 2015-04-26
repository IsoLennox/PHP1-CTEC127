<?php include("inc/header.php");
    
if(empty($_POST['name']) || empty($_POST['content'])){
    
    $_SESSION['message']="Oops! You forgot to fill something out!";
    redirect_to("social.php");

}
$name = $_POST["name"]; 
$content = $_POST["content"]; 


    
    if(empty($title)){ 
        $title="Untitled";
    }


    
 
  // Process the form
  
 
      
          //CHECK FOR DIR
    
    $target_dir = "uploads/";
    if (!file_exists($target_dir)) {
        
        //CREATE DIR and FILE 
    mkdir($target_dir, 0777, true);
        
    require_once("inc/upload_social.php"); 
 
        
        
}else{
        
        //DIRECTORY EXISTS. UPLOAD IMAGE
    
        require_once("inc/upload_social.php"); 
    

}//end check for directory