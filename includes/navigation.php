    
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
            <li><a href="#" data-toggle="modal" data-target="#loginModal">Login</a></li>
            <li><a href="signup.php">Register</a></li>
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
<!-------Login Modal-------->
<div class="modal" id="loginModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Login</h5>
        <button class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="post" action="includes/login.php">
          <div class="form-group">
            <label for="username">Username</label>
            <input name="username" type="text" placeholder="Username" class="form-control">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input name="password" type="password" placeholder="Password" class="form-control">
         
          </div>
        
      
      <div class="modal-footer">
        <button name="login" type="submit" class="btn btn-primary" >Login</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>

        </nav>