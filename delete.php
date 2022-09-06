<?php
session_start();
$user_id = $_GET['id'];

if(isset($user_id)){

    foreach($_SESSION['user'] as $key => $value){

        if($value['id'] == $user_id){
             unset($_SESSION['user'][$key]);
             header('location:index.php');
        }
        break;

    }

}


?>