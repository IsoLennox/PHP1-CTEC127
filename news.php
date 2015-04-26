<?php include("inc/header.php"); ?> 
<!--Main Page wrapper-->
<!--news.php-->
<div id="page">
<!--echo any errors if redirected here-->
<?php echo message(); ?>
<h2><span id="admin">
   <?php 

//if admin, display "admin" in header
if($admin==1){
    echo "Editing";
}   ?></span> News</h2>
 
 <?php 

//if came from admin panel, give option to upload new article
if($admin==1){
?>
 
     <h2>Add Article</h2>
 
    <form action="create.php?news" method="post">
 
        <p>Title:
        <input type="text" name="title" value="" /> </p>
        
         <p>News: <br/>
    <textarea name="content" value="" rows="5" cols="100"></textarea></p>
         
      <input type="submit" name="submit" value="Create" />
    </form>
 <br/>
 <br/>
 <hr/>
 <?php
} ?>

<?php
//Get all News articles from DB

$q = "SELECT * FROM news ORDER BY id DESC"; 
$r = @mysqli_query ($connection, $q); 

if($r){
//    $array = mysqli_fetch_assoc($r);

foreach($r as $row){
?>


<section class="thumbnail"><?php echo $row['datetime']; ?></section>
<section class="social_content"> 
  <h3><?php echo $row['title']; ?> </h3> 
  <p><?php echo $row['content']; ?> </p> 
   </section>
     <br/>
<br/>
<?php 
if($admin==1){
    
    //if admin, give edit/delete option
    echo "<span class=\"edit\">";
    echo "<a href=\"edit.php?article_id=".$row['id']."\">Edit</a> |";
    echo "<a onclick='return confirm(\"DELETE this article?\");' href=\"delete.php?article_id=".$row['id']."\">Delete</a>";    
    echo "</span>"; 
} ?>
 <hr/>
 
 <?php }//end foreach article, read info
}else{
    echo "There are no News Articles!";
} ?>

</div> <!-- end #page -->
<?php include("inc/footer.php"); ?> 