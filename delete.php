<?php

if(isset($_GET['id'])){
    $g_id = $_GET['id'];
    session_start();
    foreach($_SESSION['user'] as $key => $value){

        if($value['id'] == $g_id ){

            unset($_SESSION['user'][$key]);
        }
    }
}



?>