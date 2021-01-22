<?php  include "includes/header.php"; ?>
<body>
<?php 
if(isset($_SESSION['username'])){
 include "includes/navigation_user.php";
}else{
 include "includes/navigation.php";
}
?>
    
       <!-- Showcase -->
       
        <!-- Home cards 1 -->
        
        <section class="home-cards">
        <?php
        $query="SELECT * FROM shops";
        $results=mysqli_query($connection,$query);
         
        while($row=mysqli_fetch_assoc($results)){
          $shop_id=$row['shop_id'];
          $shop_name=$row['shop_name'];
          $shop_image=$row['shop_image'];
          $shop_address=$row['shop_address']
          ?>
          
          <div><a href="shop.php?shop_id=<?php echo $shop_id ?>">
          <?php 
           echo "<img src = 'images/$shop_image' style='width:250px; height:150px' alt='shop_iamge'>";
            ?></a>
            <h3><?php echo $shop_name ?></h3>
            <p><?php echo $shop_address ?>
            </p>
            <a href="shop.php">Shop Now <i class="fas fa-chevron-right"></i></a>
          </div>
       
        <?php
        }

        ?> 
        
        </section>
        
        <?php  include "includes/footer.php"; ?> 
