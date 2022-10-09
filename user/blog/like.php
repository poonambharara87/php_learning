<?php

if(isset($_SESSION)){

}else{
    session_start();
}
// include '../../database/config.php';
include 'blogcode.php';

if(isset($_GET['id'])){

    $user_id = $_SESSION['user_id'];
    $blog_id = $_GET['id'];
    $blog = new blog($db);
    $stmt = $blog->blog_like($blog_id);
    if($stmt == false){
        $query = "INSERT INTO likes(user_id, blog_id, likeStatus) VALUES($user_id, $blog_id, 1)";
        $stmt1 = $db->exec($query); 

    }else{
  
    } 
    header("location:homepage.php");
}