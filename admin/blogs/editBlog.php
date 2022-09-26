<?php

require '../../config.php';
include 'blogController.php';
// if(isset($_SESSION['admin']) || isset($_SESSION['sub_admin'])){

// }else{
//     header("location:admin_login.php");
// } 
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
        <link rel="stylesheet" href="../../css/style.css">

    </head>
    <body>
        <div id="main-containerEblog">
            <h1 class="eblogHead">Edit Blog</h1>
            <form action="editBlog.php?id='<?php echo $result->blog_id; ?>'" method="post" id="form-containerEblog" enctype="multipart/form-data">
 
            <input type="hidden" name="id" value="<?php echo $result->blog_id; ?>" class="inputStyleEblog text-colorEblog"/>            
                <label for="tittle" class="labelStyleEblog text-colorEblog">Tittle</label>
                <input type="text" name="tittle" value="<?php echo $result->blog_tittle; ?>" class="inputStyleEblog text-colorEblog"/>

                <label for="description" class="labelStyleEblog text-colorEblog">Description</label>
                <input type="text" name="description" value="<?php echo $result->blog_description; ?>"  class="inputStyleEblog text-colorEblog"/>

                <label for="file" class="labelStyleEblog text-colorEblog">Image File</label>
                <td>
                    <input type="file" name="uploadFile" class="inputStyleEblog text-colorEblog fstyleEblog">
                    <img src="<?php echo $result->blog_imgSource; ?>" class="blogImgEblog" height="200px" width="200px" alt="Blog Image"/>               
                </td>
                <label for="content" class="labelStyleEblog text-colorEblog">Content</label>
                <textarea name="content" rows="10" cols="50" minlength="10" maxlength="150"
                 class="inputStyleEblog text-colorEblog"><?php echo $result->content; ?></textarea>
                 
                <button type="submit" name="update"  class="btn-submitEblog text-colorEblog">Update</button>
            </form>
        </div>
    </body>
</html>

