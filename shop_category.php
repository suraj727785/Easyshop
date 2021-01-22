<?php  include "includes/header.php"; ?>
<body>



      <?php 
        if(isset($_GET['cat_id'])){
         $the_cat_id=$_GET['cat_id'];
         $query="SELECT * FROM product_categories where categories_id='{$the_cat_id}' ";
         $get_cat_details=mysqli_query($connection,$query);
         while($row=mysqli_fetch_assoc($get_cat_details)){
             $the_shop_id=$row['shop_id'];
         }
         

        ?>
    
      <div class="container">
        <!-- Nav -->
        <nav class="main-nav">
        <a href="index.php">
          <img src="images/logo.png"alt="Easyshop" class="logo"></a>
    
          
    
          <ul class="right-menu">
            <li>
              
               <form class="form-inline" id="search" method="get" action="search_product.php">
               <div class="search">
                 <input type="hidden" name="shop_id" value="<?php echo $the_shop_id; ?>" />
                 <input type="text"   name="search" class="searchTerm" placeholder="Search Products...">
                 <button type="submit" name="search_product" class="searchButton">
                   <i class="fa fa-search"></i>
                </button>
                </div>
                </form>
           
          </li>
          <div class="containe">
          <li>Shop By Category
        <ul class="drop-menu menu-4" style="display:inline" >
          <?php
          $query="SELECT * FROM product_categories WHERE shop_id=$the_shop_id";
          $cat_query=mysqli_query($connection,$query);
          while($row=mysqli_fetch_assoc($cat_query)){
           $cat_id = $row['categories_id'];
           $cat_title = $row['categories_title'];

          ?>
         <li><a href="shop_category.php?cat_id=<?php echo $cat_id; ?>"><?php echo $cat_title?></a></li>
         <?php
          }
          ?>
        </ul>
      </li>
        </div>
        <?php 
      if(isset($_SESSION['username'])){

        ?>
            <li>
              <a href="cart.php?p_cart=<?php echo $_SESSION['username'] ?>">
                <i class="fas fa-shopping-cart"></i>
              </a>
            </li>
            <li>
              <a href="profile.php">
              <i class="fa fa-user" aria-hidden="true"></i>
              </a>
            </li>
            <?php
            }else{  
             ?>
            <li><a href="index.php">Home</a></li>
          </ul>
          <?php
            }  
             ?>
        </nav>
     
        <!-- Home cards 1 -->

        <?php
        $query="SELECT * FROM shops WHERE shop_id =$the_shop_id";
         $shop_query=mysqli_query($connection,$query);
         while($row=mysqli_fetch_assoc($shop_query)){
          $shop_id = $row['shop_id'];
          $shop_name = $row['shop_name'];
          $shop_address=$row['shop_address'];
          $shop_image=$row['shop_image'];
         }

        ?>
        
        <div class="shop-top">
        <a href="shop.php?shop_id=<?php echo $shop_id ?>">
        <?php
        echo"<img src='images/$shop_image' alt='Shop-image'style='width:100%;height:290px; margin-bottom:5px' >";
        ?>
        </a>
        <h1 style="text-align:center;color: #b80019;"><?php echo $shop_name ?></h1>
        <p style="text-align:center;color:grey; margin-bottom:60px"><?php echo $shop_address ?></p>
        </div>
        <section class="home-cards">
        <?php
        $query="SELECT * FROM products WHERE product_shop_id =$the_shop_id AND product_category_id = $the_cat_id ";
         $product_query=mysqli_query($connection,$query);
         while($row=mysqli_fetch_assoc($product_query)){
          $product_id = $row['product_id'];
          $product_shop_id=$row['product_shop_id'];
          $product_name = $row['product_name'];
          $product_mrp=$row['product_mrp'];
          $product_image=$row['product_image'];
          $product_manufacturer=$row['product_manufacturer']

        ?>
        <div>
        <?php 
           echo "<img src = 'images/$product_image' style='width:250px; height:150px' alt='product_iamge'>";
            ?>
            <p style="color:grey; margin-bottom:0px"><?php echo $product_manufacturer ?></p>
            <h3><?php echo $product_name ?></h3>
            <p>MRP: <?php echo $product_mrp ?></p>
                   <form method="get">
                     <input type="hidden" name="shop_id" value="<?php echo $the_shop_id; ?>" />
                      <label for="quantity">Qty: </label>
                      <input style="width:70px;display:inline" name="quantity"  class="form-control " type="number" id="number" value="1" min="1" >
                      <button  name="add" class="btn btn-success bg-light text-dark " value="<?php echo $product_id ?>">ADD  <i class="fa fa-shopping-basket" aria-hidden="true"></i></button> 
                      </form>
          </div>
          <?php 
         }
        ?>
        </section>
        <?php 
         }
        ?>
        
        <!--------Add To Cart -------------->
        <?php include "includes/add_cart.php"?>
        <?php  include "includes/footer.php"; ?> 
