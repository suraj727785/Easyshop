<?php  include "includes/db.php"; ?>
 <?php
if(isset($_POST['signup_shop1'])){
    
    $new_firstname = $_POST['fname'];
    $new_lastname = $_POST['lname'];
    $new_username = $_POST['username'];
    $new_user_email = $_POST['email'];
    $new_password = $_POST['password'];
    $new_user_mobno = $_POST['mobile_no'];
    $new_user_address = $_POST['address'];

    $new_username = mysqli_real_escape_string($connection,$new_username);
    $new_user_email = mysqli_real_escape_string($connection,$new_user_email);
    $new_password = mysqli_real_escape_string($connection,$new_password);
            
    $query="SELECT user_randSalt FROM users ";
    $select_randSalt_query= mysqli_query($connection,$query);
    
    if(!$select_randSalt_query){
        die("Query Failed".mysqli_error($connection));
    }
    
  $row=mysqli_fetch_assoc($select_randSalt_query);
        
   $randSalt=$row['user_randSalt'];
    $new_password=crypt($new_password,$randSalt);
    
    
    
    if(!empty($new_firstname) && !empty($new_lastname) && !empty($new_username) && !empty($new_user_email) && !empty($new_password) ){
    
    $query= " INSERT INTO users(user_firstname,user_lastname,user_role,username,user_mobileno,user_address,user_email,user_password) ";

$query.= " VALUES('{$new_firstname}','{$new_lastname}','Subscriber','{$new_username}','{$new_user_mobno}','{$new_user_address}','{$new_user_email}','{$new_password}') ";
    
    $register_new_user=mysqli_query($connection,$query);
    if(!$register_new_user){
       die("Query Failed".mysqli_error($connection) . ' ' .mysqli_errno($connection));
    }
    }
   
}


if(isset($_POST['signup_shop'])){
  $new_shop_name=$_POST['shop_name'];
  $new_shop_type=$_POST['shop_type'];
  $new_shop_ownername=$_POST['shop_owner'];
  $new_shop_owner_username=$_POST['owner_username'];
  $new_shop_address=$_POST['shop_address'];


      // Get image name
$shop_image = $_FILES['shop_image']['name'];

// image file directory
$target = "images/".basename($shop_image);

move_uploaded_file($_FILES['shop_image']['tmp_name'], $target);


  $new_shop_owner_username = mysqli_real_escape_string($connection,$new_shop_owner_username);

 $query= " INSERT INTO shops(shop_name,shop_type,shop_image,shop_owner_name,shop_owner_username,shop_address) ";

$query.= " VALUES('{$new_shop_name}','{$new_shop_type}','{$shop_image}','{$new_shop_ownername}','{$new_shop_owner_username}','{$new_shop_address}') ";
    
    $register_new_shop=mysqli_query($connection,$query);
    if(!$register_new_shop){
       die("Query Failed".mysqli_error($connection) . ' ' .mysqli_errno($connection));
    }
        
    echo"<script>alert('Thank you. Please login to go your Shop.')</script>"; 
        

    

    }

    
 





?>













<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/signupstyle.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <title>Register</title>
</head>

<body>

<div class="signup-page">
<form class="signup" action="" method="post"  autocomplete="off" enctype="multipart/form-data">
  <h1>Create account</h1>
  <h2>Please let us know about your Shop</h2>
  <div class="signup__field">
    <input class="signup__input" type="text" name="shop_name" id="shopname" required />
    <label class="signup__label" for="shopname">Shop Name</label>
  </div>
  <div class="signup__field">
    <input class="signup__input" type="text" name="shop_type" id="shoptype" required />
    <label class="signup__label" for="shoptype">Shop Type</label>
  </div>
  <div class="signup__field">
    <input class="signup__input" type="text" name="shop_owner" id="shopowner" required />
    <label class="signup__label" for="shopowner">Shop Owner's Name</label>
  </div>
  <div class="signup__field">
    <input class="signup__input" type="text" name="owner_username" id="owneruser" required />
    <label class="signup__label" for="owneruser">Shop Owner's Username</label>
  </div>
  <div class="signup__field">  
    <lebel class="signup__label_image" for="user_image">Image</lebel>  
    <input class="signup__input" type="file" name="shop_image" > 
  </div>
  <div class="signup__field">
    <input class="signup__input" type="text" name="shop_address" id="address" required />
    <label class="signup__label" for="address">Shop Address</Address></label>
  </div>

  <input class="submit_button"type="submit" name="signup_shop" id="btn-login" value="Register">
</form>
</div>