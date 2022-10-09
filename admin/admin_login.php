<?php
session_start();
include 'adminController.php';
require '../database/config.php';

if(isset($_POST['submit'])){
    //Dsn Data Source Name  
    $obj = new admin($_POST, $db);
    $obj->Login();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.1">
        <title>Login</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <div id="main-container">
        <h1 class="mt">Login</h1>
            <form action="admin_login.php" method="post" id="form-container" style="height:260px;">
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
                <button type="submit" name="submit" class="btn-submit ">SUBMIT</button>
            </form>

        </div>
    </body>
</html>