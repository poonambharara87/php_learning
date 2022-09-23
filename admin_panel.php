<?php
include 'class.php';
if(isset($_SESSION['admin']) || isset($_SESSION['sub_admin'])){

}else{
    header("location:admin_login.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Panel</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body{
                margin:0px;
                padding:0px;
                box-sizing:border-box;
            }
            a{
                text-decoration:none;
            }
            .container{
                background-image: url('img/1.jpg');
                height:1000px;
            }
            #sidebar{
                background-color:skyblue;
                height:1200px;
                width:300px;
            }
            .menu{
                display: flex;
                flex-direction: column;
                justify-content: center;
                padding:0px;
            }
            .item{
                list-style-type: none;
                padding: 18px 20px;
                border-bottom: 2px solid darkslategray;
            }
            .link{
                font-size: 18px;
                color: #2f2b2b;
                font-family: sans-serif;
                text-align: center;
                margin-left: 48px;
            }
        </style>
    </head>
    <h1 style="text-align:center;">Hello, Welcome!</h1>
    <div class="container">
        
        <div id="sidebar">
            <ul class="menu">
                <li class="item">
                    <a href="subAdmins.php" class="link">Sub-Admins</a>
                </li>

                <li class="item">
                    <a href="users.php" class="link">Users</a>
                </li>

                <li class="item">
                    <a href="blogs.php" class="link">Blogs</a>
                </li>

                <li class="item">
                    <a href="logout.php" class="link">Logout</a>
                </li>
            </ul>
        </div>
    </div>

</html>