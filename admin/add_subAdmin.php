<?php

include '../database/config.php';
include 'adminController.php';
if(isset($_SESSION['admin'])){

}else{
    header("location:admin_login.php");
} 
if(isset($_POST['submit'])){
    //Dsn Data Source Name  
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $admin = new admin(null, $db);
    $admin->add_subAdmin($fname, $lname, $email, $password);
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.1">
        <title>ADD SUB-ADMIN</title>
        <link href="../css/style.css" rel="stylesheet">

    </head>
    <body>
        <div id="main-container">
            <h1>Add Sub-Admin</h1>
            <form action="add_subAdmin.php" method="post" id="form-container">
                <label for="fname" class="labelStyle text-color">First Name</label>
                <input type="text" name="fname" class="inputStyle text-color">

                <?php
                    if(!empty($_SESSION['ErrorSubAd']['fname'])){
                        echo "<p class='message'> " . $_SESSION['ErrorSubAd']['fname'] . "</p>";   
                    }
                ?>

                <label for="lname" class="labelStyle text-color">Second Name</label>
                <input type="text" name="lname" class="inputStyle text-color">
                
                <?php 
                    if(!empty($_SESSION['ErrorSubAd']['lname'])){
                        echo "<p class='message'> " . $_SESSION['ErrorSubAd']['lname'] . "</p>";   
                    }  
                ?> 
                <label for="email" class="labelStyle text-color">Email</label>
                <input type="email" name="email" class="inputStyle text-color">

                <?php   
                    if(!empty($_SESSION['ErrorSubAd']['email'])){
                        echo "<p class='message'> " . $_SESSION['ErrorSubAd']['email'] . "</p>";   
                    }
                ?>                
                <label for="passwod" class="labelStyle text-color">Password</label>
                <input type="password" name="password" class="inputStyle text-color passInput">

                <?php   
                    if(!empty($_SESSION['ErrorSubAd']['password'])){
                        echo "<p class='message'> " . $_SESSION['ErrorSubAd']['password'] . "</p>";  
                        $_SESSION['ErrorSubAd'] = []; 
                    }
                ?>                
                <button type="submit" name="submit" class="btn-submit">SUBMIT</button>
            </form>
        </div>
    </body>
</html>