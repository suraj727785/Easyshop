    
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
          </li>
          <?php 
        if(isset($_SESSION['user_role'])){
        $user_role=$_SESSION['user_role'];
        if($user_role==='Admin'){
          echo  "<li><a href='admin'>Admin</a></li>";
        }
        elseif($user_role==='Salesman'){
          echo  "<li><a href='sales'>Sale</a></li>";
        }
        }
?>
         <li><a href='includes/logout.php'>Logout</a></li>
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