<?php  include "includes/header.php"; ?>
<body>
<div class="container">
        <!-- Nav -->
        <nav class="main-nav">
        <a href="index.php">
          <img  src="images/logo.png"alt="Easyshop" class="logo"></a>
    
          <ul class="right-menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php">Continue Shopping</a></li>
            <li>
              <a href="profile.php">
              <i class="fa fa-user" aria-hidden="true"></i>
              </a>
            </li>
          </ul>


        </nav>
  <div id="w">
    <header id="title">
      <h1>Your Cart</h1>
    </header>
    <div id="page">
      <table id="cart">
        <thead>
          <tr>
            <th class="first">Photo</th>
            <th class="second">MRP</th>
            <th class="second">Qty</th>
            <th class="third">Product</th>
            <th class="fourth">Sub Total</th>
            <th class="fifth">&nbsp;</th>
          </tr>
        </thead>
        <tbody>

                <?php
            $total_price=0;

        $query = "SELECT * FROM carts WHERE user_id = '{$_SESSION['user_id']}' ";
        $enter_cart_query=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($enter_cart_query)){
        $order_id=$row['order_id'];
        $order_product_id=$row['order_product_id'];
        $item=$row['order_name'];
        $unit_price=$row['order_rate'];
        $unit_quantity=$row['order_quantity'];
        $sub_total= $unit_price * $unit_quantity;
        $total_price=$total_price + $sub_total;
        ?>
          <!-- shopping cart contents -->
          <tr class="productitm">
            <td><img style="height:80px;width:120px" src="images/good_day.jpg" class="thumb"></td>
            <td><?php echo $unit_price ?></td>
            <td><?php echo $unit_quantity ?></td>
            <td><?php echo $item ?></td>
            <td><?php echo $sub_total ?></</td>
            <td><span class="remove"><img src="https://i.imgur.com/h1ldGRr.png" alt="X"></span></td>
          </tr>
          <?php
          }
          ?>
          
          
          <tr class="totalprice">
            <td class="light">Total:</td>
            <td colspan="2">&nbsp;</td>
            <td colspan="2"><span class="thick"><?php echo $total_price; ?> Rupees</span></td>
          </tr>
          

          <!-- checkout btn -->
            <div class="contain" style="width:100%" >
            <form action="" method= "post">
              <div class="form-inline" style="display: flex;justify-content:space-around;" >
                <div class="form-input" >
                <label for="full name"><b>Your Name</b></label>
                <input name="new_name" type="text" class="form-control" value="<?php echo $_SESSION['user_firstname']; echo " "; echo $_SESSION['user_lastname'];  ?>">
               </div>
                <div class="form-input" >
                <label for="full name"><b>Mobile no.</b></label>
                <input name="new_mobno" type="text" class="form-control" value="<?php echo $_SESSION['user_mobileno']; ?>">
                </div>
                 </div>
                 <div class="form-inline" style="display: flex;justify-content:space-around;" >
                <div class="form-input">
                <label for="full name"><b>Full Address</b></label>
                <input name="full_address" type="text" class="form-control" placeholder="Please Enter full Adderess">
                </div><div class="form-input">
                <label for="delivery"><b>Delivery Options</b></label>
                <select class="form-control" style="width:100%; margin-right:45px"  name="" id="">
                <option value="">Pick-up</option>
                <option value="">Home Delivery</option>
                </select>
                </div>
                </div>
                </div>
         <tr class="checkoutrow"  >
           <input type="hidden" name="total_price" value="<?php echo $total_price ?>" >
            <td colspan="5" class="checkout"><button name="order" id="submitbtn">Confirm Order!</button></td>
          </tr>
              </form>
              
        </tbody>
      </table>
    </div>
  </div>
</body>

<?php include "includes/checkout.php" ?>
<?php  include "includes/footer.php"; ?>