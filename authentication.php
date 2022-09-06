<?php
    session_start();
    include 'validation.php';
    if(isset($_POST['submit'])){ //empty function does not generate warning notice and isset do 
                     
        $error_validation = Input_password($_POST['password']);
        $error_validation = email_validation($_POST['email']);

        if(!empty($error_validation)){
            $_SESSION['error_validation'] = $error_validation;
            header('location:login.php');
        }else{
                if(isset($_SESSION['error_validation'])){
                    unset($_SESSION['error_validation']);
                }
                echo "<br>";
               
                $email = $_POST['email'];                
                $password = $_POST['password'];    
                $count=1;
                foreach($_SESSION['user'] as $keys => $value){ 
                    echo "<br>" ;
                            
                    if($value['email'] == $email && 
                       $value['password'] == $password){  
                            
                        if(isset($_SESSION['inValidError'])){
                            unset($_SESSION['inValidError']);
                        }                                            
                        header('location:index.php');                                                                         
                    } 
                    if($value['email'] != $email && 
                    $value['password'] != $password){

                    }                                   
                }   
                $inValidError = array();  
                if($count == count($_SESSION['user'])){
                    $inValidError['email_pass'] = "invalid credentials";   
                    $_SESSION['inValidError'] = $inValidError;
                    header('location:login.php'); 
                }
            
        }

    }
            
            
        
        
            
?>