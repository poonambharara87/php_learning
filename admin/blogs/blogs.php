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
        <title>All Blogs </title>
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

                    <th>Content</th>  
                    <th>Status</th>                      
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query="select * from blogs";
                    $stmt= $blogs->blogs_data_view($query);
                    if($stmt->rowCount() > 0){
                        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                            ?>
                            <?php
                                if($row['status'] == 0){
                            ?>
                                    <tr>
                                        <td><?php  if(isset($row['blog_id'])){ print_r($row['blog_id']);}?></td>
                                        <td><?php  if(isset($row['blog_tittle'])){ print_r($row['blog_tittle']);}?></td>
                                        <td><?php  if(isset($row['blog_description'])){ print_r($row['blog_description']);}?></td>

                                        <td><?php  if(isset($row['content'])){ print_r($row['content']);}?></td>               
                                        <td>Deactivate</td>
                                        <td><a href="activeBlog.php?id=<?php echo $row['blog_id'];?>">Active</a></td>
                                        <td><a href="editBlog.php?id=<?php echo $row['blog_id'];?>">Edit</a></td>
                                        <td><a href="deleteBlog.php?id=<?php echo $row['blog_id'];?>">Delete</a></td>        
                                    </tr>
                            <?php
                                } //if 
                                else{
                    
                                    ?>
                                    <tr>
                                        <td><?php  if(isset($row['blog_id'])){ print_r($row['blog_id']);}?></td>
                                        <td><?php  if(isset($row['blog_tittle'])){ print_r($row['blog_tittle']);}?></td>
                                        <td><?php  if(isset($row['blog_description'])){ print_r($row['blog_description']);}?></td>                                
                                        <td><?php  if(isset($row['content'])){ print_r($row['content']);}?></td>               
                                        <td>Activate</td>
                                        <td><a href="deactivateBlog.php?id=<?php echo $row['blog_id'];?>">Deactive</a></td>
                                        <td><a href="editBlog.php?id=<?php echo $row['blog_id'];?>">Edit</a></td>
                                        <td><a href="deleteBlog.php?id=<?php echo $row['blog_id'];?>">Delete</a></td>        
                                    </tr>
                    
                                <?php
                        }
            
                    } 
                    }
                ?>
            </tbody>
        </table>
        <span class="addblog">
            <button class="add_buttonblog rightblog"><a href="../admin_panel.php" class="alinkblog">Back</a></button>
        </span>       
    </body>
</html>

