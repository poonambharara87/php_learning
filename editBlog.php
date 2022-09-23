<?php

require 'config.php';
include 'class.php';
if(isset($_SESSION['admin']) && isset($_SESSION['sub_admin'])){

}else{
    header("location:admin_login.php");
} 
if(isset($_GET['id'])){
    if(isset($_POST['update'])){
    echo "hello";
        $blogs = new blogs($db);
        $blogs->edit_blog($_POST);
    }
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $blogs = new blogs($db);
    $query = "select * from blogs where blog_id = :id LIMIT 1";
    $stmt = $db->prepare($query);
    $data = [':id' => $id];
    $stmt->execute($data);

    $result = $stmt->fetch(PDO::FETCH_OBJ); 
    // $result = $stmt->fetch(PDO::FETCH_ASSOC); echo $result['user_firstname'] 
}else{
    header("location:blogs.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.1">
        <title>Edit blog</title>
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
                height: 600px;
                background-color: #cfdddc;
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
            .blogImg{
                text-align: right;
                margin-left: 37px;
            }
        </style>
    </head>
    <body>
        <div id="main-container">
            <h1>Edit Blog</h1>
            <form action="editBlog.php?id='<?php echo $result->blog_id; ?>'" method="post" id="form-container" enctype="multipart/form-data">
 
            <input type="hidden" name="id" value="<?php echo $result->blog_id; ?>" class="inputStyle text-color"/>            
                <label for="tittle" class="labelStyle text-color">Tittle</label>
                <input type="text" name="tittle" value="<?php echo $result->blog_tittle; ?>" class="inputStyle text-color"/>

                <label for="description" class="labelStyle text-color">Description</label>
                <input type="text" name="description" value="<?php echo $result->blog_description; ?>"  class="inputStyle text-color"/>

                <label for="file" class="labelStyle text-color">Image File</label>
                <td>
                    <input type="file" name="uploadFile" class="inputStyle text-color fstyle">
                    <img src="<?php echo $result->blog_imgSource; ?>" class="blogImg" height="200px" width="200px" alt="Blog Image"/>               
                </td>
                <label for="content" class="labelStyle text-color">Content</label>
                <textarea name="content" rows="10" cols="50" minlength="10" maxlength="150"
                 class="inputStyle text-color"><?php echo $result->content; ?></textarea>
                 
                <button type="submit" name="update"  class="btn-submit text-color">Update</button>
            </form>
        </div>
    </body>
</html>

