<?php
include 'database.php';


class UserDelete{

    public function delete(){
        
        
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $db = new DB();
                $db->delete($id);
                header("location:index.php");
            }
        }
    }




$user = new UserDelete();
$user->delete();