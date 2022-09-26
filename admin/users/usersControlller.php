<?php

include '../../config.php';
class users{

    private $db_conn;

    function __construct($db_conn){
        $this->db_conn = $db_conn;
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

    public function user_data_view($query){
        $stmt = $this->db_conn->prepare($query); //refrence object
        $stmt->execute(); //to execute prepare statement
        if($stmt->rowCount() > 0){
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        ?>
                <?php
                    if($row['status'] == 0){
                        ?>  
                        <tr>
                            <td><?php  if(isset($row['user_id'])){ print_r($row['user_id']);}?></td>
                            <td><?php  if(isset($row['user_firstname'])){ print_r($row['user_firstname']);}?></td>
                            <td><?php  if(isset($row['user_lastname'])){ print_r($row['user_lastname']);}?></td>
                            <td><?php  if(isset($row['user_email'])){ print_r($row['user_email']);}?></td>
                            <td><?php  if(isset($row['role'])){ print_r($row['role']);}?></td>
                            <td>Deactivated</td>

                            <td><a href="active.php?id=<?php echo $row['user_id'];?>">Active</a></td>
                            <td><a href="edit.php?id=<?php echo $row['user_id'];?>">Edit</a></td>
                            <td><a href="delete.php?id=<?php echo $row['user_id'];?>">Delete</a></td>        
                        </tr>                 

                            <?php
                    }else{
                        ?>            
                        <tr>
                            <td><?php  if(isset($row['user_id'])){ print_r($row['user_id']);}?></td>
                            <td><?php  if(isset($row['user_firstname'])){ print_r($row['user_firstname']);}?></td>
                            <td><?php  if(isset($row['user_lastname'])){ print_r($row['user_lastname']);}?></td>
                            <td><?php  if(isset($row['user_email'])){ print_r($row['user_email']);}?></td>
                            <td><?php  if(isset($row['role'])){ print_r($row['role']);}?></td>
                            <td>Activated</td> 

                            <td><a href="deactive.php?id=<?php echo $row['user_id'];?>">Diactivate</a></td>
                            <td><a href="edit.php?id=<?php echo $row['user_id'];?>">Edit</a></td>
                            <td><a href="delete.php?id=<?php echo $row['user_id'];?>">Delete</a></td>        
                        </tr>
                    <?php
                        }
                    ?>
        <?php
        
        }
    }

    } 


    public function add_user($fname, $lname, $email, $password){
            
            $error = array();
            
            if(empty($_POST['fname'])){
                $error['fname'] = "Please fill the Firstname";
            }if(empty($_POST['lname'])){
                $error['lname'] = "Please fill the Lastname";
            }if(empty($_POST['email'])){
                $error['email'] = "Please fill the email";
            }if(empty($_POST['password'])){
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
                        header("location:users.php");
                    }catch(Exception $ex){
                        echo $ex->getMessage();
                    }  
        }             



    }


    public function edit($editedData){
        
            $id = $editedData['id'];
            $fname = $editedData['fname']; 
            $lname = $editedData['lname']; 
            $email = $editedData['email']; 
            $password = $editedData['password']; 
            
            try{
                $query = "UPDATE users SET 
                user_firstname=:fname,
                user_lastname=:lname,
                user_email=:email,
                user_password=:password WHERE user_id=:id LIMIT 1";
                $stmt = $this->db_conn->prepare($query);
                $data = [
                    ':fname' => $fname,
                    ':lname' => $lname,
                    ':email' => $email,
                    ':password' => $password,
                    ':id'      => $id
                ];
                $query_executed = $stmt->execute($data);
                if($query_executed){
                    header("location:users.php");
                }
                
            }catch(Exception $excep){
                $excep->getMessage();
            }
        }




    public function delete($id){

        $stmt = $this->db_conn->prepare("delete from users where user_id = :user_id");
        $stmt->bindparam(":user_id", $id);
        $stmt->execute();
        return true;
        
    }


}