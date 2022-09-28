<?php
include '../../config.php';
if(isset($_GET['id'])){

    $id = $_GET['id'];
    $query = "UPDATE blogs SET status=:0 WHERE blog_id=$id";
    $stmt = $db->prepare($query);
        $data = [
            ':0' => 0
        ];
    $queryExcuted = $stmt->execute($data);
    if($queryExcuted){
        header("location:blogs.php");
    } 
}else{
    header("location:blogs.php");
}