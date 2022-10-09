<?php

if(isset($_SESSION)){

}else{
    session_start();
}
include '../../database/config.php';

if(isset($_GET['id'])){

    $user_id = $_SESSION['user_id'];
    $blog_id = $_GET['id'];

    $query = "UPDATE likes SET likeStatus=0 WHERE user_id = $user_id and blog_id = $blog_id";
    $stmt1 = $db->exec($query); 
    header("location:homepage.php");
}