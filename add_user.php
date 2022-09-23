<?php
if(isset($_SESSION['admin'])){

}else{
    header("location:admin_login.php");
}
require 'config.php';
include 'class.php';

if(isset($_POST['submit'])){
    //Dsn Data Source Name  
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $users = new users($db);
    $users->add_user($fname, $lname, $email, $password);
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.1">
        <title>Add User</title>
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
                width: 339px;
                height: 450px;
                background-color: #8fcfc7;
                display: flex;
                flex-direction: column;
                padding: 40px;
                margin: auto;
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

            .btn-submit{
                width: 331px;
                padding: 9px 14px;
                border-radius: 3px;
                font-size: 18px;
                background-color:#212221;
                color: white;
                letter-spacing: 0px;
                margin-top:20px;
            }

            h1{
                text-align: center;
                font-family: sans-serif;
                font-weight: 600;
                color: #212221;
                margin: 5px;
                font-size: 25px;
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
            <h1>Add User</h1>
            <form action="add_user.php" method="post" id="form-container">
                <label for="fname" class="labelStyle text-color">First Name</label>
                <input type="text" name="fname" class="inputStyle text-color">
                <?php
                if(!empty($_SESSION['error']['fname'])){
                    echo "<p class='message'> " . $_SESSION['error']['fname'] . "</p>";
                }
                ?>
                <label for="lname" class="labelStyle text-color">Last Name</label>
                <input type="text" name="lname" class="inputStyle text-color">
                <?php 

                    if(!empty($_SESSION['error']['lname'])){
                        echo "<p class='message'>" . $_SESSION['error']['lname'] . "</p>";
                    }
                ?> 
                <label for="email" class="labelStyle text-color">Email</label>
                <input type="email" name="email" class="inputStyle text-color">
                <?php 
                    if(!empty($_SESSION['error']['email'])){
                        echo "<p class='message'>" .$_SESSION['error']['email'] . "</p>";
                    }
                ?>                
                <label for="passwod" class="labelStyle text-color">Password</label>
                <input type="password" name="password" class="inputStyle text-color passInput">
                <?php 
                    if(!empty($_SESSION['error']['password'])){
                        echo "<p class='message'>" .$_SESSION['error']['password'] . "</p>";
                        
                    }
                    
                ?>  
                <button type="submit" name="submit" class="btn-submit text-color">SUBMIT</button>
            </form>
        </div>
    </body>
</html>