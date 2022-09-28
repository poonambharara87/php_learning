<?php
include '../../config.php';
if(isset($_GET['id'])){

    $id = $_GET['id'];
    $query = "UPDATE blogs SET status=:1 WHERE blog_id=$id";
    $stmt = $db->prepare($query);
        $data = [
            ':1' => 1
        ];
    $queryExcuted = $stmt->execute($data);
    if($queryExcuted){
        header("location:blogs.php");
    } 
}else{
    header("location:blogs.php");
}