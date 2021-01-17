<?php  include "includes/header.php"; ?>
<body>
    
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
                            <small>isuraj86</small>
                        </h1> 
                        
       <section>             
   <div class="container">       
    <form action="" method="post" enctype="multipart/form-data" >
    <div class="form-group">
    <lebel for="first Name">First Name</lebel>    
    <input value="Suraj" type="text" class="form-control" name="user_firstname">   
    </div>
    
       <div class="form-group">
    <lebel for="Llast Name">Last Name</lebel>    
    <input value="Kumar" type="text" class="form-control" name="user_lastname">   
    </div>
    <div class="form-group">
    <lebel for="username">Username</lebel>    
    <input value="isuraj86" type="text" class="form-control" name="username">   
    </div>
    
     <div class="form-group">
    <lebel for="user_email">Email</lebel>    
    <input value="surajkr727785@gmail.com" type="email" class="form-control" name="user_email">   
    </div>
    
    <div class="form-group">
    <lebel for="user_mobileno">Mobile No:</lebel>    
    <input value="9162741700" type="number" class="form-control" name="new_mobileno" >   
    </div>
    <div class="form-group">
    <lebel for="password">Address</lebel>    
    <input value="Maranpur, Bypass Road, Gaya" type="text"  class="form-control" name="user_password"  required>   
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