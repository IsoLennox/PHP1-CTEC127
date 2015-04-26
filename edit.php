<?php include("inc/header.php"); ?>

<div id="page">

<?php




//SAVE HOME

if(isset($_GET['home'])){
$section_id=$_GET['section_id']; 
$content=$_GET['content']; 
//Get sections from 

$q = "SELECT * FROM home_page_content WHERE id={$section_id}"; 
$r = @mysqli_query ($connection, $q); 

if($r){
//    $array = mysqli_fetch_assoc($r);

foreach($r as $row){
 
    
        $query  = "UPDATE home_page_content SET ";
    $query .= "content = '{$content}' ";
    $query .= "WHERE id = {$section_id} ";
    $query .= "LIMIT 1";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_affected_rows($connection) == 1) {
      // Success
      $_SESSION["message"] = "Changes Made!";
      redirect_to("home.php?admin=1");
    } else {
      // Failure
      $_SESSION["message"] = "Changes Failed";
        redirect_to("home.php?admin=1");
        
    }
}//end foreach
}else{
    echo "This section does not exist!";
    redirect_to("home.php?admin=1");
}//end check if exists
}//end EDIT HOME









//NEWS EDIT FORM
if(isset($_GET['article_id'])){
    echo "<h2>Edit News Article</h2>";
$article_id=$_GET['article_id']; 
//Get all News articles from DB

$q = "SELECT * FROM news WHERE id={$article_id}"; 
$r = @mysqli_query ($connection, $q); 

if($r){
//    $array = mysqli_fetch_assoc($r);

foreach($r as $row){
?>
<form action="edit.php?save_news" method="post">
 
        <p>Title:
        <input type="text" name="title" value="<?php echo htmlentities($row['title']); ?>" /> </p>
        <input type="hidden" name="article_id" value="<?php echo $article_id; ?>" />  

        <p>News: <br/>
        <textarea name="content" value="<?php echo htmlentities($row['content']); ?>" rows="5" cols="100"><?php echo htmlentities($row['content']); ?></textarea></p>

        <input type="submit" name="save_news" value="Save" />
</form>
    <br/><a href="news.php">Cancel</a>

 <?php }//end foreach article, read info
}else{
    echo "This Articles Does Not Exist!";
}  
}//end EDIT NEWS FORM




//SAVE NEWS

if(isset($_GET['save_news'])){
$section_id=$_POST['article_id']; 
$title=$_POST['title']; 
$content=$_POST['content']; 
//Get sections from 

$q = "SELECT * FROM news WHERE id={$section_id}"; 
$r = @mysqli_query ($connection, $q); 

if($r){
//    $array = mysqli_fetch_assoc($r);

foreach($r as $row){
 
    
    $query  = "UPDATE news SET ";
    $query .= "title = '{$title}', ";
    $query .= "content = '{$content}' ";
    $query .= "WHERE id = {$section_id} ";
    $query .= "LIMIT 1";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_affected_rows($connection) == 1) {
      // Success
      $_SESSION["message"] = "Changes Made!";
      redirect_to("news.php?admin=1");
    } else {
      // Failure
      $_SESSION["message"] = "Changes Failed";
        redirect_to("news.php?admin=1");
        
    }
}//end foreach
}else{
    echo "This section does not exist!";
    redirect_to("news.php?admin=1");
}//end check if exists
}//end EDIT NEWS











//PRODUCTS EDIT FORM
if(isset($_GET['product_id'])){
    echo "<h2>Edit products product</h2>";
$product_id=$_GET['product_id']; 
//Get all products products from DB

$q = "SELECT * FROM products WHERE id={$product_id}"; 
$r = @mysqli_query ($connection, $q); 

if($r){
//    $array = mysqli_fetch_assoc($r);

foreach($r as $row){
?>
<form action="edit.php?save_products" method="post">
 
        <p>Title:
        <input type="text" name="title" value="<?php echo htmlentities($row['name']); ?>" /> </p>
        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>" />  
        
        Current image:
        <img src="<?php echo htmlentities($row['filepath']); ?>" />
   
<!--
         <h6>Accepted file types: png, jpg, and gif</h6>
    Upload New Image:
-->
<!--    <input type="file" name="image" id="fileToUpload" ><br/>-->
        
 
        <p>Product Description: <br/>
        <textarea name="content" value="<?php echo htmlentities($row['description']); ?>" rows="5" cols="100"><?php echo htmlentities($row['description']); ?></textarea></p>
        
        <p>Price:
        <input type="text" name="price" value="<?php echo htmlentities($row['price']); ?>" /> </p>

        <input type="submit" name="save_products" value="Save" />
</form>
    <br/><a href="products.php">Cancel</a>

 <?php }//end foreach product, read info
}else{
    echo "This products Does Not Exist!";
}  
}//end EDIT products FORM




//SAVE products

