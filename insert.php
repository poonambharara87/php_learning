<?php

if(isset($_POST['submit'])){
    session_start();
    $error = [];
  
    echo $_POST['add_title'];
    if(empty($_POST['add_title'] && $_POST['add_desc'])){
        $error['title_err'] = "Title is required";
    }
        
    if(isset($_POST['add_desc']) && empty($_POST['add_desc'])){
        $error['desc_err'] = "Description is required";
    }

    if(!empty($error)){
        $_SESSION['error'] = $error;
        header('location:add.php');
    }else{
            if(!empty($_SESSION['error'])){
                unset($_SESSION['error']);
            }
        $user_id = isset($_SESSION['user'])?count($_SESSION['user']):0;
        $_POST['id'] = $user_id + 1;
        $_SESSION['user'][] = $_POST;
        print_r($_SESSION['user']);
        header('location:index.php');
    }
   
}

?>