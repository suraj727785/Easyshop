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

                        <?php
if(isset($_POST['checkBoxArray'])){
   
    foreach($_POST['checkBoxArray'] as $product_value_id){
        
    $bulk_options=$_POST['bulk_options'];
        
        
        switch($bulk_options){
                
            case 'delete': 
                
                $query="DELETE FROM products WHERE product_id='{$product_value_id}' ";
                $update_to_delete=mysqli_query($connection,$query);
                confirmQuery($update_to_delete);
                
                break;
                

                
                
           
            
                
        }
        
       
        
        
    }



}
    
?>

<form action="search.php" method="post">
         <table class="table table-bordered table-hover">
         <div id="bulkOptionContainer" class="col-xs-4">
            <form class="" method="post" action="">
            <input class="form-control mr-2" name="product_search" type="text"  placeholder="Search Products">
            <button class="btn btn-light" name="new_search_product" type="submit">Search</button>
        </form>
             </div>
         <div id="bulkOptionContainer" class="col-xs-4">
              
             <select class="form-control" name="bulk_options" id="">
                 
                <option value="">Select Options</option>

                <option value="delete">Delete Multiples</option>

             </select>      
             </div>
             <div id="bulkOptionContainer" class="col-xs-4">
         <input type="submit" name="submit" class="btn btn-success" value="Delete">
        
    </div> 
                           
                            <thead>
                                    <tr>
                                       <th><input id="selectAllBoxes" type="checkbox"></th>
                                       <th>Shop Name</th>
                                        <th>Product Name</th>
                                        <th>Image</th>
                                        <th>Quantity</th>
                                        <th>Purchase Rate</th>
                                        <th>Sale Rate</th>
                                        <th>MRP</th>
                                        <th>Product Category</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
<?php
     
     if(isset($_GET['shop_id'])){
         $the_shop_id=$_GET['shop_id'];


    $query ="SELECT * FROM products WHERE product_shop_id={$the_shop_id} ";
    $select_products_query = mysqli_query($connection,$query);
 
    while($row=mysqli_fetch_assoc($select_products_query)){
    $product_id = $row['product_id'];
    $product_category_id = $row['product_category_id'];
    $product_shop_id = $row['product_shop_id'];
    $product_name = $row['product_name'];
    $product_quantities = $row['product_quantities'];
    $product_purchase_rate = $row['net_purchase_rate'];
    $product_sale_rate = $row['product_sale_rate'];
    $product_mrp = $row['product_mrp'];
    $product_image = $row['product_image'];

    $query="SELECT * FROM shops WHERE shop_id=$product_shop_id";
    $select_shop_query=mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($select_shop_query)){
        $shop_name=$row['shop_name'];
    }

        
    echo "<tr>";
    ?>
    
   <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]"value='<?php echo $product_id ; ?>' ></td>
    
    <?php
    echo "<td>{$shop_name}</td>";
    echo "<td>{$product_name}</td>";
    echo "<td><img width='100' src = '../images/$product_image' alt='images'></td>";
    echo "<td>{$product_quantities}</td>";
    echo "<td>{$product_purchase_rate}</td>";
    echo "<td>{$product_sale_rate}</td>";
    echo "<td>{$product_mrp}</td>";
        
    $query ="SELECT * FROM product_categories WHERE categories_id = $product_category_id";
    $select_product_categories_id = mysqli_query($connection,$query);

    while($row=mysqli_fetch_assoc($select_product_categories_id)){
    $cat_title = $row['categories_title'];
    $cat_id = $row['categories_id'];
        
    echo "<td>{$cat_title}</td>";
        
    }
   
    echo "<td><a  onClick= \"javascript: return confirm('Are you sure want to delete'); \"  href='product.php?delete={$product_id}'>Delete</a></td>";
        
        
    echo "</tr>";    
    
    
    
    
    }
     
    
     }
    
?>                               
                                </tbody>
                            </table>
                            </form>
                            
<?php
    if(isset($_GET['delete'])){
     
$delete_product_id=$_GET['delete'];
$query= "DELETE FROM products WHERE product_id = {$delete_product_id}";
$delete_query = mysqli_query($connection,$query);
     
header("Location: product.php");
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