<?php
session_start();
$uid = $_GET['id'];

if(isset($_POST['submit'])){
   
    if(isset($_GET['id']) && isset($uid)){
        $user = array();
        $key = 0;
        if(isset($_SESSION['user'])){
            foreach($_SESSION['user'] as $key => $value){
                if($value['id'] == $uid){               
                    $user = $_SESSION['user'][$key];
                    $key = $key;
                }
                
                break;
            }
    }       
        $user['fname']= $_POST['fname'];
        $user['lname']= $_POST['lname'];
        $user['email']= $_POST['email'];
        $user['password']= $_POST['password'];
        $_SESSION['user'][$key] = $user;
        header('location:index.php');

    }   
    else{
        header('location:index.php');
    }

}


    
?>