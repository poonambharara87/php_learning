<?php

class DB{

    function __construct(){
        try{
            $conn = mysqli_connect('localhost', 'root', '', 'oopcrud');
            $this->db = $conn;
            
        }catch(Exception $e){
            $e->message();
        }
    }


    public function insert($name, $email, $password){
        try{
            
        $result = mysqli_query($this->db, "insert into tbluser(usrname, usremail, usrpassword)
        values('$name', '$email', '$password')");
        
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public  function showData(){
        try{
            $result = mysqli_query($this->db, "select * from tbluser");
            return $result;
        }catch(Exception $e){
             echo "data not came". $e->getMessage();
        }
    }

    public function edit($usrname, $usremail, $id){
        try{
            echo "dflk";
            
            $result = mysqli_query($this->db, "UPDATE tbluser set usrname = '$usrname', usremail = '$usremail' 
            where id = '$id'");
            
            return $result;
        }catch(Exception $e){
             echo "data not came". $e->getMessage();
        }   
    }
    public function fetchData($id){
        try{
            $result = mysqli_query($this->db, "SELECT *  FROM tbluser
            where id = '$id'");
            
            return $result;
        }catch(Exception $e){
             echo "data not came". $e->getMessage();
        }   
    }
    public function delete($id){
        try{
            $result = mysqli_query($this->db, "DELETE FROM tbluser
            where id = '$id'");
            
            return $result;
        }catch(Exception $e){
             echo "data not came". $e->getMessage();
        }   
    }
}