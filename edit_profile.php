<?php  include "includes/header.php"; ?>
<body>

<?php
    
   if(isset($_GET['u_id'])){
       $edit_user_id=$_GET['u_id'];
       $db_user_password=$_SESSION['password'];
       
       $query = "SELECT * FROM users WHERE user_id ='{$edit_user_id}' " ;
       $select_user_profile_query = mysqli_query($connection,$query);
       
       
while($row=mysqli_fetch_assoc($select_user_profile_query)){
    
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_mobileno = $row['user_mobileno'];
    $user_address= $row['user_address'];
    
    
  $user_password = crypt($db_user_password,$user_password);

       }
  
    }





if(isset($_POST['edit_user_profile'])){
$user_firstname=$_POST['user_firstname'];
$user_lastname=$_POST['user_lastname']; 
$username=$_POST['username'];   
$user_email=$_POST['user_email'];    
$user_new_password=$_POST['user_password'];
$new_mobileno = $_POST['new_mobileno'];
$new_user_address = $_POST['user_address'];

    
$username = mysqli_real_escape_string($connection,$username);
$user_email = mysqli_real_escape_string($connection,$user_email);
$user_password = mysqli_real_escape_string($connection,$user_password);
$query="SELECT user_randSalt FROM users ";
$select_randSalt_query= mysqli_query($connection,$query);

if(!$select_randSalt_query){
    die("Query Failed".mysqli_error($connection));
}

$row=mysqli_fetch_assoc($select_randSalt_query);

$randSalt=$row['user_randSalt'];
$user_new_password=crypt($user_new_password,$randSalt);

    
    
$query = "UPDATE users SET ";
$query .="username  = '{$username}', ";
$query .="user_firstname = '{$user_firstname}', "; 
$query .="user_lastname  = '{$user_lastname}', ";
$query .="user_email= '{$user_email}', ";
$query .="user_password  = '{$user_new_password}', ";
$query .="user_mobileno  = '{$new_mobileno}', ";  
$query .="user_address  = '{$new_user_address}' ";
$query .="WHERE user_id = {$edit_user_id} "; 
    
$update_user_query = mysqli_query($connection,$query);  
if(!$update_user_query){
    die("Query Failed".mysqli_error($connection));
}else{
  header("Location: ./profile.php");
}

    
    

}
   
   ?>
    
      <div class="container">
        <!-- Nav -->
        <nav class="main-nav">
        <a href="index.php">
          <img src="images/logo.png"alt="Easyshop" class="logo"></a>
    
          
    
          <ul class="right-menu">
            <li>
              <div class="search">    
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php">Continue Shopping</a></li>
           
            <li>
              <a href="cart.php">
                <i class="fas fa-shopping-cart"></i>
              </a>
            </li>
            </li>
          </ul>
        </nav>

        <div id="page-wrapper">
      <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    <h1 class="page-header">
                            Welcome 
                            <small><?php echo $_SESSION['username'];   ?></small>
                        </h1> 
                        
       <section>             
   <div class="container">       
    <form action="" method="post" enctype="multipart/form-data" >
    <div class="form-group">
    <lebel for="first Name">First Name</lebel>    
    <input value="<?php if(isset($user_firstname)){ echo $user_firstname;} ?>" type="text" class="form-control" name="user_firstname">   
    </div>
    
       <div class="form-group">
    <lebel for="Llast Name">Last Name</lebel>    
    <input value="<?php if(isset($user_lastname)){ echo $user_lastname;} ?>" type="text" class="form-control" name="user_lastname">   
    </div>
    <div class="form-group">
    <lebel for="username">Username</lebel>    
    <input value="<?php if(isset($username)){ echo $username;} ?>" type="text" class="form-control" name="username">   
    </div>
    
     <div class="form-group">
    <lebel for="user_email">Email</lebel>    
    <input value="<?php if(isset($user_email)){ echo $user_email;} ?>" type="email" class="form-control" name="user_email">   
    </div>
    
    <div class="form-group">
    <lebel for="user_mobileno">Mobile No:</lebel>    
    <input value="<?php if(isset($user_mobileno)){ echo $user_mobileno;} ?>" type="number" class="form-control" name="new_mobileno" >   
    </div>
    <div class="form-group">
    <lebel for="user_address">Address</lebel>    
    <input value="<?php if(isset($user_address)){ echo $user_address;} ?>" type="text"  class="form-control" name="user_address"  required>   
    </div>
    <div class="form-group">
    <lebel for="password">Password</lebel>    
    <input value="" type="password" placeholder="Enter Password" class="form-control" name="user_password"  required>   
    </div>
    
 
     <div class="form-group">
    <input type="submit" class="btn btn-primary" name="edit_user_profile" value="Update Profile">    
     </div>
    
    
    
</form>
</div>   
                       
                    </div>
                </div>
                <!-- /.row -->

        </div>
        </section>    
       <!-- /#page-wrapper -->
       <?php include "includes/footer.php" ?>