<?php include("inc/header.php"); 


//Create subscription from form 
 
  
  // validations
  $required_fields = array("name","email");
  validate_presences($required_fields);
  
 
  if (empty($errors) ) {
    // Perform Create

    
      $name = mysql_prep($_POST["name"]);
      $email = mysql_prep($_POST["email"]);

    
    //check that email entered does not exist
    
    $query  = "select * from subscribed WHERE email='{$email}'"; 
    $email_found = mysqli_query($connection, $query);
        $email_array= mysqli_fetch_assoc($email_found);
        
        if (empty($email_array)){
            
            //email not taken
 
             
    $query  = "INSERT INTO subscribed (";
    $query .= "  name, email";
    $query .= ") VALUES (";
    $query .= "  '{$name}','{$email}'";
    $query .= ") ";
    $new_user_created = mysqli_query($connection, $query);
            
            
            if ($new_user_created) {
                
$subscription_id_query="SELECT * FROM subscribed WHERE email='{$email}'";
        $subscription_found= mysqli_query($connection, $subscription_id_query);
        $subscription_array=mysqli_fetch_assoc($subscription_found);
        $subscription_id=$subscription_array['id'];
        
         
                 
            // Success
      $_SESSION["message"] = "Thanks For Subscribing, ".$subscription_array['name']."! An email will be sent to: ".$subscription_array['email']."";
                
                
                 
    //SEND EMAIL!! 
                
                //ONLY WORKS ON SERVER, DUH.
                
//$email_query  = "SELECT * FROM subscribed WHERE email={$email}"; 
//$email_found = mysqli_query($connection, $email_query);  
//
//        if($email_found){
//            
//            $member= mysqli_fetch_assoc($email_found);
//
//            foreach($email_found as $members){
//                $name = $members['name'];
//                $recipient = $members['email'];
//
//                $formcontent=" \r\n More updates coming your way! \r\n";
//                $subject = "Thanks For Subscribing!";
//                $mailheader = "You subscribed to Isobel's PHP2 Final Project";
//                mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
//            }
//     
//        }//end send email
                
                
                
            
            // Take user home
            redirect_to("home.php");
            
    }
            }else{

            $_SESSION["message"] = "You Have Already Subscribed With This Email!";
                redirect_to("home.php");
            }

            
        }else{
            $_SESSION["message"] = "You must fill out your Name AND Email!";
      redirect_to("home.php");
        }
 


?> 