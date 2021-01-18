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
            <li><a href="includes/logout.php">Logout</a></li>
           
            <li>
              <a href="cart.php">
                <i class="fas fa-shopping-cart"></i>
              </a>
            </li>
            </li>
          </ul>
        </nav>
        <?php

        $the_user_id=$_SESSION['user_id'];
        $query="SELECT * FROM users WHERE user_id=$the_user_id ";
        $user_query=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($user_query)){
          $user_id = $row['user_id'];
          $username = $row['username'];
          $user_firstname = $row['user_firstname'];
          $user_lastname = $row['user_lastname'];
          $user_email = $row['user_email'];
          $user_mobileno = $row['user_mobileno'];
          $user_address=$row['user_address'];

        }
      
        ?>

        <section>
   <div class="container">

     <h1 class="page-header">
    Welcome 
    <small><?php echo $username ?></small>
</h1> 
                        

<div class="header">
 <label class="label" for="name">Name:</label>
  <h3><?php echo $user_firstname; echo " "; echo "$user_lastname";  ?><h3><br>
  <label class="label" for="email">Email:</label>
  <h3><?php echo $user_email; ?></h3><br>
  <label class="label" for="mobileno">Mobile No:</label>
  <h3><?php echo $user_mobileno; ?></h3><br>
  <label class="label" for="address">Address:</label>
  <h3><?php echo $user_address; ?></h3><br>
  <a class="btn btn-secondary" href="edit_profile.php?u_id=<?php echo $user_id; ?>">Update Profile</a>
  <a class="btn btn-secondary" href="view_orders.php">View Your Orders</a> 
    
</div>

</div>
</section>













        <?php  include "includes/footer.php"; ?> 