<?php
//if(isset($_GET['$title'])){
//    $title=$_GET['$title'];
//}else{
//    $title="Untitled.";
//}
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
//    if($check !== false) {
//        //echo "File is an image - " . $check["mime"] . ".";
//        $uploadOk = 1;
//      
//        
//    } else {
//       // echo "File is not an image."; 
//        $_SESSION["message"] = "File is not an image.";
//        $uploadOk = 0;
//    }
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
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "docx" && $imageFileType != "txt" && $imageFileType != "csv" && $imageFileType != "PNG" && $imageFileType != "css" && $imageFileType != "php" && $imageFileType != "html" && $imageFileType != "rtf" 
&& $imageFileType != "gif" ) {
    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $_SESSION["message"] = "Sorry, only JPG, JPEG, PNG, GIF, DOCX, TXT, PHP, CSS, HTML & RTF files are allowed.";
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "PNG" ) {
    //file is a document
    $type = 1;
}else{
    $type=0;
}

//if($imageFileType != "docx" && $imageFileType != "txt" && $imageFileType != "csv" && $imageFileType != "rtf" ) {
//    //file is an image
//    $type = 0;
//}



// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $_SESSION["message"] .= "    Your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        //FILE UPLOADED!
        //echo "The file ". $target_file. " has been uploaded.";
       
            $user_id = $_SESSION["user_id"];
            $company_id = $_SESSION["company_id"];
       $dateTimeVariable = date("F j, Y \a\t g:ia");
            $query  = "INSERT INTO files (";
    $query .= "  title, company_id, author_id, filepath, datetime, type";
    $query .= ") VALUES (";
    $query .= "  '{$title}',{$company_id},{$user_id}, '{$target_file}', '{$dateTimeVariable}', {$type} ";
    $query .= ")";
    $result = mysqli_query($connection, $query);
         

    if ($result && mysqli_affected_rows($connection) == 1) {
      // Success: file uploaded/path written.
        
        //create notifications:
           
        //START
        
//        table: files
//        $title
//        $company_id
//        author_id= $user_id

        
        
                //get file just inserted
        $file_query  = "SELECT * FROM files WHERE title='{$title}' ORDER BY id DESC LIMIT 1"; 
        $file_retrieved = mysqli_query($connection, $file_query);
        
        
        
        if($file_retrieved){
        $file_array= mysqli_fetch_assoc($file_retrieved);
        $file_title=$file_array['title'];
        $file_author=$file_array['author_id'];
        $company_id_array=$file_array['company_id'];
        
          $notify_query  = "SELECT * FROM employees WHERE company_id={$company_id}"; 
        $notify_found = mysqli_query($connection, $notify_query);  

        if($notify_found){
            
            
            
        foreach($notify_found as $send_to){   
            
            
        
          //Success, send notification to employees: IF not you making a comment on your own file. 
        
        $notification_content = mysql_prep("<img src=\"img/icons/tiny-comments.png\" />  New File Upload: '<a href=\"file_single.php?file_id=".$file_array['id']."\">$file_title</a>'!");
        
     //create notification
    $notifyquery  = "INSERT INTO notifications (";
    $notifyquery .= "  user_id, datetime, content";
    $notifyquery .= ") VALUES (";
    $notifyquery .= " {$send_to['id']},'{$dateTimeVariable}', '{$notification_content}'";
    $notifyquery .= ") ";
    $new_notification_created = mysqli_query($connection, $notifyquery);  
        
        
                
                //  CREATE NOTIFICATION +1 count
     
            $increment  = "SELECT * FROM notify_count WHERE user_id={$send_to['id']}"; 
        $increment_found = mysqli_query($connection, $increment);  
                
            if(!empty($increment_found)){
                $increment_update  = "UPDATE notify_count SET count=count+1 WHERE user_id={$send_to['id']}"; 
        $increment_updated = mysqli_query($connection, $increment_update);
                    
                }
      
        //  END CREATE NOTIFICATION count
        
        
                        
 //SEND EMAIL 
                
//        $email_query  = "SELECT * FROM employees WHERE id={$send_to['id']}"; 
//        $email_found = mysqli_query($connection, $email_query);  
//
//        if($email_found){
//            
//    $author= mysqli_fetch_assoc($email_found);
    //$name = $send_to['first_name'];
    $recipient = $send_to['email'];

$formcontent=" \r\n Go to Arbytes to view new file.\r\n";
$subject = "Arbytes: New File Upload";
$mailheader = "New File uploaded in your group on Arbytes! \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
        
     
//            }//end send email
            
            
            
            
            
            
            
            }//end foreach
            
            
              }//end all employees
        }//end if file exists/retrieved
        
        
      $_SESSION["message"] = "File Upload Successful!";      
        
      redirect_to("files.php");
   // } //END IF RESULT SUCCESS
    }else {
      // Failure
      $_SESSION["message"] = "File uploaded. Filepath NOT written.";
    }
        
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
    

?>