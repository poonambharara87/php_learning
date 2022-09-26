<?php
session_start();
include '../../config.php';
include 'blogController.php';

// if(isset($_SESSION['admin']) || isset($_SESSION['sub_admin'])){

// }else{
//     header("location:blogs.php");
// } 
$blogs = new blogs($db);
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
        <span class="addblog">
            <button class="add_buttonblog rightMoreblog"><a href="blog.php" class="alinkblog">Add</a></button>
        </span>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tittle</th>
                    <th>Description</th>
                    <th>Image</th> 
                    <th>Content</th>  
                    <th>Status</th>                      
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query="select * from blogs";
                    $blogs->blogs_data_view($query);
                ?>
            </tbody>
        </table>
        <span class="addblog">
            <button class="add_buttonblog rightblog"><a href="../admin_panel.php" class="alinkblog">Back</a></button>
        </span>       
    </body>
</html>

