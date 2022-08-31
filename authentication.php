<?php
    session_start();
  
    // print_r($_POST);
    if(isset($_POST['submit'])){ //empty function does not generate warning notice and isset do 
        
        $loginError = array();
        if(isset($_POST['email']) && empty($_POST['email'])){
            $loginError['email'] = "Email is required for login";           
        }
        if(isset($_POST['password']) && empty($_POST['password'])){
            $loginError['password'] = "Password is required for login";
        }
                // print_r($_POST['email']);
        if(!empty($loginError)){
            $_SESSION['loginError'] = $loginError;
            header('location:login.php');
        }else{
                if(isset($_SESSION['loginError'])){
                    unset($_SESSION['loginError']);
                }
                echo "<br>";
               
                $email = $_POST['email'];
                // var_dump($email);
                $password = $_POST['password'];
                // var_dump($password);
               
                foreach($_SESSION['user'] as $keys => $value){ //0, 1 index
                    echo "<br>" ;
                    $inValidError = array();

                    // print_r($_SESSION['user'][$keys]);
                    
                    if($value['email'] == $email  && $value['password'] == $password){
                       
                    if(isset($_SESSION['inValidError'])){
                        unset($_SESSION['inValidError']);
                    }
                    
                    return header('location:index.php');
                    break;                        
                               
                     }
                                      
                    $inValidError['email_pass'] = "invalid credentials";   
                    $_SESSION['inValidError'] = $inValidError;
                    return header('location:login.php');                       
                    }
                    
                    
                 }
                
            }       
        
            
?>