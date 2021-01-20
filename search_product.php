<?php  include "includes/header.php"; ?>
<body>


    
      <div class="container">
        <!-- Nav -->
        <nav class="main-nav">
        <a href="index.php">
          <img src="images/logo.png"alt="Easyshop" class="logo"></a>
          
        <?php
          if(isset($_GET['search_product'])){
                $search = $_GET['search'];
                $the_shop_id=$_GET['shop_id'];
               
               
         $query="SELECT * FROM shops WHERE shop_id =$the_shop_id";
         $shop_query=mysqli_query($connection,$query);
         while($row=mysqli_fetch_assoc($shop_query)){
          $shop_id = $row['shop_id'];
          $shop_name = $row['shop_name'];
          $shop_address=$row['shop_address'];
         }

        ?>
    
          
    
          <ul class="right-menu">
            <li>
              
            <form class="form-inline" id="search" method="get" action="search_product.php">
               <div class="search">
                 <input type="hidden" name="shop_id" value="<?php echo $the_shop_id; ?>" />
                 <input type="text"   name="search" class="searchTerm" placeholder="Search Products..." value="<?php echo $search; ?>">
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
         <li><a href="index.php"><?php echo $cat_title?></a></li>
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
              <a href="cart.php">
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

          </ul>
        </nav>
     
        <!-- Home cards 1 -->

        
        <div class="shop-top">
        <img src="images/shop.jpg" alt="Shop-image"style="width:100%;height:290px; margin-bottom:5px" >
        <h1 style="text-align:center;color: #b80019;"><?php echo $shop_name ?></h1>
        <p style="text-align:center;color:grey; margin-bottom:60px"><?php echo $shop_address ?></p>
        </div>
        <section class="home-cards">
        <?php
        $query = "SELECT * FROM products WHERE product_shop_id = $the_shop_id AND product_name LIKE '%$search%' ";
        $search_query = mysqli_query($connection,$query);
        if(!$search_query){
        die("query failed" . mysqli_error($connection));
     }
        $count = mysqli_num_rows($search_query);
        if($count == 0) {
           echo " <h1> NO RESULTS </h1>";
        }else{ 

     while($row=mysqli_fetch_assoc($search_query)){
       $product_id = $row['product_id'];
       $product_name = $row['product_name'];
       $product_mrp = $row['product_mrp'];
       $product_image = $row['product_image'];
       $product_manufacturer = $row['product_manufacturer'];
     
   
        ?>
        <div>
            <img src="images/good_day.jpg" alt="">
            <p style="color:grey; margin-bottom:0px"><?php echo $product_manufacturer ?></p>
            <h3><?php echo $product_name ?></h3>
            <p>MRP: <?php echo $product_mrp ?></p>
                   <form method="get" action="shop.php">
                     <input type="hidden" name="shop_id" value="<?php echo $the_shop_id; ?>" />
                      <label for="quantity">Qty: </label>
                      <input style="width:70px;display:inline" name="quantity"  class="form-control " type="number" id="number" value="1" min="1" >
                      <button  name="add" class="btn btn-success bg-light text-dark " value="<?php echo $product_id ?>">ADD  <i class="fa fa-shopping-basket" aria-hidden="true"></i></button> 
                      </form>
          </div>
          <?php 
         }
        }
        ?>
        </section>
        <?php 
         }
        ?>
  
        <?php  include "includes/footer.php"; ?> 
