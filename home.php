<?php include("inc/header.php");  ?> 
<!--Main Page wrapper-->
<!--home.php-->
 
<!-- //Give page different height depending on if admin-->
 <?php
if($admin!=1){ 
    ?> <div id="page"> <?php
}else{

?> <div class="admin_page"> <?php
}
?>


<!--echo any errors if redirected here-->
<?php echo message(); ?>
<span id="admin">
   <?php 

//if admin, display "admin" in header
if($admin==1){
    echo "<h2>Editing Home</h2>";
}   ?></span>
 

<?php 

if($admin==1){
    echo "<hr/>";
}

    //Show image, which is stored in content row id 6 in home_page_content table
$img6 = "SELECT * FROM home_page_content WHERE id=6 LIMIT 1"; 
$result6 = @mysqli_query ($connection, $img6); 

if($result6){
    $array = mysqli_fetch_assoc($result6);
    $header_id=$array['content'];
    
    //GET FILEPATH TO CURRENT HEADER
    $header_query = "SELECT * FROM headers WHERE id={$header_id} LIMIT 1"; 
$header_result = @mysqli_query ($connection, $header_query); 

if($header_result){
    $array = mysqli_fetch_assoc($header_result);
    $filepath=$array['filepath'];
 
 } //end if result   
    if(!empty($filepath)){
 
    echo "<section class=\"full\"> <img src=\"".$filepath."\" title=\"home_image_6\"/></section>";
        
          if($admin==1){
    //if admin, show upload
 
    ?>
    <h3>Edit Header Image: </h3>
    
    
<!--    SHOW GALLERY-->
     
       <?PHP
        //GET FILEPATH TO headers
    $header_query = "SELECT * FROM headers"; 
$header_result = @mysqli_query ($connection, $header_query); 

if($header_result){
    echo " <h4>Choose From Gallery:</h4>";
    echo "<div id=\"gallery\">";
    foreach($header_result as $header){
        echo "<span id=\"gallery_tools\"><a href=\"change_header.php?header_id=".$header['id']."\"><img src=\"".$header['filepath']."\" /></a><a href=\"delete.php?header=".$header['id']."\"><i class=\"fa fa-trash-o\"></i></a></span>";
    }
    echo "</div><br/>";
 } //end if result 
    ?>
    
<br/><Br/><h4>Upload New Header:</h4>
<form action="upload_home_img.php" method="post" enctype="multipart/form-data"> 
    <h6>Accepted file types: png, jpg, and gif</h6>
    HEADER IMAGE:
    <input type="file" name="image" id="fileToUpload"><br/>
    <input type="hidden" name="row_id" value="6"><br/>
    <input type="submit" name="submit" value="Upload" />
</form>

   
<!--     <div id="delete_button"><a href="edit.php?header=6">Delete Header Image</a></div>-->
    
  <hr/>
<?php
 
    }//end show edit if admin and image is set
 
    }else{
        if($admin==1){
            ?>
            
            <!--    SHOW GALLERY-->
     
       <?PHP
        //GET FILEPATH TO headers
    $header_query = "SELECT * FROM headers"; 
$header_result = @mysqli_query ($connection, $header_query); 

if($header_result){
    echo " <h4>Choose From Gallery:</h4>";
    echo "<div id=\"gallery\">";
    foreach($header_result as $header){
        echo "<span id=\"gallery_tools\"><a href=\"change_header.php?header_id=".$header['id']."\"><img src=\"".$header['filepath']."\" /></a><a href=\"delete.php?header=".$header['id']."\"><i class=\"fa fa-trash-o\"></i></a></span>";
    }
    echo "</div><br/>";
 } //end if result 
    ?>


    <h4>Upload Header Image: </h4>
<form action="upload_home_img.php" method="post" enctype="multipart/form-data"> 
    <h6>Accepted file types: png, jpg, and gif</h6>
    HEADER IMAGE:
    <input type="file" name="image" id="fileToUpload"><br/>
    <input type="hidden" name="row_id" value="6"><br/>
    <input type="submit" name="submit" value="Upload" />
</form>
   <?php
        }//end show upload if admin and image not set
    
    }//end check that image is set

    
  
    
}else{
    
    ?>
    <h4>Upload Header Image: </h4>
<form action="upload_home_img.php" method="post" enctype="multipart/form-data"> 
    <h6>Accepted file types: png, jpg, and gif</h6>
    HEADER IMAGE:
    <input type="file" name="image" id="fileToUpload"><br/>
    <input type="hidden" name="row_id" value="6"><br/>
    <input type="submit" name="submit" value="Upload" />
</form>
   <?php
}//end check for article content

?>







<section class="full">

<br/>
<br/>
<?php 

    
$q1 = "SELECT * FROM home_page_content WHERE id=1 LIMIT 1"; 
$r1 = @mysqli_query ($connection, $q1); 

if($r1){
//    $array = mysqli_fetch_assoc($r);

foreach($r1 as $row){
    
    if($admin==1){
    
    echo "
    <form action=\"edit.php?home=".$row['id']."\">
    <textarea name=\"content\" value=\"".$row['content']."\" rows=\"10\" cols=\"100\">".$row['content']."</textarea>
    <input type=\"hidden\" name=\"section_id\" value=\"".$row['id']."\">
    <input type=\"submit\" name=\"home\" value=\"Submit\">
    </form>";
        
      }else{
    echo $row['content']; 
}
    
    
} //end foreach
    
  
    
}//end check for article content
?></section>



