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
           
            <li>
              <a href="cart.php">
                <i class="fas fa-shopping-cart"></i>
              </a>
            </li><li>
              <a href="profile.php">
              <i class="fa fa-user" aria-hidden="true"></i>
              </a>
            </li>
          </ul>
        </nav>

        <div class="container">
        <h1 class="page-header">
        Your Orders
        </h1>
        </div>

        <table class="table table-bordered table-hover">
                            <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Shop Name</th>
                                        <th>Shop Address</th>
                                        <th>Shop Mobile No.</th>
                                        <th>Amount</th>
                                        <th>Delivery Option</th>
                                </thead>
                                <tbody>
                                

        
 <tr>
    
    <td>1</td>
    <td>Budget Bazaar</td>
    <td>Station Road,Gaya</td>
    <td>9939298946</td>
    <td>1050</td> 
    <td>Pick-up</td>
    
    </tr>    
                             
                                </tbody>
                            </table>

 
















<?php include "includes/footer.php" ?>