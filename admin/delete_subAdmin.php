<?php

include '../database/config.php';
include 'adminController.php';

if(isset($_GET['id'])){
    $admin = new admin(null, $db);
    $admin->delete_subAdmin($_GET['id']);
}
?>