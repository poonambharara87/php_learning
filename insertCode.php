<?php
include 'database.php';


class AddUser{

    function addUser(){
        if(isset($_POST['submit'])){
        
            $name = $_POST['usrname'];
            $email = $_POST['usremail'];
            $password = $_POST['usrpassword'];
        }

        $db = new DB();
        $db->insert($name, $email, $password);
       
        if($db){
            echo "added successfull!";
           
        }else{
            echo "not added";
        }
        header("location:index.php");
    }


}

$User = new AddUser();
$User->addUser();
