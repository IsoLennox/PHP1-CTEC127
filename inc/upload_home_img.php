<?php

$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);

}
// Check if file already exists
if (file_exists($target_file)) {
   // echo "Sorry, FILE NAME already exists.";
    $_SESSION["message"] = "Sorry, FILE NAME already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["image"]["size"] > 5000000) {
    //echo "Sorry, your file is too large.";
    $_SESSION["message"] = "Sorry, your file is too large. 5000kb is the max file size.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "PNG" && $imageFileType != "gif" ) {
    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $_SESSION["message"] = "Sorry, only JPG, JPEG, PNG, & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $_SESSION["message"] .= "    Your file was not uploaded.";
    redirect_to("home.php?admin=1");
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        //FILE UPLOADED! 
        
        
        
        //INSERT INTO HEADERS TABLE

        
        $query  = "INSERT INTO headers (";
    $query .= "  filepath";
    $query .= ") VALUES (";
    $query .= " '{$target_file}'";
    $query .= ")";
        $result = mysqli_query($connection, $query);
        
        

    if ($result && mysqli_affected_rows($connection) == 1) {
 
        
        
        
        //GET HEADER ID
        
        $headerquery  = "SELECT * FROM headers ORDER BY id DESC LIMIT 1"; 
        
    $headerresult = mysqli_query($connection, $headerquery);
        
        if($headerresult){
            
            $header_array=mysqli_fetch_assoc($headerresult);
        $header_id=$header_array['id'];
                        //UPDATE TABLE
       
    
    $query  = "UPDATE home_page_content SET ";
    $query .= "content = '{$header_id}' ";
    $query .= "WHERE id = 6 ";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_affected_rows($connection) == 1) {
      // Success
      $_SESSION["message"] = "Changes Made!";
      redirect_to("home.php?admin=1");
    } else {
      // Failure
      $_SESSION["message"] = "Changes Failed";
        redirect_to("home.php?admin=1");
        
    }//END ATTEMPT TO WRITE TO TABLE
        
        
        } else {
      // Failure
      $_SESSION["message"] = "Changes Failed!";
        redirect_to("home.php?admin=1");
        }
        
                

        
        
    } else {
      // Failure
      $_SESSION["message"] = "Changes Failed";
        redirect_to("home.php?admin=1");
        
    }//END ATTEMPT TO WRITE TO TABLE
        
 
        
        
        
    } else {
        echo "Sorry, there was an error uploading your file.";
        redirect_to("home.php?admin=1");
    }//END ATTEMPT TO UPLOAD FILE
}
    

?>