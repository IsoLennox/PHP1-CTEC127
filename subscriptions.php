<?php include("inc/header.php"); ?> 
<!--Main Page wrapper-->
<!--social.php-->
<div id="page">
<!--echo any errors if redirected here-->
<?php echo message(); ?>

   <?php 

//if admin, display "admin" in header
if($admin==1){
    echo "<span id=\"admin\"><h2>Managing Subscriptions</h2></span> ";
    ?>
 
 
     
        
  <?php         
//GET ALL SOCIAL ITEMS FROM TABLE
$q = "SELECT * FROM subscribed ORDER BY id DESC"; 
$r = @mysqli_query ($connection, $q); 

if($r){
    
    //SOCIAL ITEMS EXIST, ECHO DATA
foreach($r as $row){ 
      ?>   
      <hr/>
 

 <?php echo "<strong>".$row['name']."</strong>";
    echo "&nbsp;&nbsp;&nbsp;";
    echo $row['email'];
     echo "&nbsp;&nbsp;&nbsp;";
         //if admin, give remove option
 
    echo "<a onclick='return confirm(\"DELETE this article?\");' href=\"delete.php?subscribed=".$row['id']."\"> <span style=\"color:red\" class=\"\"><i class=\"fa fa-trash-o\"></i></span> </a>";
     
     ?>  
  
 <?php }//end foreach
}//end query db for social posts

}else{
    redirect_to("home.php");
}//end make sure is_admin==1
?>

</div> <!-- end #page -->
<?php include("inc/footer.php"); ?> 