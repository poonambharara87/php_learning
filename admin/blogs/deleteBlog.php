<?php

include '../blogController.php';
include 'config.php';


if(isset($_GET['id'])){
    $blogs = new blogs($db);
    $blogs->delete($_GET['id']);
}
?>