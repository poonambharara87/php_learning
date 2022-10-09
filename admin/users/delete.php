<?php

include 'usersControlller.php';
include '../../database/config.php';


if(isset($_GET['id'])){
    $users = new users($db);
    $users->delete($_GET['id']);
}
?>