<?php  include "includes/header.php"; ?>
<body>
<div class="container">
        <!-- Nav -->
        <nav class="main-nav">
        <a href="index.php">
          <img src="images/logo.png"alt="Easyshop" class="logo"></a>
    
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
            <th class="second">Qty</th>
            <th class="third">Product</th>
            <th class="fourth">Sub Total</th>
            <th class="fifth">&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          <!-- shopping cart contents -->
          <tr class="productitm">
            <!-- http://www.inkydeals.com/deal/ginormous-bundle/ -->
            <td><img src="https://i.imgur.com/8goC6r6.png" class="thumb"></td>
            <td><input type="number" value="1" min="0" max="99" class="qtyinput"></td>
            <td>Design Bundle Package</td>
            <td>79.00</td>
            <td><span class="remove"><img src="https://i.imgur.com/h1ldGRr.png" alt="X"></span></td>
          </tr>
          <tr class="productitm">
            <!-- http://www.amazon.com/Stuff-My-Cat-The-Book/dp/0811855384 -->
            <td><img src="https://i.imgur.com/RkzoXzZ.png" class="thumb"></td>
            <td><input type="number" value="1" min="0" max="99" class="qtyinput"></td>
            <td>Stuff on my Cat: The Book</td>
            <td>8.95</td>
            <td><span class="remove"><img src="https://i.imgur.com/h1ldGRr.png" alt="X"></span></td>
          </tr>
          <tr class="productitm">
            <!-- http://www.amazon.com/SpongeBob-SquarePants-The-First-Episodes/dp/B002DYJTVW -->
            <td><img src="https://i.imgur.com/vZ26Uwy.png" class="thumb"></td>
            <td><input type="number" value="1" min="0" max="99" class="qtyinput"></td>
            <td>SpongeBob's First 100 </td>
            <td>75.00</td>
            <td><span class="remove"><img src="https://i.imgur.com/h1ldGRr.png" alt="X"></span></td>
          </tr>
          <tr class="productitm">
            <!-- http://www.barnesandnoble.com/w/javascript-and-jquery-david-sawyer-mcfarland/1100405042 -->
            <td><img src="https://i.imgur.com/tEdRnz4.png" class="thumb"></td>
            <td><input type="number" value="1" min="0" max="99" class="qtyinput"></td>
            <td>JavaScriptjQuery:The Missing </td>
            <td>27.50</td>
            <td><span class="remove"><img src="https://i.imgur.com/h1ldGRr.png" alt="X"></span></td>
          </tr>
          
          <!-- tax + subtotal -->
          <tr class="extracosts">
            <td class="light">Shipping  Tax</td>
            <td colspan="2" class="light"></td>
            <td>35.00</td>
            <td>&nbsp;</td>
          </tr>
          <tr class="totalprice">
            <td class="light">Total:</td>
            <td colspan="2">&nbsp;</td>
            <td colspan="2"><span class="thick">225.45</span></td>
          </tr>
          

          <!-- checkout btn -->
            <div class="contain" style="width:100%" >
            <form action="" method= "post">
              <div class="form-inline" style="display: flex;justify-content:space-around;" >
                <div class="form-input" >
                <label for="full name"><b>Your Name</b></label>
                <input name="new_name" type="text" class="form-control" value="Suraj Kumar">
               </div>
                <div class="form-input" >
                <label for="full name"><b>Mobile no.</b></label>
                <input name="new_mobno" type="text" class="form-control" value="9162741700">
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
              </form>
              </div>
         <tr class="checkoutrow"  >
            <td colspan="5" class="checkout"><button id="submitbtn">Confirm Order!</button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  
</body>
<?php  include "includes/footer.php"; ?>