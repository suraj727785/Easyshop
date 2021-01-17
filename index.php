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
          <div><a href="shop.php">
            <img src="images/shop.jpg" alt=""></a>
            <h3>Annat Gift Shop</h3>
            <p>Bypass Road,Gaya,Bihar
            </p>
            <a href="shop.php">Shop Now <i class="fas fa-chevron-right"></i></a>
          </div>
        </section>
        <?php  include "includes/footer.php"; ?> 
