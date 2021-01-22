    
      <div class="container">
        <!-- Nav -->
        <nav class="main-nav">
        <a href="index.php">
          <img src="images/logo.png"alt="Easyshop" class="logo"></a>
    
          <ul class="right-menu">
            <li>
            <form class="form-inline" id="search" method="get" action="search_shop.php">
               <div class="search">
                 <input type="text" name="search" class="searchTerm" placeholder="Search shops..">
                 <button type="submit" name="search_shop" class="searchButton">
                   <i class="fa fa-search"></i>
                </button>
                </div>
                </form>
          </li>
          <?php 
        if(isset($_SESSION['user_role'])){
        $user_role=$_SESSION['user_role'];
        if($user_role==='Admin'){
          echo  "<li><a href='admin'>Admin</a></li>";
        }
        elseif($user_role==='Sales'){
          echo  "<li><a href='sales'>Sales</a></li>";
        }
        }
?>
         <li><a href='includes/logout.php'>Logout</a></li>
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
          </ul>


        </nav>