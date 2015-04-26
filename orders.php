<?php include("inc/header.php"); ?> 
<!--Main Page wrapper-->
<!--orders.php-->
<div id="page">

<!--   CALL JQUERY-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
     
     
     
     <script>
 
 
         
    //make sure no fields are empty
         //if empty, give red border
         
         //first_name
       $(document).ready(function () {
    $("#fname").blur(function () {
      var input = $(this).val();
      if (input == '') {
        $("#f-error input").css({"border": "5px solid #E43633"});
      }else{
        $("#f-error input").css({"border": "1px solid grey"});
      }
    });
  });
         
         
    //last_name
       $(document).ready(function () {
    $("#lname").blur(function () {
      var input = $(this).val();
      if (input == '') {
        $("#l-error input").css({"border": "5px solid #E43633"});
      }else{
        $("#l-error input").css({"border": "1px solid grey"});
      }
    });
  });
         
         
             //address
       $(document).ready(function () {
    $("#addr").blur(function () {
      var input = $(this).val();
      if (input == '') {
        $("#a-error input").css({"border": "5px solid #E43633"});
      }else{
        $("#a-error input").css({"border": "1px solid grey"});
      }
    });
  });
        
         
                      //city
       $(document).ready(function () {
    $("#city").blur(function () {
      var input = $(this).val();
      if (input == '') {
        $("#c-error input").css({"border": "5px solid #E43633"});
      }else{
        $("#c-error input").css({"border": "1px solid grey"});
      }
    });
  });

         //Zip
       $(document).ready(function () {
    $("#zippy").blur(function () {
      var input = $(this).val();
      if (input == '') {
        $("#z-error input").css({"border": "5px solid #E43633"});
      }else{
        $("#z-error input").css({"border": "1px solid grey"});
      }
    });
  });
       
     
     </script>
     
     <span class="where"><a href="order_log.php">Where's My Product?</a></span>

<!--echo any errors if redirected here-->
<?php echo message(); ?>
<!--if coming from admin panel, show "editing"-->
<h2><span id="admin">
   <?php 

//if admin, display "admin" in header
if($admin==1){
    echo "Editing";
}   ?></span> Order Your Favorite Products!</h2>

<?php

//IF FORM HAS BEEN SUBMITTED PROCESS FORM

