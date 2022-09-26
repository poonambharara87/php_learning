<?php
session_start();
include 'commonController.php';
require 'config.php';

if(isset($_POST['submit'])){
    //Dsn Data Source Name  
    $users = new Users($db);
    $users->user_login($_POST);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.1">
        <title>Login</title>
        <link rel="stylesheet" href="css/style.css">

            
    </head>
    <body>
        <div id="main-container">

        <h1>Login</h1>
            <form action="user_login.php" method="post" id="form-container" 
                style="width:339px; height:230px;">
                <label for="email" class="labelStyle text-color">Email</label>
                <input name="email" class="inputStyle text-color">
                <?php                    
                        if(!empty($_SESSION['email'])){
                            echo '<p class="message">' .$_SESSION['email'] . '</p>';
                        }elseif(!empty($_SESSION['valid_email'])){
                            echo '<p class="message">'.$_SESSION['valid_email'].'</p>';
                            $_SESSION['valid_email'] = [];
                        }
                ?>                
                <label for="password" class="labelStyle text-color">Password</label>
                <input type="password" name="password" class="inputStyle text-color passInput">
                <?php                    
                        if(!empty($_SESSION['password'])){
                            echo '<p class="message">' .$_SESSION['password']  . '</p>';
                            $_SESSION['password'] = [];
                            $_SESSION['email'] = [];
                        }elseif(!empty($_SESSION['Invalid']) && empty($_SESSION['deactive'])){
                            echo '<p class="message">' .$_SESSION['Invalid'].'</p>';
                            $_SESSION['Invalid'] = [];
                        }

                ?>               
                <button type="submit" name="submit" class="btn-submit text-color">SUBMIT</button>
            </form>
            <p> 
                <?php if(!empty($_SESSION['deactive'])){
                    echo '<p style="color:green; text-align:center;">' .$_SESSION['deactive'].'</p>';
                    $_SESSION['deactive'] = [];
                } ?>
            </p>

        </div>
    </body>
</html>