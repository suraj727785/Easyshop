<?php
if(isset($_GET['add'])){
    $purchase_product_id = $_GET['add'];
    $product_quantity = $_GET['quantity'];
    
    if(!$_SESSION['username']){
       echo"<script>alert('Please login/register to add items in your cart.')</script>";   
    }
    else{
  if($product_quantity <= 0){
       echo"<script>alert('Please Add Quantity.')</script>";
  }else{
      $query= "SELECT * FROM products WHERE product_id = '{$purchase_product_id}' " ;
      $purchase_product_query = mysqli_query($connection,$query);
      while($row = mysqli_fetch_assoc($purchase_product_query)){
        $purchase_product_id = $row['product_id'];
        $purchase_product_name = $row['product_name'];  
        $purchase_product_image = $row['product_image']; 
        $purchase_product_sale_rate = $row['product_sale_rate'];
        $purchase_product_purchase_rate = $row['net_purchase_rate'];
        $purchase_product_quantities = $row['product_quantities'];
        $purchase_product_shop_id=$row['product_shop_id'];
      
          
      }
      $is_from_same_shop=true;
      $query="SELECT * FROM carts WHERE user_id = '{$_SESSION['user_id']}' ";
      $check_cart_query=mysqli_query($connection,$query);
      while($row=mysqli_fetch_assoc($check_cart_query)){
      $purchased_product_shop_id=$row['order_shop_id'];
      if($purchased_product_shop_id!==$purchase_product_shop_id){
        $is_from_same_shop=false;
        break;
      }
      }
      if(!$is_from_same_shop){
        echo"<script>alert('You can just shop from one shop at a time So removed your previously saved items in cart.')</script>";  
        $query="DELETE FROM carts WHERE user_id='{$_SESSION['user_id']}' ";
        $delete_existing_from_cart=mysqli_query($connection,$query);
      }
      
        if($purchase_product_quantities < $product_quantity){
          echo"<script>alert('Please select less quantity.')</script>";  
           }else{
             $query= " INSERT INTO carts(username,user_id,mob_no,order_id,order_product_id,order_shop_id,order_name,order_rate,order_purchase_rate,order_quantity) ";

            $query.= " VALUES('{$_SESSION['username']}','{$_SESSION['user_id']}','{$_SESSION['user_mobileno']}','{$_SESSION['user_id']}','{$purchase_product_id}','{$purchase_product_shop_id}','{$purchase_product_name}','{$purchase_product_sale_rate}','{$purchase_product_purchase_rate}','{$product_quantity}' ) ";
            
            $insert_order_query=mysqli_query($connection,$query);
            
        }
            
     
    }
      
      
  }
}






?>
