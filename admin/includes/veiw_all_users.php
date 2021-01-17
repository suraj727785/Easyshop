
 <table class="table table-bordered table-hover">
                            <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Username</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Mobile No</th>
                                        <th>Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
<?php
  
     $query ="SELECT * FROM users";
    $select_users = mysqli_query($connection,$query);

    while($row=mysqli_fetch_assoc($select_users)){
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_mobileno= $row['user_mobileno'];
    $user_address = $row['user_address'];
   
        
    echo "<tr>";
    
    echo "<td>{$user_id}</td>";
    echo "<td>{$username}</td>";
    echo "<td>{$user_firstname}</td>";
    echo "<td>{$user_lastname}</td>";
    echo "<td>{$user_email}</td>"; 
    echo "<td>{$user_mobileno}</td>";
    echo "<td>{$user_address}</td>";
    
        
        
    echo "</tr>";    
    
    
    
    
    }
    
    
    
?>                               
                                </tbody>
                            </table>

 