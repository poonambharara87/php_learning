<?php

if(isset($_POST['submit'])){
    session_start();
    $error = array();

    if(isset($_POST['fname']) && empty($_POST['fname'])){
        $error['fname'] = "fname field is required";
    }
    if(isset($_POST['lname']) && empty($_POST['lname'])){
        $error['lname'] = "lname field is required";
    }
    if(isset($_POST['email']) && empty($_POST['email'])){
        $error['email'] = "email field is required";
    }
    if(isset($_POST['password'])  && empty($_POST['password'])){
        $error['password'] = "password is required";
        
    }
    if(!empty($error)){       
        
        $_SESSION['error'] = $error;
        header('location:signup.php');
    }else{

        if(isset($_SESSION['error'])){
            unset($_SESSION['error']);
        }

        $user_count = isset($_SESSION['user'])?count($_SESSION['user']):0;
        $_POST['id'] = $user_count+1;
        $_SESSION['user'][]= $_POST;
        echo "user created";
        
    }
   
}




?>