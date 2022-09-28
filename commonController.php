<?php
include 'config.php';
class Users{
    private $db_conn;

    function __construct($db){
        $this->db_conn = $db;
    }
    public function add_user($fname, $lname, $email, $password){
            
        $error = array();
        
        if(empty($fname)){
            $error['fname'] = "Please fill the Firstname";
        }if(empty($lname)){
            $error['lname'] = "Please fill the Lastname";
        }if(empty($email)){
            $error['email'] = "Please fill the email";
        }if(empty($password)){
            $error['password'] = "Please fill the password";
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error['valid_email'] = "Please fill vaild password";       
        }
        if(!empty($error)){
            $_SESSION['error'] = $error;
            header("location:add_user.php");
        }else{
            if(!empty($_SESSION['error'])){
                unset($_SESSION['error']);
            }

                try{
                    $addstmt = $this->db_conn->prepare("insert into users(user_firstname, user_lastname,
                    user_email, user_password, role) values(:fname, :lname, :email, :password, 3)");
                    $addstmt->bindparam(":fname", $fname);
                    $addstmt->bindparam(":lname", $lname);
                    $addstmt->bindparam(":email", $email);
                    $addstmt->bindparam(":password", $password);
                    $addstmt->execute();
                    header("location:user_login.php");
                }catch(Exception $ex){
                    echo $ex->getMessage();
                }  
    } 
    }            

    function user_login($data){  
        $user = array();
        if(empty($data['email'])){
            $_SESSION['email'] = 'Please fill email';
            if(empty($data['password'])){
                $_SESSION['password'] = 'Please fill password';
            }
        }elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
            $_SESSION['valid_email'] = "Please fill vaild email"; 
                
        }else{
            if(!empty($_SESSION['email']) && !empty($_SESSION['password'])){
                unset($_SESSION['email']); unset($_SESSION['password']);
            }
            $stmt = $this->db_conn->query('SELECT * FROM users WHERE role = 3'); //stmt object
            // while($row = $stmt->fetch()){ //here stmt return array

            while($row = $stmt->fetch(PDO::FETCH_OBJ)){ //pram returns static class object
            echo "<pre>";
            if($row->user_email == $data['email']
                && $row->user_password == $data['password']){

                if($row->status == 1){ 
                    $_SESSION['user'] = $user;
                    $uid = $row->user_id;
                    $_SESSION['user_id'] = $uid;
                    header('location:homepage.php');
                }else{ 
                    $_SESSION['Invalid'] = [];                                 
                    $_SESSION['deactive'] = "Thankyou, Please wait for approval.";  
                                   
                }
            }else{                     
                    $_SESSION['Invalid'] = "Please fill valid email and password";
                    header('user_login.php');                    
                } 
            }

        }       
    }
 

}
