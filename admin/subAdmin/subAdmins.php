<?php

session_start();
include '../../config.php';

include '../adminController.php';

$admin = new admin(null, $db);
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
                    $admin->subAdmin_data_view($query);
                ?>
            </tbody>
        </table>
        <span class="addSubAd">
            <button class="add_buttonSubAd rightSubAd"><a href="../admin_panel.php" class="alinkSubAd">Back</a></button>
        </span>
        
    </body>
</html>