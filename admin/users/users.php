<?php
   
session_start();
include '../../database/config.php';
include 'usersControlller.php';

$users = new users($db);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>All Users </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../css/style.css">

    </head>
    <body>
        <span class="addUsr">
            <button class="add_buttonUsr rightMoreUsr"><a href="add_user.php" class="alinkUsr">Add</a></button>
        </span>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>                   
                    <th colspan="4">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query="select * from users WHERE role=3";
                    
                    $stmt = $users->user_data_view($query);

                    if($stmt->rowCount() > 0){
                        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                    ?>
                            <?php
                                if($row['status'] == 0){
                                    ?>  
                                    <tr>
                                        <td><?php  if(isset($row['user_id'])){ print_r($row['user_id']);}?></td>
                                        <td><?php  if(isset($row['user_firstname'])){ print_r($row['user_firstname']);}?></td>
                                        <td><?php  if(isset($row['user_lastname'])){ print_r($row['user_lastname']);}?></td>
                                        <td><?php  if(isset($row['user_email'])){ print_r($row['user_email']);}?></td>
                                        <td><a href="active.php?id=<?php echo $row['user_id'];?>">Active</a></td>
                                        <td><a href="edit.php?id=<?php echo $row['user_id'];?>">Edit</a></td>
                                        <td><a href="delete.php?id=<?php echo $row['user_id'];?>">Delete</a></td>        
                                    </tr>                 
            
                                        <?php
                                }else{
                                    ?>            
                                    <tr>
                                        <td><?php  if(isset($row['user_id'])){ print_r($row['user_id']);}?></td>
                                        <td><?php  if(isset($row['user_firstname'])){ print_r($row['user_firstname']);}?></td>
                                        <td><?php  if(isset($row['user_lastname'])){ print_r($row['user_lastname']);}?></td>
                                        <td><?php  if(isset($row['user_email'])){ print_r($row['user_email']);}?></td>
                                        <td><a href="deactive.php?id=<?php echo $row['user_id'];?>">Diactivate</a></td>
                                        <td><a href="edit.php?id=<?php echo $row['user_id'];?>">Edit</a></td>
                                        <td><a href="delete.php?id=<?php echo $row['user_id'];?>">Delete</a></td>        
                                    </tr>
                                <?php
                                    }
                                ?>
                    <?php
                    
                    }
                }                   
                ?>
            </tbody>
        </table>
        <span class="add">
            <button class="add_buttonUsr rightUsr"><a href="../admin_panel.php" class="alinkUsr">Back</a></button>
        </span>
        
    </body>
</html>