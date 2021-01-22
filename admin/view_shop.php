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
                            Welcome to Admin
                            <small><?php echo $_SESSION['username'];   ?></small>
                        </h1> 

                       
 <table class="table table-bordered table-hover">
                            <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Shop Name</th>
                                        <th>Shop Type</th>
                                        <th>Owner name</th>
                                        <th>Owner Username</th>
                                        <th>Shop Addreess</th>
                                        <th>View Products</th>
                                        <th>Delete Shop</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
<?php
  
     $query ="SELECT * FROM shops";
    $select_shops = mysqli_query($connection,$query);
    $count=1;

    while($row=mysqli_fetch_assoc($select_shops)){
    $shop_id = $row['shop_id'];
    $shop_name = $row['shop_name'];
    $shop_type = $row['shop_type'];
    $owner_name = $row['shop_owner_name'];
    $owner_username = $row['shop_owner_username'];
    $shop_address = $row['shop_address'];
   
        
    echo "<tr>";
    
    echo "<td>{$count}</td>";
    echo "<td>{$shop_name}</td>";
    echo "<td>{$shop_type}</td>";
    echo "<td>{$owner_name}</td>";
    echo "<td>{$owner_username}</td>";
        
     
    echo "<td>{$shop_address}</td>";
    echo "<td><a href='shop_product.php?shop_id={$shop_id}'>View</a></td>";
    echo "<td><a href='view_shop.php?delete={$shop_id}'>Delete</a></td>";
    
        
        
    echo "</tr>";    
    
    
    
    $count=$count+1;
    }
    
    
    
?>                               
                                </tbody>
                            </table>
                            
<?php
if(isset($_GET['delete'])){
     
$delete_shop_id=$_GET['delete'];
$query="SELECT * FROM shops WHERE shop_id = {$delete_shop_id}";
$select_shops_query=mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($select_shops_query)){
    $shop_owner_username=$row['shop_owner_username'];
}

$query= "DELETE FROM products WHERE product_shop_id = {$delete_shop_id}";
$delete_shop_product_query = mysqli_query($connection,$query);

$query= "DELETE FROM product_categories WHERE shop_id = {$delete_shop_id}";
$delete_shop_categories_query = mysqli_query($connection,$query);

$query= "DELETE FROM shops WHERE shop_id = {$delete_shop_id}";
$delete_shop_query = mysqli_query($connection,$query);

$query= "UPDATE users SET user_role ='Subscriber' WHERE username='{$shop_owner_username}' ";
$change_to_sub_query = mysqli_query($connection,$query); 


header("Location: view_shop.php");
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