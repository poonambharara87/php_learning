<?php
include 'database.php';


class EditUser{

    public function update(){
        
        
            if(isset($_POST['submit'])){
                $id = $_GET['id'];
                $usrname = $_POST['usrname'];
                $usremail = $_POST['usremail'];
                $db = new DB();
                $db->edit($usrname, $usremail, $id);
                if($db){
                    echo "added successfull!";
                }else{
                    echo "not added";
                }
                header("location:index.php");
            }
        }
    }




$user = new EditUser();
$user->update();