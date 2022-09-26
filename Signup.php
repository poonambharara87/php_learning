<?php
include 'commonController.php';
require 'config.php';

if(isset($_POST['submit'])){
    //Dsn Data Source Name  
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $users = new Users($db);
    $users->add_user($fname, $lname, $email, $password);
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.1">
        <title>Add User</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div id="main-container">
            <h1>Signup</h1>
            <form action="Signup.php" method="post" id="form-container">
                <label for="fname" class="labelStyle text-color">First Name</label>
                <input type="text" name="fname" class="inputStyle text-color">
                <?php
                    if(!empty($error['error']['fname'])){
                        echo '<p class="message">' .$_SESSION['error']['fname'] . '</p>';  
                    }
                ?>
            
                <label for="lname" class="labelStyle text-color">Last Name</label>
                <input type="text" name="lname" class="inputStyle text-color">
                <?php
                    if(!empty($error['error']['lname'])){
                        echo '<p class="message">' .$_SESSION['error']['lname'] . '</p>';  
                    }
                ?>
                <label for="email" class="labelStyle text-color">Email</label>
                <input type="email" name="email" class="inputStyle text-color">
                <?php
                    if(!empty($error['error']['email'])){
                        echo '<p class="message">' .$_SESSION['error']['email'] . '</p>';  
                    }elseif(!empty($error['valid_email'])){
                        echo '<p class="message">'.$error['valid_email'].'</p>';
                    }
                ?>               
                <label for="passwod" class="labelStyle text-color">Password</label>
                <input type="password" name="password" class="inputStyle text-color passInput">
                <?php
                    if(!empty($error['error']['password'])){
                        echo '<p class="message">' .$_SESSION['error']['password'] . '</p>';  
                        $_SESSION['error']['fname'] = [];
                        $_SESSION['error']['lname'] = [];
                        $_SESSION['error']['email']  = [];
                        $_SESSION['error']['password']  = [];
                    } 
                ?>
                <button type="submit" name="submit" class="btn-submit text-color">SUBMIT</button>
                <p class="line">Already Sign in?<a class="login_link" href="user_login.php">Login</a></p>
            </form>
        </div>
    </body>
</html>