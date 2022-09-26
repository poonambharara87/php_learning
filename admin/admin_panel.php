<?php
include 'adminController.php';
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
        <link rel="stylesheet" href="../css/style.css">

    </head>
    <h1 style="text-align:center;">Hello, Welcome!</h1>
    <div class="containerAdmin">
        
        <div id="sidebarAdmin">
            <ul class="menuAdmin">
                <li class="itemAdmin">
                    <a href="subAdmin/subAdmins.php" class="linkAdmin">Sub-Admins</a>
                </li>

                <li class="itemAdmin">
                    <a href="../admin/users/users.php" class="linkAdmin">Users</a>
                </li>

                <li class="itemAdmin">
                    <a href="../admin/blogs/blogs.php" class="linkAdmin">Blogs</a>
                </li>

                <li class="itemAdmin">
                    <a href="logout.php" class="linkAdmin">Logout</a>
                </li>
            </ul>
        </div>
    </div>

</html>