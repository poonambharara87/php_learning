<?php
include '../../config.php';
include '../adminController.php';

if(isset($_SESSION['admin']) || isset($_SESSION['sub_admin'])){
    
}else{
    header("location:../admin_login.php");
}

$admin = new admin(null, $db);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>All Sub-Admins</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../css/style.css">

    </head>
    <body>
        <div class="container-box">
            <span class="addSubAd">
                <button class="add_buttonSubAd rightMoreSubAd"><a href="add_subAdmin.php" class="alinkSubAd">Add</a></button>
            </span>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>  
                        <th>Role</th>                     
                        <th colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query="select * from users WHERE role=2";
                        $stmt = $admin->subAdmin_data_view($query);
                        if($stmt->rowCount() > 0){
                            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                            ?>
                            <tr>
                                <td><?php  if(isset($row['user_id'])){ print_r($row['user_id']);}?></td>
                                <td><?php  if(isset($row['user_firstname'])){ print_r($row['user_firstname']);}?></td>
                                <td><?php  if(isset($row['user_lastname'])){ print_r($row['user_lastname']);}?></td>
                                <td><?php  if(isset($row['user_email'])){ print_r($row['user_email']);}?></td>
                                <td><?php  if(isset($row['role'])){ print_r($row['role']);}?></td>
                                <td><a href="edit_subAdmin.php?id=<?php echo $row['user_id'];?>">Edit</a></td>
                                <td><a href="delete_subAdmin.php?id=<?php echo $row['user_id'];?>">Delete</a></td>        
                            </tr>
                        <?php

                        ?>
                        <?php
                        }
                    }                
                        
                    ?>
                </tbody>
            </table>
            <span class="addSubAd">
                <button class="add_buttonSubAd rightSubAd"><a href="../admin_panel.php" class="alinkSubAd">Back</a></button>
            </span>
        </div>
    </body>
</html>