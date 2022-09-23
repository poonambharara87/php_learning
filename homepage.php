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
        <style>
            body{
                box-sizing:border-box;
                margin:0px;
                padding:0px;
            }
            .btn-container{
                position: relative;
            }
            .btn-logout{
                position: absolute;
                right: 64px;
                top: 41px;
                padding: 12px 25px;
                background-color: skyblue;
            }

            .logout-link{
                text-decoration: none;
                font-size: 18px;
            }
            .text-color{
                color: #212221;
            }
            #main-container{
                margin-top: 20px;
                margin-bottom: 40px;
                text-align:center;
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

                    <img src="<?php echo $row['blog_imgSource']; ?>" />

                    <p><?php echo $row['content']; ?></p> 

                    <?php
                    $likequery = "SELECT * FROM likes";
                    $stmt1 = $db->prepare($likequery);
                    $stmt1->execute();
                    while($record = $stmt1->fetch(PDO::FETCH_ASSOC)){
                        if($record['likeStatus'] == 0){
                            $user_id = $_SESSION['user_id'];
                            ?>

                            <button><a href="like.php?id='<?php $user_id;?>'&blog_id='<?php $row['blog_id'];?>'">Like</a></button>
                            
                            <?php
                        }else{
                            ?>
                            <button><a href="dislike.php?id='">Disike</a></button>
                            <?php
                        }

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