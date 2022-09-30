<?php
if(isset($_SESSION)){
   
}else{
session_start();
}

class admin{

    private $adminFormdata;
    private $db;
    function __construct($adminFormdata=null, $db){
        $this->adminFormdata = $adminFormdata;
        $this->db = $db;
    }

    function Login(){  
        $admin = array();
        $sub_admin = array();
       
            if(empty($this->addFormdata['email'])){
                $_SESSION['emailLogin'] = "Email is required for login";
                if(empty($this->adminFormdata['password'])){
                    $_SESSION['passwordLogin'] = "Password is required for login";
                }
            } 
          
            $stmt = $this->db->query('SELECT * FROM users WHERE role = 1 or 2'); //stmt object
            // while($row = $stmt->fetch()){ //here stmt return array

            while($row = $stmt->fetch(PDO::FETCH_OBJ)){ //pram returns static class object
                echo "<pre>";
                if($row->user_email == $this->adminFormdata['email']
                    && $row->user_password == $this->adminFormdata['password']){
                                        
                        if($row->role == 1){
                            $_SESSION['admin'] = "admin";
                        }
                        elseif($row->role == 2){
                            $_SESSION['sub_admin'] =  "Subadmin";
                        }
                    header('location:admin_panel.php');
                }else{    

                    header('admin_login.php');
                        
                }    
        }
}

    function subAdmin_data_view($query){
        $stmt = $this->db->prepare($query); //refrence object
        $stmt->execute(); //to execute prepare statement
        return $stmt;
        }        
    

    function add_subAdmin($fname, $lname, $email, $password){
        $ErrorSubAd = array();
        if(empty($fname)){
          $ErrorSubAd['fname'] = "Fname is required";  
        }if(empty($lname)){
            $ErrorSubAd['lname'] = "Lname is required";
        }if(empty($email)){
            $ErrorSubAd['email'] = "Email is required";
        }if(empty($lname)){
            $ErrorSubAd['password'] = "Password is required";
        }if(!empty($ErrorSubAd)){
            $_SESSION['ErrorSubAd'] = $ErrorSubAd;
            
        }else{
            if(!empty($_SESSION['ErrorSubAd'])){
                unset($_SESSION['ErrorSubAd']);
            }
            try{
                $addstmt = $this->db->prepare("insert into users(user_firstname, user_lastname,
                user_email, user_password, role) values(:fname, :lname, :email, :password, 2)");
                $addstmt->bindparam(":fname", $fname);
                $addstmt->bindparam(":lname", $lname);
                $addstmt->bindparam(":email", $email);
                $addstmt->bindparam(":password", $password);
                $addstmt->execute();
                header("location:subAdmins.php");
            }catch(Exception $ex){
                echo $ex->getMessage();
            }   
        }       
    }


    public function edit_subAdmin($editedData){
        $subAdError = array();
        if(empty($editedData['fname'])){
           $subAdError['fname'] = "fname is required";
        } 
        if(empty($editedData['lname'])){
            $subAdError['lname'] = "lname is required";
         } 
        if(empty($editedData['email'])){
            $subAdError['email'] = "email is required";
         } 
        if(empty($editedData['password'])){
            $subAdError['password'] = "password is required";
         }
        if(!empty($subAdError)){
            $_SESSION['subAdError'] = $subAdError;
        }else{
            if(!empty($editedData)){
                unset($_SESSION['subAdError']);
            }
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
                $stmt = $this->db->prepare($query);
                $data = [
                    ':fname' => $fname,
                    ':lname' => $lname,
                    ':email' => $email,
                    ':password' => $password,
                    ':id'      => $id
                ];
                $query_executed = $stmt->execute($data);
                if($query_executed){
                    header("location:subAdmins.php");
                }
                
            }catch(Exception $excep){
                $excep->getMessage();
            }
        }
    }

    public function delete_subAdmin($id){

        if(!empty($_SESSION['admin'])){
            $stmt = $this->db->prepare("delete from users where user_id = :user_id");
            $stmt->bindparam(":user_id", $id);
            $stmt->execute();
            return true;
        }else{
            echo "not allowed";
        }
    }
}





    ?>



