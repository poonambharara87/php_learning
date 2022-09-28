<?php

// if(isset($_SESSION['admin']) || isset($_SESSION['sub_admin'])){

// }else{
//     header("location:../admin_login.php");
// } 
include '../../config.php';
include 'blogController.php';


if(isset($_POST['submit'])){
    $blogs = new blogs($db);
    $blogs->add_blog($_POST);
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.1">
        <title>Add blog</title>
        <link rel="stylesheet" href="../../css/style.css">

    </head>
    <body>
        <div id="main-container">
            <h1>Add Blog</h1>
            <form action="blog.php" method="post" id="form-container" enctype="multipart/form-data">
                <label for="fname" class="labelStyle text-color">Tittle</label>
                <input type="text" name="tittle" class="inputStyle text-color">

                <label for="lname" class="labelStyle text-color">Description</label>
                <input type="text" name="description" class="inputStyle text-color">

                <label for="file" class="labelStyle text-color">Content</label>
                <textarea name="content" rows="10" cols="50" minlength="10" maxlength="150"
                 class="inputStyle text-color"></textarea>

                <button type="submit" name="submit" value="submit" class="btn-submit">SUBMIT</button>
            </form>
        </div>
    </body>
</html>

