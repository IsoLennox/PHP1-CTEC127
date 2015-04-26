<?php include("inc/header.php");  
 
 
        $header_id=$_GET['header_id'];
        
 
                        //UPDATE TABLE
       
    
    $query  = "UPDATE home_page_content SET ";
    $query .= "content = '{$header_id}' ";
    $query .= "WHERE id = 6 ";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_affected_rows($connection) == 1) {
      // Success
      $_SESSION["message"] = "New Header Set!";
      redirect_to("home.php?admin=1");
    } else {
      // Failure
      $_SESSION["message"] = "Could not choose this header";
        redirect_to("home.php?admin=1");
        
    }//END ATTEMPT TO WRITE TO TABLE
 
                
 
 ?>