<section class="full">

<br/>
<br/>
<?php 

    
$q2 = "SELECT * FROM home_page_content WHERE id=2 LIMIT 1"; 
$r2 = @mysqli_query ($connection, $q2); 

if($r2){
//    $array = mysqli_fetch_assoc($r);

foreach($r2 as $row){
    
    if($admin==1){
    
    echo "
    <form action=\"edit.php?home=".$row['id']."\">
    <textarea name=\"content\" value=\"".$row['content']."\" rows=\"10\" cols=\"100\">".$row['content']."</textarea>
    <input type=\"hidden\" name=\"section_id\" value=\"".$row['id']."\">
    <input type=\"submit\" name=\"home\" value=\"Submit\">
    </form>";
        
      }else{
    echo $row['content']; 
}
    
    
} //end foreach
    
  
    
}//end check for article content
?></section>

<div id="clear-margin"></div>


<section class="left">



<!--IMAGES-->


<!--IMAGE ID#4-->


<?php 

    
$img4 = "SELECT * FROM home_page_content WHERE id=4 LIMIT 1"; 
$result4 = @mysqli_query ($connection, $img4); 

if($result4){
//    $array = mysqli_fetch_assoc($r);

foreach($result4 as $row){
    
 
    echo "<section class=\"half\">
    <img src=\"".$row['content']."\" title=\"home_image_4\"/>
</section>";
 
 
    
} //end foreach
    
  
    
}//end check for article content
?>



<!--IMAGE ID#5-->


<?php 

    
$img5 = "SELECT * FROM home_page_content WHERE id=5 LIMIT 1"; 
$result5 = @mysqli_query ($connection, $img5); 

if($result5){
//    $array = mysqli_fetch_assoc($r);

foreach($result5 as $row){
    
 
    echo "<section class=\"half\">
    <img src=\"".$row['content']."\" title=\"home_image_5\"/>
</section>";
 

 
    
} //end foreach
    
  
    
}//end check for article content


if($admin==1){
 
    ?>
    <br/>
    <br/>
    <br/>
    <h4 style="clear:both">Edit Left Image: </h4>
<form action="upload_home_img.php" method="post" enctype="multipart/form-data"> 
    <h6>Accepted file types: png, jpg, and gif</h6>
    Left Image:
    <input type="file" name="image" id="fileToUpload"><br/>
    <input type="hidden" name="row_id" value="4"><br/>
    <input type="submit" name="submit" value="Upload" />
</form>
         <hr/>   
            
                <h4>Edit Right Image: </h4>
<form action="upload_home_img.php" method="post" enctype="multipart/form-data"> 
    <h6>Accepted file types: png, jpg, and gif</h6>
    Right Image:
    <input type="file" name="image" id="fileToUpload"><br/>
    <input type="hidden" name="row_id" value="5"><br/>
    <input type="submit" name="submit" value="Upload" />
</form>
             
     <?php 
}//show edit if admin
 


?>

<!--END IMAGES-->


<section class="small_full">
<br/>
<br/>


<?php 

    
$q3 = "SELECT * FROM home_page_content WHERE id=3 LIMIT 1"; 
$r3 = @mysqli_query ($connection, $q3); 

if($r3){
//    $array = mysqli_fetch_assoc($r);

foreach($r3 as $row){
    
    if($admin==1){
    
    echo "
    <form action=\"edit.php?home=".$row['id']."\">
    <textarea name=\"content\" value=\"".$row['content']."\" rows=\"10\" cols=\"40\">".$row['content']."</textarea>
    <input type=\"hidden\" name=\"section_id\" value=\"".$row['id']."\">
    <input type=\"submit\" name=\"home\" value=\"Submit\">
    </form>";
        
      }else{
    echo $row['content']; 
}
    
    
} //end foreach
    
  
    
}//end check for article content
?>
</section>



</section>



    
    
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
             <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
     
     
     
     <script>
 //check email availability
       $(document).ready(function () {
    $("#email").blur(function () {
      var email = $(this).val();
      if (email == '') {
        $("#availability").html("");
           $("#u-error input").css({"border": "5px solid #E43633"});
      }else{
          $("#u-error input").css({"border": "1px solid grey"});
        $.ajax({
          url: "validation.php?uname="+email
        }).done(function( data ) {
          $("#availability").html(data);
        });   
      } 
    });
  });
 </script>
        
        
        
        
        
        
<section id="mailing_list"  class="right">
   
   
   
    <h2>Subscribe to our mailing list!</h2>
    <form action="new_subscription.php" method="post">
       <p>Name <input type="text" name="name" value="" placeholder="Your Name">    </p>
    <p id="u-error">Email:
        <input type="text" name="email" id="email" value="" />
         <div id="availability"></div>
      </p>  
        <input type="submit" name="submit" value="Subscribe">
    </form>
    
    </section>
       
       
       
       
       
 

 



</div> <!-- end #page -->
<?php include("inc/footer.php"); ?> 