if(isset($_GET['save_products'])){
$section_id=$_POST['product_id']; 
$title=$_POST['title']; 
$content=$_POST['content']; 
$price=$_POST['price']; 
//Get sections from 

$q = "SELECT * FROM products WHERE id={$section_id}"; 
$r = @mysqli_query ($connection, $q); 

if($r){
//    $array = mysqli_fetch_assoc($r);

foreach($r as $row){
 
    
    $query  = "UPDATE products SET ";
    $query .= "name = '{$title}', ";
    $query .= "price = '{$price}', ";
    $query .= "description = '{$content}' ";
    $query .= "WHERE id = {$section_id} ";
    $query .= "LIMIT 1";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_affected_rows($connection) == 1) {
      // Success
      $_SESSION["message"] = "Changes Made!";
      redirect_to("products.php?admin=1");
    } else {
      // Failure
      $_SESSION["message"] = "Changes Failed";
        redirect_to("products.php?admin=1");
        
    }
}//end foreach
}else{
    echo "This section does not exist!";
    redirect_to("products.php?admin=1");
}//end check if exists
}//end EDIT PRODUCTS



//REMOVE HEADER IMAGE

if(isset($_GET['header'])){
$header_id=$_GET['header']; 
//Get headers from 

$q = "SELECT * FROM home_page_content WHERE id={$header_id}"; 
$r = @mysqli_query ($connection, $q); 

if($r){
//    $array = mysqli_fetch_assoc($r);

foreach($r as $row){
 
    
    $query  = "UPDATE home_page_content SET ";
    $query .= "content = 0 ";
    $query .= "WHERE id = {$header_id} ";
    $query .= "LIMIT 1";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_affected_rows($connection) == 1) {
      // Success
      $_SESSION["message"] = "Header Removed!";
      redirect_to("home.php?admin=1");
    } else {
      // Failure
      $_SESSION["message"] = "Header Could Not Be Removed";
        redirect_to("home.php?admin=1");
        
    }
}//end foreach
}else{
    $_SESSION["message"] = "This header does not exist!";
    redirect_to("home.php?admin=1");
}//end check if exists
}//end EDIT HEADER IMAGE





//MARK AS SHIPPED

if(isset($_GET['shipped'])){
$product_id=$_GET['shipped']; 
//Get products from 

$q = "SELECT * FROM orders WHERE id={$product_id}"; 
$r = @mysqli_query ($connection, $q); 

if($r){
//    $array = mysqli_fetch_assoc($r);

foreach($r as $row){
 
    
    $query  = "UPDATE orders SET ";
    $query .= "shipped = 1 ";
    $query .= "WHERE id = {$product_id} ";
    $query .= "LIMIT 1";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_affected_rows($connection) == 1) {
      // Success
      $_SESSION["message"] = "Product marked as shipped!";
      redirect_to("order_log.php?admin=1");
    } else {
      // Failure
      $_SESSION["message"] = "Product Could Not Be Updated";
        redirect_to("order_log.php?admin=1");
        
    }
}//end foreach
}else{
    $_SESSION["message"] = "This product does not exist!";
    redirect_to("order_log.php?admin=1");
}//end check if exists
}//end MARK AS SHIPPED









//SOCIAL EDIT FORM

if(isset($_GET['social_id'])){
$social_id=$_GET['social_id'];
    
        echo "<h2>Edit Comment</h2>";
    
    
//Get all social social from DB
$q = "SELECT * FROM social WHERE id={$social_id}"; 
$r = @mysqli_query ($connection, $q); 

if($r){
//    $array = mysqli_fetch_assoc($r);

foreach($r as $row){
?>
<form action="edit.php?save_social" method="post">
 
        <p>Name:
        <input type="text" name="name" value="<?php echo htmlentities($row['name']); ?>" /> </p>
        <input type="hidden" name="social_id" value="<?php echo $social_id; ?>" />  
        
        Current image:
        <img src="<?php echo htmlentities($row['avatar']); ?>" />
 
        
 
        <p>Comment: <br/>
        <textarea name="content" value="<?php echo htmlentities($row['content']); ?>" rows="5" cols="100"><?php echo htmlentities($row['content']); ?></textarea></p>
        
 

        <input type="submit" name="save_social" value="Save" />
</form>
    <br/><a href="social.php">Cancel</a>

 <?php }//end foreach social, read info
}else{
    echo "This Comment Does Not Exist!";
}  
}//end EDIT social FORM




//SAVE social

if(isset($_GET['save_social'])){
    
$section_id=$_POST['social_id']; 
$name=$_POST['name']; 
$content=$_POST['content'];  
//Get sections from 

$q = "SELECT * FROM social WHERE id={$section_id}"; 
$r = @mysqli_query ($connection, $q); 

if($r){
//    $array = mysqli_fetch_assoc($r);

foreach($r as $row){
 
    
    $query  = "UPDATE social SET ";
    $query .= "name = '{$name}', "; 
    $query .= "content = '{$content}' ";
    $query .= "WHERE id = {$section_id} ";
    $query .= "LIMIT 1";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_affected_rows($connection) == 1) {
      // Success
      $_SESSION["message"] = "Changes Made!";
      redirect_to("social.php?admin=1");
    } else {
      // Failure
      $_SESSION["message"] = "Changes Failed";
        redirect_to("social.php?admin=1");
        
    }
}//end foreach
}else{
    echo "This section does not exist!";
    redirect_to("social.php?admin=1");
}//end check if exists
}//end EDIT social




?>

</div> <!--end page-->
 