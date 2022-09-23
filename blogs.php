<?php
// session_start();
include 'config.php';
include 'class.php';

if(isset($_SESSION['admin']) && isset($_SESSION['sub_admin'])){

}else{
    header("location:admin_login.php");
} 
$blogs = new blogs($db);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>All Users </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            a{
                text-decoration:none;
            }
            caption{
                font-size:21px;
                font-weight:600;
                margin-bottom:20px;
            }            
            table, th, td{
                border:1px solid gray;
                margin:2% 20% 10% 20%;
            }
            table{
                margin-bottom: 50px;
                margin-top: 80px;
            }
            td, th{
                text-align: center;
                padding:8px 16px;
                font-family: Montserrat;
                font-weight: 500;
            }
            tr:nth-child(even), thead{
                background-color: #8fcfc7;
            }
            .table{
                margin-bottom: 50px;   
            }
            .add_button{
                padding: 8px 16px;
                background-color: #8fcfc7;
                position: absolute;
                top: 20px;
                border: none;
                border: 2px solid #7098b2;
            }
            .rightMore{
                right: 26%;
            }
            .right{
                right: 18%;               
            }
            .add{
                text-align:center;
            }
            .alink{
                text-decoration: none;
                font-size: 18px;
                color: #302c2cf0;
                font-family: Montserrat;
            }
        </style>
    </head>
    <body>
        <span class="add">
            <button class="add_button rightMore"><a href="blog.php" class="alink">Add</a></button>
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
        <span class="add">
            <button class="add_button right"><a href="admin_panel.php" class="alink">Back</a></button>
        </span>       
    </body>
</html>

