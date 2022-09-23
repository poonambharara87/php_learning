<?php
session_start();
include 'class.php';
require 'config.php';

if(isset($_POST['submit'])){
    //Dsn Data Source Name  
    $obj = new admin($_POST);
    $obj->Login($db);
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
                /* margin-bottom: 31px; */
            }
            .btn-submit{
                width: 331px;
                padding: 9px 14px;
                border-radius: 3px;
                font-size: 18px;
                background-color:#212221;
                color: white;
                margin-top:20px;
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
            <form action="admin_login.php" method="post" id="form-container">
                <label for="email" class="labelStyle text-color">Email</label>
                <input type="email" name="email" class="inputStyle text-color">
                <?php
                        if(!empty($_SESSION['emailLogin'])){
                            echo "<p class='message'>" . $_SESSION['emailLogin'] . "</p>";
                            $_SESSION['emailLogin'] = [];
                        }
                ?>                
                <label for="password" class="labelStyle text-color">Password</label>
                <input type="password" name="password" class="inputStyle text-color passInput">

                <?php
                        if(!empty($_SESSION['passwordLogin'])){
                            echo "<p class='message'>" .$_SESSION['passwordLogin']."</p>";
                            $_SESSION['passwordLogin'] = [];
                        }

                ?> 
                <button type="submit" name="submit" class="btn-submit text-color">SUBMIT</button>
            </form>

        </div>
    </body>
</html>