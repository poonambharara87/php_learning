<?php  
    include 'config.php';
    if(isset($_GET['id']) && isset($_GET['blog_id'])){        
        $id = $_GET['id'];
        $blog_id = $_GET['blog_id'];
        
        
           $query = "INSERT INTO likes(user_id, blog_id, likeStatus)
            VALUES($id, $blog_id, 1)";
           $statement = $db->prepare($query);
           $statement->execute();
        
    }

?>