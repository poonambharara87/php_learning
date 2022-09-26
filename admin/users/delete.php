<?php

include 'usersControlller.php';
include '../../config.php';


if(isset($_GET['id'])){
    $users = new users($db);
    $users->delete($_GET['id']);
}
?>