if (isset($_POST['submit'])) {
 
  // validations
    
    //CHECK THAT ALL FIELDS ARE FILLED OUT
  $required_fields = array("first","last","address","city", "state", "zip");
  validate_presences($required_fields);
  
 //IF NO ERRORS, CONTINUE SCRIPT
  if (empty($errors) && !empty($_POST['products']) ) {
    // Perform Create

    //PUT ALL VALUES INTO VARIABLES
      $first_name = mysql_prep($_POST["first"]);
    $last_name = mysql_prep($_POST["last"]);
    $address = mysql_prep($_POST["address"]); 
    $city = mysql_prep($_POST["city"]); 
    $state = mysql_prep($_POST["state"]); 
    $zip = mysql_prep($_POST["zip"]); 
      //PUT ARRAY VALLUES INTO VARIBLE
      $selected_products = $_POST['products'];
      
      
      //GET SHOPPING CART ARRAY AND ADD IT TO CHECKBOX ARRAY
           
    if(isset($_SESSION["cart"])){
        
        $all_products = array_merge($selected_products, $_SESSION["cart"]);
 
}else{
        
        $all_products= $_POST['products'];
     
}
      
       
    
      
      
      
      
 
 
             //INSERT PERSONAL INFO INTO ORDERS TABLE     
    $query  = "INSERT INTO orders (";
    $query .= " first_name, last_name, address, city, state, zip";
    $query .= ") VALUES (";
    $query .= " '{$first_name}','{$last_name}','{$address}','{$city}','{$state}','{$zip}'";
    $query .= ") ";
    $new_order_created = mysqli_query($connection, $query);
            
            
            if ($new_order_created) {
                
                
                //INSERT PRODUCTS INTO JOINT TABLE
                       
//GET THIS ORDER'S ORDER ID
$q = "SELECT * FROM orders ORDER BY id DESC LIMIT 1"; 
$r = @mysqli_query ($connection, $q);     

if($r){   
    //GET ORDER ID INTO VARIABLE TO PUT INTO PRODUCTS ORDERS JOINT TABLE
    $order_array=mysqli_fetch_assoc($r);
    $order_id=$order_array['id'];
    
    //INSERT PRODUCTS INTO JOIN TABLE
    
    foreach($all_products as $product_id){
    
    $query1  = "INSERT INTO orders_products (";
    $query1 .= " order_id, product_id";
    $query1 .= ") VALUES (";
    $query1 .= " {$order_id}, {$product_id} ";
    $query1 .= ") ";
 $products_entered = mysqli_query($connection, $query1);
        
        }
     
    
    if($products_entered){
    
                // Success
      $_SESSION["message"] = "Order created!";
        redirect_to("reciept.php?order_id=$order_id");
            
    }else{
            //ERROR IN SQL QUERY    
       $_SESSION["message"] = "There was an error with the second query".$product_id;
        redirect_to("orders.php");
            
            }
    }else{
    // ORDER ID NOT FOUND
          $_SESSION["message"] = "This order does not exist!";
        redirect_to("orders.php");
}//end ceck for order ID
    
    
    
    
    
    
}else{
                
                //ERROR IN ORDER QUERY
                
       $_SESSION["message"] = "There was an error with the first query";
        redirect_to("orders.php");
            
            }
      
        }else{
      //FIELDS WERE EMPTY
            $_SESSION["message"] = "All Fields Must Be Filled Out!";
      redirect_to("orders.php");
     ?>
       
<form action="orders.php" method="post">
<?php 
    //check to see which ones were filled out, and pre-fill:
    
    if(isset($_POST["first"])){ 
        $first=$_POST["first"]; }else{ $first="";} 
    
    if(isset($_POST["last"])){ 
        $last=$_POST["last"]; }else{ $last="";} 
    
    if(isset($_POST["address"])){ 
        $address=$_POST["address"]; }else{ $address="";} 
    
    if(isset($_POST["city"])){ 
        $city=$_POST["city"]; }else{ $city="";} 
    
     if(isset($_POST["zip"])){ 
        $zip=$_POST["zip"]; }else{ $zip="";} 
    
    ?>
 
    <p id="f-error" >First
    <input id="fname" name="first" type="text" value="<?php echo $first; ?>"></p>
    
    <p id="l-error">Last 
    <input id="lname" name="last" type="text" value="<?php echo $last; ?>"></p>
    
    <p id="a-error">Address 
    <input id="addr" name="address" type="text" value="<?php echo $address; ?>"></p>
    
    <p id="c-error">City 
    <input id="city" name="city" type="text" value="<?php echo $city; ?>"></p>
    
    <p>State 
    <select name="state">
<!--        <option value="">--SELECT--</option>-->
        <option value="wa">WA</option>
        <option value="or">OR</option>
        <option value="ca">CA</option>
        <option value="nv">NV</option>
        <option value="ny">NY</option>
    </select></p>
    
    <p id="z-error">Zipcode
    <input id="zippy" name="zip" type="text" value="<?php echo $zip; ?>"></p>
    
    
        <p>In your cart: </p>
    <?php
    if(isset($_SESSION["cart"])){
foreach ($_SESSION["cart"] as $key => $value){
     
    $q = "SELECT * FROM products WHERE id={$value}"; 
    $r = @mysqli_query ($connection, $q); 

    if($r){
        $array = mysqli_fetch_assoc($r);
        echo "".$array['name']." ".$array['price']." <a href=\"shopping_cart.php?remove=".$array['id']."\"><i class=\"fa fa-trash-o\"></i></a><br/>";
    }

}
}else{
    echo "No items in your cart!<br/><Br/>";
}
   ?>
    
     <p>Add Products:<br/>  
        
              <?php         
      
      //GET ORDERS FROM TABLE TO LOOP INTO OPTIONS

$q = "SELECT * FROM products ORDER BY id DESC"; 
$r = @mysqli_query ($connection, $q); 

if($r){ 

foreach($r as $row){
       echo "&nbsp;&nbsp;&nbsp;<input type=\"checkbox\" name=\"products[]\" value=\"".$row['id']."\" />".$row['name']."<br/>";
            
            }//end foreach
}//end check for products     
?>
      </p>
    
    <input type="submit" name="submit" value="Submit">
 
    
</form>
       
       <?php
        }//END CHECK FOR ERRORS
 }   else {
  // SHOW FORM
    
    ?>
    
    
 
     
    
<form action="orders.php" method="post">
<?php 
    //check to see which ones were filled out, and pre-fill:
    
    if(isset($_POST["first"])){ 
        $first=$_POST["first"]; }else{ $first="";} 
    
    if(isset($_POST["last"])){ 
        $last=$_POST["last"]; }else{ $last="";} 
    
    if(isset($_POST["address"])){ 
        $address=$_POST["address"]; }else{ $address="";} 
    
    if(isset($_POST["city"])){ 
        $city=$_POST["city"]; }else{ $city="";} 
    
     if(isset($_POST["zip"])){ 
        $zip=$_POST["zip"]; }else{ $zip="";} 
    
    ?>
 
    <p id="f-error" >First
    <input id="fname" name="first" type="text" value="<?php echo $first; ?>"></p>
 
    
    <p id="l-error">Last 
    <input id="lname" name="last" type="text" value="<?php echo $last; ?>"></p>
    
    <p id="a-error">Address 
    <input id="addr" name="address" type="text" value="<?php echo $address; ?>"></p>
    
    <p id="c-error">City 
    <input id="city" name="city" type="text" value="<?php echo $city; ?>"></p>
    
    <p>State 
    <select name="state">
<!--        <option value="">--SELECT--</option>-->
        <option value="wa">WA</option>
        <option value="or">OR</option>
        <option value="ca">CA</option>
        <option value="nv">NV</option>
        <option value="ny">NY</option>
    </select></p>
    
    <p id="z-error">Zipcode
    <input id="zippy" name="zip" type="text" value="<?php echo $zip; ?>"></p>
    
    
    <p>In your cart: </p>
    <?php
    if(isset($_SESSION["cart"])){
foreach ($_SESSION["cart"] as $key => $value){
     
    $q = "SELECT * FROM products WHERE id={$value}"; 
    $r = @mysqli_query ($connection, $q); 

    if($r){
        $array = mysqli_fetch_assoc($r);
        echo "".$array['name']." ".$array['price']." <a href=\"shopping_cart.php?remove=".$array['id']."\"><i class=\"fa fa-trash-o\"></i></a><br/>";
    }

}
}else{
    echo "No items in your cart!<br/><Br/>";
}
   ?>
    
     <p>Add Products:<br/>  
       
              <?php         

$q = "SELECT * FROM products ORDER BY id DESC"; 
$r = @mysqli_query ($connection, $q); 

if($r){
//    $array = mysqli_fetch_assoc($r);

foreach($r as $row){
       echo "&nbsp;&nbsp;&nbsp;<input type=\"checkbox\" name=\"products[]\" value=\"".$row['id']."\" />".$row['name']."<br/>";
            
            }//end foreach
}//end check for products     
?>
      </p>
    
    <input type="submit" name="submit" value="Submit">
 
    
</form>
    
    
    <?php
  
} // end: if (isset($_POST['submit']))

?> 
 




 

</div> <!-- end #page -->
<?php include("inc/footer.php"); ?> 