<?php  include "includes/header.php"; ?>
<body>



      <?php 
        if(isset($_GET['shop_id'])){
         $the_shop_id=$_GET['shop_id'];
         

        ?>
    
      <div class="container">
        <!-- Nav -->
        <nav class="main-nav">
        <a href="index.php">
          <img src="images/logo.png"alt="Easyshop" class="logo"></a>
    
          
    
          <ul class="right-menu">
            <li>
              <div class="search">
                 <input type="text" class="searchTerm" placeholder="What are you looking for?">
                 <button type="submit" class="searchButton">
                   <i class="fa fa-search"></i>
                </button>
           </div>
          </li><div class="containe">
          <li>Shop By Category
        <ul class="drop-menu menu-4" style="display:inline" >
          <?php
          $query="SELECT * FROM product_categories WHERE shop_id=$the_shop_id";
          $cat_query=mysqli_query($connection,$query);
          while($row=mysqli_fetch_assoc($cat_query)){
           $cat_id = $row['categories_id'];
           $cat_title = $row['categories_title'];

          ?>
         <li><a href=""></a><?php echo $cat_title?></li>
         <?php
          }
          ?>
        </ul>
      </li>
        </div>
            <li>
              <a href="cart.php">
                <i class="fas fa-shopping-cart"></i>
              </a>
            </li>
            <li>
              <a href="profile.php">
              <i class="fa fa-user" aria-hidden="true"></i>
              </a>
            </li>
          </ul>
        </nav>
     
        <!-- Home cards 1 -->

        <?php
        $query="SELECT * FROM shops WHERE shop_id =$the_shop_id";
         $shop_query=mysqli_query($connection,$query);
         while($row=mysqli_fetch_assoc($shop_query)){
          $shop_id = $row['shop_id'];
          $shop_name = $row['shop_name'];
          $shop_address=$row['shop_address'];

        ?>
        
        <div class="shop-top">
        <img src="images/shop.jpg" alt="Shop-image"style="width:100%;height:290px; margin-bottom:5px" >
        <h1 style="text-align:center;color: #b80019;"><?php echo $shop_name ?></h1>
        <p style="text-align:center;color:grey; margin-bottom:60px"><?php echo $shop_address ?></p>
        </div>
        <section class="home-cards">
        <div>
            <img src="images/good_day.jpg" alt="">
            <p style="color:grey; margin-bottom:0px">Britainia</p>
            <h3>Good Day 100g</h3>
            <p>MRP: 10</p>
            <form method="get">
                      <label for="quantity">Qty: </label>
                      <input style="width:70px;display:inline" name="quantity"  class="form-control " type="number" id="number" value="1" min="1" >
                      <button  name="add" class="btn btn-success bg-light text-dark " value="<?php echo $product_id ?>">ADD  <i class="fa fa-shopping-basket" aria-hidden="true"></i></button> 
                      </form>
          </div>
         
        </section>
        <?php 
         }}
        ?>
  
        <?php  include "includes/footer.php"; ?> 
