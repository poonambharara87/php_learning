<?php
   
session_start();
include '../../config.php';
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
                    <th>Role</th>  
                    <th>Status</th>                     
                    <th colspan="4">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query="select * from users WHERE role=3";
                    
                    $users->user_data_view($query);

                    
                ?>
            </tbody>
        </table>
        <span class="add">
            <button class="add_buttonUsr rightUsr"><a href="../admin_panel.php" class="alinkUsr">Back</a></button>
        </span>
        
    </body>
</html>