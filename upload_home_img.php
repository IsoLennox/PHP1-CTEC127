<?php include("inc/header.php");
    
//UPLOAD home_page_content rows #4 or #5 (images) depending on which form got submitted

//home_page_content=row6
$row_id=$_POST['row_id'];
//CHECK FOR DIR
    
    $target_dir = "uploads/";
    if (!file_exists($target_dir)) {
        
        //CREATE DIR and FILE 
    mkdir($target_dir, 0777, true);
        
    require_once("inc/upload_home_img.php"); 
 
        
        
}else{
        
        //DIRECTORY EXISTS. UPLOAD IMAGE
    
        require_once("inc/upload_home_img.php"); 
    

}//end check for directory