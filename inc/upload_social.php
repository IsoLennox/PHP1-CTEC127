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


//// Allow certain file formats
//if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "docx" && $imageFileType != "txt" && $imageFileType != "csv" && $imageFileType != "PNG" && $imageFileType != "css" && $imageFileType != "php" && $imageFileType != "html" && $imageFileType != "rtf" 
//&& $imageFileType != "gif" ) {
//    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//    $_SESSION["message"] = "Sorry, only JPG, JPEG, PNG, GIF, DOCX, TXT, PHP, CSS, HTML & RTF files are allowed.";
//    $uploadOk = 0;
//}


// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "PNG" && $imageFileType != "gif" ) {
    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $_SESSION["message"] = "Sorry, only JPG, JPEG, PNG, & GIF files are allowed.";
    $uploadOk = 0;
}

 



// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $_SESSION["message"] .= "    Your file was not uploaded.";
    redirect_to("social.php");
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        //FILE UPLOADED! 
        
        
        
        //WRITE FILE TO TABLE
       
            $user_id = $_SESSION["user_id"];
            $dateTimeVariable = date("F j, Y \a\t g:ia");
            $query  = "INSERT INTO social ("; 
    $query .= " name, datetime, avatar, content ";
    $query .= ") VALUES ("; 
    $query .= " '{$name}', '{$dateTimeVariable}', '{$target_file}', '{$content}' ";
    $query .= ")";
    $result = mysqli_query($connection, $query);
         

    if ($result && mysqli_affected_rows($connection) == 1) {
      // Success: file uploaded/path written.
        
       
        
      $_SESSION["message"] = "Comment Successful!";      
        
      redirect_to("social.php");
   // } //END IF RESULT SUCCESS
    }else {
      // Failure
      $_SESSION["message"] = "File uploaded. Filepath NOT written.".$target_file." ".$user_id;
        redirect_to("social.php");
    }
        
    } else {
        echo "Sorry, there was an error uploading your file.";
        redirect_to("social.php");
    }
}
    

?>