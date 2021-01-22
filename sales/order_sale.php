<?php include "includes/header.php"  ?>
    <div id="wrapper">

 

        <!-- Navigation -->
       <?php include "includes/navigation.php"?>
        <div id="page-wrapper">
       <div class="container-fluid">
           
       </div><!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    <h1 class="page-header">
                            Welcome to Sales
                            <small><?php echo $_SESSION['username'];   ?></small>
                        </h1> 
            
                         
<?php


if(isset($_GET['order_id'])){
$select_id = $_GET['order_id'];
    
    
$query="SELECT * FROM checkout WHERE order_user_id = {$select_id} ";
$sell_products_query = mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($sell_products_query)){
  

    $full_name = $row['full_name'];
    $mob_no = $row['mob_no'];
    $full_address = $row['full_address'];      

?>
                               
                          <div class="form-inline" style="margin-bottom:15px">
                            <div class="form-group">
                            <lebel for="name">Customer Name:</lebel>    
                            <input value="<?php  echo $full_name;  ?>" type="text" class="form-control" name="customer_name">   
                            </div>
                            <div class="form-group">
                            <lebel for="mobile no">Mobile No:</lebel>    
                            <input value="<?php  echo $mob_no;  ?>" type="text" class="form-control" name="mobile_no">   
                            </div>
                            
                            <div class="form-group">
                            <lebel for="address">Address:</lebel>    
                            <input value="<?php  echo $full_address;  ?>" type="text" class="form-control" name="address">   
                            </div>
                            </div>
<?php
break;
    
}
    ?>

                        
                        
                        <table class="table table-bordered table-hover">


                           
                            <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>MRP</th>
                                        <th>Quantity</th>
                                        <th>Discount %</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
$query="SELECT * FROM checkout WHERE order_user_id = {$select_id} AND placed_shop_id='{$_SESSION['shop_id']}' ";
$sell_products_query = mysqli_query($connection,$query);
$total_amount=0;
$total_purchase_amount=0;
while($row=mysqli_fetch_assoc($sell_products_query)){
  
    $order_checkout_id = $row['checkout_id'];
    $order_user_id = $row['order_user_id'];
    $placed_product_id = $row['placed_product_id'];
    $order_name = $row['order_name'];
    $order_rate = $row['order_rate'];
    $order_quantity = $row['order_quantity']; 
    $order_purchase_rate= $row['order_purchase_rate'];  
    $total_purchase_amount = $total_purchase_amount + ($order_purchase_rate * $order_quantity);
    $total_amount=$total_amount + ($order_rate*$order_quantity);
    
 
    
    
    ?> 
                        
                        <form action="" method="get">        
                                
                                
                                <tr>
                                <td><?php echo $order_name ?></td>
                                <td><?php echo $order_rate ?></td>
                                <td><?php echo $order_quantity ?></td>
                                <td><input type='text' value='5'> </td>
                                <td><button name="delete_product" class="btn btn-danger" value="<?php echo $order_checkout_id ?>">Delete</button></td>
                                <input type="hidden" name="order_id" value="<?php echo $select_id ?>"/>
                                <?php
         }

                }
                
                ?>   
                                </tr>                          
                                </tbody>
                            </table>
                            <div class="form-inline">
                            <div class="form-group">
                         <label for="net amount"> Total Amount: </label>   
                        <input class="form-group" name="sell_amount" value="<?php echo $total_amount; ?>"  disabled>
                        </div>
                        <div class="form-group"> 
                        <button value="<?php echo $order_user_id ?>" name="place_order" class="btn btn-success">Confirm Order</button>
                        </div>
                        </div>
                        </form>
                            
                        <?php
    if(isset($_GET['delete_product'])){
     
$delete_checkout_id=$_GET['delete_product'];
$order_id=$_GET['order_id'];
$query= "DELETE FROM checkout WHERE checkout_id = {$delete_checkout_id}";
$delete_query = mysqli_query($connection,$query);
   header("Location: order_sale.php?order_id=$order_id"); 
     

 }          



    if(isset($_GET['place_order'])){
    $user_id = $_GET['place_order'];
    $query = "INSERT INTO report(sell_amount,sell_date,purchase_amount,report_shop_id) ";
    $query.="VALUES('{$total_amount}',now(),'{$total_purchase_amount}','{$_SESSION['shop_id']}' ) ";
    $report_query=mysqli_query($connection,$query);
    
    $query = "DELETE FROM checkout WHERE order_user_id = {$user_id} AND placed_shop_id='{$_SESSION['shop_id']}' ";
    $delete_checkout = mysqli_query($connection,$query); 
    
    $query = "DELETE FROM orders WHERE order_user_id = {$user_id} AND order_shop_id='{$_SESSION['shop_id']}' ";
    $delete_order = mysqli_query($connection,$query);
    header("Location: orders.php");
}                       
                         
                         
                         
?>

                          
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
       <!-- /#page-wrapper -->
       <?php include "includes/footer.php" ?>