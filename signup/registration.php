<?php

include '../validation.php';
if(isset($_POST['submit'])){
    session_start();
    // $error_validation = array();  

    $error_validation = Input_fname($_POST['fname']);
    $error_validation = Input_lname($_POST['lname']);
    $error_validation = Input_password($_POST['password']);
    $error_validation = email_validation($_POST['email']);

    if(!empty($error_validation)){
        $_SESSION['error_validation'] = $error_validation;
        header('location:signup.php'); 
    }else{
        if(!empty($_SESSION['error_validation'])){
            unset($_SESSION['error_validation']);
        }

        $user_count = isset($_SESSION['user'])?count($_SESSION['user']):0;
        $_POST['id'] = $user_count+1;
        $_SESSION['user'][]= $_POST;
        echo "user created" . "<br>";
        header('location:../login.php');
        
    }
    
}

print_r($_SESSION);





?>