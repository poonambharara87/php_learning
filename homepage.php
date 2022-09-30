<?php
session_start();
if(isset($_SESSION['user'])){

}else{
    header('location:user_login.php');
}

include 'config.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.1">
        <title>View All blogs</title>
        <link rel="stylesheet" href="css/style.css">

    </head>
    <body>
        <div class="btn-container">
            <button class="btn-logout"><a href="user_logout.php" class="logout-link">Logout</a></button>
        <div>
    <?php
        $query = "select * from blogs";
        $stmt = $db->prepare($query); //refrence object
            $stmt->execute(); //to execute prepare statement
            if($stmt->rowCount() > 0){
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                $id = $row['blog_id'];
             ?>
                <div id="main-container">

                    <h1><?php echo $row['blog_tittle'];?></h1>
                    
                    <h2><?php echo $row['blog_description']; ?></h2>

                    <p><?php echo $row['content']; ?></p>                    
                    <?php
                        $user_id = $_SESSION['user_id'];
                        $queryLikedOrNot = "select likeStatus from likes WHERE user_id = $user_id
                                            and blog_id = $id";
                        $stmt1 = $db->query($queryLikedOrNot);
                        $record = $stmt1->fetch(PDO::FETCH_ASSOC);
                        if($record == 0){
                            ?>
                            <button><a href="like.php?id=<?php echo $row['blog_id'];?>" class="logout-link">Like</a></button>
                        <?php
                        }else{
                            ?>
                            <button><a href="dislike.php?id=<?php echo $row['blog_id'];?>" class="logout-link">Disike</a></button> 
                        <?php
                        }
                    ?>
    
                    <p style="border-bottom:2px solid gray;"></p>
                </div>

                <?php
                    }
                }else{
                    echo "<h2>Blogs not available at the moment</h2>";
                }
    
        ?>
    </body>
</html>

<?php




?>