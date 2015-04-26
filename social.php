<?php include("inc/header.php"); ?> 
<!--Main Page wrapper-->
<!--social.php-->
<div id="page">


 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
     
     
     
     <script>
 
 
         
    //make sure no fields are empty
         //if empty, give red border
         
         //first_name
       $(document).ready(function () {
    $("#name").blur(function () {
      var input = $(this).val();
      if (input == '') {
        $("#n-error input").css({"border": "5px solid #E43633"}); 
      }else{
        $("#n-error input").css({"border": "1px solid grey"});
           
      }
    });
  });
         
         
    //last_name
       $(document).ready(function () {
    $("#comment").blur(function () {
      var input = $(this).val();
      if (input == '') {
        $("#c-error textarea").css({"border": "5px solid #E43633"});
          $("input[type='submit']").css({"visibility":"hidden"});
      }else{
        $("#c-error textarea").css({"border": "1px solid grey"});
          $("input[type='submit']").css({"visibility":"visible"});
      }
    });
  });
         
 
     
     </script>
     
     
     
<!--echo any errors if redirected here-->
<?php echo message(); ?>
<h2><span id="admin">
   <?php 

//if admin, display "admin" in header
if($admin==1){
    echo "Editing";
}   ?></span> Connect With Us!</h2>
 
    <hr/>
    <div id="add">
     <h3>Say Something!</h3>
 
    <form action="upload_social.php" method="post" enctype="multipart/form-data">
 
        <p id="n-error">Name:
        <input id="name" type="text" name="name" value="" /> </p>
        
         <h6>Accepted file types: png, jpg, and gif</h6>
         <h6>For best results, upload an image that is 150px x150px</h6>
    User Avatar:
    <input type="file" name="image" id="fileToUpload"><br/>
        
         <p id="c-error">Comment: <br/>
    <textarea id="comment" name="content" value="" rows="2" cols="100" maxlength="500"></textarea></p>
       
       
         
      <input type="submit" name="submit" value="Create" />
    </form>
    </div>
 <br/>
 <br/> 
     
        
  <?php         
//GET ALL SOCIAL ITEMS FROM TABLE
$q = "SELECT * FROM social ORDER BY id DESC"; 
$r = @mysqli_query ($connection, $q); 

if($r){
    
    //SOCIAL ITEMS EXIST, ECHO DATA
foreach($r as $row){ 
      ?>   
      <hr/>
 
<section class="thumbnail">
<h3><?php echo $row['name']; ?></h3>
<img src="<?php echo $row['avatar']; ?>" alt="User Image"/></section>
<section class="social_content">

 <p><?php echo $row['datetime']; ?></p>
  <p><?php echo $row['content']; ?></p> 
   </section>
     <br/>
<br/>
<?php 
if($admin==1){
    //if admin, give edit/delete option
    echo "<span class=\"edit\">";
    echo "<a href=\"edit.php?social_id=".$row['id']."\">Edit</a> |";
    echo "<a onclick='return confirm(\"DELETE this article?\");' href=\"delete.php?social_id=".$row['id']."\">Delete</a>";    
    echo "</span>"; 
} ?> 
 
 <?php }//end foreach
}//end query db for social posts
?>

</div> <!-- end #page -->
<?php include("inc/footer.php"); ?> 