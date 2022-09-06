<?php

global $error_validation;
$error_validation = array();

function Input_fname($fname){
    global $error_validation;
    if(empty($fname)){
        $error_validation['fname'] =  "Please fill your firstname";               
    }
    elseif(is_numeric($fname)){
        $error_validation['fname'] = "Firstname shouldn't be numberic";
    }
    return $error_validation;
}

function Input_lname($lname){
    global $error_validation;
    if(empty($lname)){
        $error_validation['lname'] = "Please fill your Lastname";        
    }
    elseif(is_numeric($lname)){
        $error_validation['lname'] = "Lastname shouldn't be numberic";           
    }
    return $error_validation;
}

function Input_password($password){
    global $error_validation;
    if(empty($password)){
        $error_validation['password'] = "password is required for signup";        
    }
    elseif(strlen($password) < 8){
        $error_validation['password'] = "password should be greater than eight character";               
    }
    return $error_validation;

}


function  email_validation($email){    
    global $error_validation;
    if($email == null){
        $error_validation['email'] = "Please fill email required";       
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
         $error_validation['email'] = "Please fill vaild password";       
    }
    return $error_validation;
    // elseif(!trim($email)){
    //     return $error_validation['email'] = "Please don't fill space"; 
    // }
}


?>