<?php require_once("functions/session.php"); 
require_once("functions/functions.php"); 
require_once("functions/db_connection.php"); 
require_once("functions/validation_functions.php"); 


if(isset($_GET['uname'])){
    
    //Gets username value from the URL
$uname = $_GET['uname'];

//Checks if the username is available or not
$query = "SELECT email FROM subscribed WHERE email = '$uname'";

$result = mysqli_query($connection, $query);

//Prints the result
if (mysqli_num_rows($result)<1) {
	echo "<span class=\"available\">Available!</span>";
}
else{
	echo "<span class=\"notavailable\">Email '".$uname."' Is Already Subscribed!!</span>";
}
}//end validate username
?> 