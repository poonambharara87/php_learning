<?php
include '../../database/config.php';
if(isset($_GET['id'])){

    $id = $_GET['id'];
    $query = "UPDATE users SET status=:0 WHERE user_id=$id";
    $stmt = $db->prepare($query);
        $data = [
            ':0' => 0
        ];
    $queryExcuted = $stmt->execute($data);
    header("location:users.php");
    }   
    if($queryExcuted == 0){
        header("location:users.php");
    } 
