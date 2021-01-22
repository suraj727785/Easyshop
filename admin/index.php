<?php include "includes/header.php"  ?>
    <div id="wrapper">
<?php
    
    
?>
        <!-- Navigation -->
       <?php include "includes/navigation.php"?>

        <div id="page-wrapper">

            <div class="container-fluid">
                
                
                

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                       
                        <h1 class="page-header">
                            Welcome to Admin
                            <small><?php echo $_SESSION['username'];   ?></small>
                        </h1>
                        
                        
                       
                    </div>
                </div>
                <!-- /.row -->
                
<?php
                
$query="SELECT * FROM products ";
$select_all_products=mysqli_query($connection,$query);
$all_products_count=mysqli_num_rows($select_all_products);  
            
$query="SELECT * FROM users WHERE user_role = 'Subscriber' ";
$select_all_subscribers=mysqli_query($connection,$query);
$subscribers_count=mysqli_num_rows($select_all_subscribers);  

$query="SELECT * FROM shops ";
$select_all_shops=mysqli_query($connection,$query);
$shops_count=mysqli_num_rows($select_all_shops); 
                
$query="SELECT * FROM users WHERE user_role = 'Admin' ";
$select_all_admin=mysqli_query($connection,$query);
$admin_count=mysqli_num_rows($select_all_admin);                 
                
                
                
?>                
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x" aria-hidden="true"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                      
                    <?php
                    $query="SELECT * FROM shops ";
                   $select_all_shops=mysqli_query($connection,$query);
                   $shops_count=mysqli_num_rows($select_all_shops);        

                    echo  "<div class='huge'>{$shops_count}</div>";


                    ?>  
               
                        <div>Shops</div>
                    </div>
                </div>
            </div>
            <a href="post.php">
                <div class="panel-footer">
                    <span class="pull-left">View All Shops</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-product-hunt fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                    <?php
                    $query="SELECT * FROM products ";
                    $select_all_products=mysqli_query($connection,$query);
                    $products_count=mysqli_num_rows($select_all_products);        

                    echo  "<div class='huge'>{$products_count}</div>";

                    ?>  
                     
                      <div>Products</div>
                    </div>
                </div>
            </div>
            <a href="product.php">
                <div class="panel-footer">
                    <span class="pull-left">View All Products</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                    <?php
                    $query="SELECT * FROM users ";
                    $select_all_users_query=mysqli_query($connection,$query);
                    $users_count=mysqli_num_rows($select_all_users_query);        

                    echo  "<div class='huge'>{$users_count}</div>";


                    ?>  

                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row --> 
                <div class="row">
                    
                    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'count'],
            <?php
            
  $element_text=['Shops','Products','Admin','Users',];
  $element_count=[$shops_count,$all_products_count,$admin_count,$subscribers_count];
            
            
            for($i=0 ; $i<4 ; $i++){
                
            echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}], ";
                
                
            }
            
            
            
            ?>
            
//          ['posts', 1000,],
         
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
                    
     <div id="columnchart_material" style="width: auto; height: 500px;"></div>            
                    
                </div>   
                
                

            </div>
            <!-- /.container-fluid -->
       
            

        </div>
       <!-- /#page-wrapper -->
       <?php include "includes/footer.php" ?>