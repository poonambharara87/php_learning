<?php

if(isset($_SESSION['admin']) || isset($_SESSION['sub_admin'])){

}else{
    header("location:admin_login.php");
} 
include 'class.php';
require 'config.php';

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
        <style>
            body{
                box-sizing:border-box;
                margin:0px;
                padding:0px;
            }

            .text-color{
                color: #212221;
            }
            #main-container{
                margin-top: 20px;
                margin-bottom: 20px;
            }
            #form-container{
                width: 600px;
                height: 416px;
                background-color: #8fcfc7;
                display: flex;
                flex-direction: column;
                padding: 40px;
                margin: auto;
            }
            .inputStyle{
                width: 500px;
                padding: 8px 12px;
                /* border-radius: 8px;
                margin-bottom: 20px; */
                font-size: 18px;
                color:#363535;
                margin:auto;
            }
            .labelStyle{
                font-size: 18px;
                font-family: sans-serif;
                text-align: left;
                margin: 10px 0px 10px 38px;
            }
            label:first-child{
                margin-top:0px;
            }
            .fstyle{
                height: 50px;
                margin-left: 25px;
                margin-bottom:10px;
            }

            .btn-submit{
                width: 331px;
                padding: 9px 14px;
                border-radius: 3px;
                font-size: 18px;
                background-color: #212221;
                color: white;
                letter-spacing: 0px;
                /* margin: auto; */
                margin: 16px 0px 0pc 137px;
            }

            h1{
                text-align: center;
                font-family: sans-serif;
                font-weight: 600;
                color: #212221;
                margin: 5px;
                font-size: 25px;
            }
        </style>
    </head>
    <body>
        <div id="main-container">
            <h1>Add Blog</h1>
            <form action="blog.php" method="post" id="form-container" enctype="multipart/form-data">
                <label for="fname" class="labelStyle text-color">Tittle</label>
                <input type="text" name="tittle" class="inputStyle text-color">

                <label for="lname" class="labelStyle text-color">Description</label>
                <input type="text" name="description" class="inputStyle text-color">

                <label for="file" class="labelStyle text-color">Image File</label>
                <input type="file" name="uploadFile" class="inputStyle text-color fstyle">
              
                <label for="file" class="labelStyle text-color">Content</label>
                <textarea name="content" rows="10" cols="50" minlength="10" maxlength="150"
                 class="inputStyle text-color"></textarea>
                 
                <button type="submit" name="submit" value="submit" class="btn-submit text-color">SUBMIT</button>
            </form>
        </div>
    </body>
</html>

