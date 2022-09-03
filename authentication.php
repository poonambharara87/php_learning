<?php
    session_start();
  
    if(isset($_POST['submit'])){
        
        $loginError = array();

        if(isset($_POST['email']) && empty($_POST['email'])){
            $loginError['email'] = "Email is required for login";           
        }

        if(isset($_POST['password']) && empty($_POST['password'])){
            $loginError['password'] = "Password is required for login";
        }
                
        if(!empty($loginError)){
            $_SESSION['loginError'] = $loginError;
            header('location:login.php');
        }else{
                if(isset($_SESSION['loginError'])){
                    unset($_SESSION['loginError']);
                }
                echo "<br>";
               
                $email = $_POST['email'];                
                $password = $_POST['password'];    
                
                foreach($_SESSION['user'] as $keys => $value){ //0, 1 index
                    echo "<br>" ;
                    $inValidError = array();                  
                    

                    if($value['email'] == $email && 
                       $value['password'] == $password){  
                            
                         if(isset($_SESSION['inValidError'])){
                            unset($_SESSION['inValidError']);
                        }                                            
                        header('location:index.php');                                                                         
                    } 
               
                }     
            
        }

    }
            
            
        
        
            
?>