<?php

include 'class.php';
include 'config.php';


if(isset($_GET['id'])){
    $subAdmin = new subAdmin($db);
    $subAdmin->delete_subAdmin($_GET['id']);
}
?>