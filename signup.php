<?php  include "includes/db.php"; ?>
 <?php
if(isset($_POST['register'])){
    
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
    $query="SELECT * FROM users ";
    $check_username_availablity_query= mysqli_query($connection,$query);
    $is_username_available=true;
    while($row=mysqli_fetch_assoc($check_username_availablity_query)){
      $username_registered=$row['username'];
      if($username_registered===$new_username){
        $is_username_available=false;
      }

    }
    if(!$is_username_available){
      echo "<script>alert('Username not available please choose any other!!')</script>";
    }else{
            
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
        
    echo"<script>alert('Thank you. Please login to purchase.')</script>"; 
    header("Location: index.php");  
    

    }
    else{
 
    echo"<script>alert('Field Cannot Be Empty.')</script>";
    
    }

    
    
}


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
<form class="signup" action="signup.php" method="post"  autocomplete="off" enctype="multipart/form-data">
  <h1>Create account</h1>
  <h2>Want to Register Your Shop with Us ? <a href="signup_shop1.php"><span>Register Now</span></a></h2>
  <div class="signup__field">
    <input class="signup__input" type="text" name="fname" id="fname" required />
    <label class="signup__label" for="fname">First Name</label>
  </div>
  <div class="signup__field">
    <input class="signup__input" type="text" name="lname" id="lname" required />
    <label class="signup__label" for="lname">Last Name</label>
  </div>
  <div class="signup__field">
    <input class="signup__input" type="text" name="username" id="username" required />
    <label class="signup__label" for="username">username</label>
  </div>
  <div class="signup__field">
    <input class="signup__input" type="email" name="email" id="email" required />
    <label class="signup__label" for="email">Email</label>
  </div>

  <div class="signup__field">
    <input class="signup__input" type="password" name="password" id="password" required />
    <label class="signup__label" for="password">Password</label>
  </div>
  <div class="signup__field">
    <input class="signup__input" type="text" name="mobile_no" id="mobileno" required />
    <label class="signup__label" for="mobileno">Mobile No</label>
  </div>
  <div class="signup__field">
    <input class="signup__input" type="text" name="address" id="address" required />
    <label class="signup__label" for="address">Address</Address></label>
  </div>

  <input class="submit_button"type="submit" name="register" id="btn-login" value="Sign up">
</form>
</div>