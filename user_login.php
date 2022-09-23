<?php
session_start();
include 'class.php';
require 'config.php';

if(isset($_POST['submit'])){
    //Dsn Data Source Name  
    $users = new users($db);
    $users->user_login($_POST);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.1">
        <title>Login</title>
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
                margin-top:80px;
            }
            #form-container{
                width: 339px;
                height: 230px;
                background-color: #8fcfc7;
                display: flex;
                flex-direction: column;
                padding:40px;
                margin:auto;
            }
            .inputStyle{
                width: 300px;
                padding: 8px 12px;
                border-radius: 8px;
                margin-bottom: 10px;
                font-size: 18px;
                color:#363535;
            }
            .labelStyle{
                font-size: 18px;
                margin-left: 16px;
                margin-bottom: 8px;
                font-family: sans-serif;
            }
            .passInput{
                margin-bottom: 31px;
            }
            .btn-submit{
                width: 331px;
                padding: 9px 14px;
                border-radius: 3px;
                font-size: 18px;
                background-color:#212221;
                color: white;
                letter-spacing: 0px;
            }

            h1{
                text-align: center;
                font-family: sans-serif;
                font-weight: 600;              
             color: #212221;
            }
            .message{
                margin: 0px;
                padding: 0px;
                color: red;
                text-align: right;
                margin-right: 16px;
            }
        </style>
    </head>
    <body>
        <div id="main-container">

        <h1>Login</h1>
            <form action="user_login.php" method="post" id="form-container">
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