<?php
session_start();
    
    if(isset($_POST['submit'])){
        
        if(isset($_GET['id'])){
           
            $g_id = $_GET['id']; 
            $UserkeyData = array();
            $key = 0;
            if(isset($_SESSION['user'])){
                foreach($_SESSION['user'] as $key => $value){
                    
                    if($value['id'] == $g_id){
                        $UserkeyData = $_SESSION['user'][$key];
                        $key = $key;  
                    }
                    break;
                }
            }
        }

        $UserkeyData['add_title'] = $_POST['add_title'];
        $UserkeyData['add_desc'] = $_POST['add_desc'];
        $_SESSION['user'][$key] = $UserkeyData;
        header('location:index.php');
    }   
?>