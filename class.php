<?php
if(isset($_SESSION)){
   
}else{
session_start();
}
include 'config.php';

class admin{

    private $adminFormdata;

    function __construct($adminFormdata){
        $this->adminFormdata = $adminFormdata;
    }

    function Login($db){  
        $admin = array();
        $sub_admin = array();

        
        if(empty($this->addFormdata['email'])){
            $_SESSION['emailLogin'] = "Email is required for login";
            if(empty($this->adminFormdata['password'])){
                $_SESSION['passwordLogin'] = "Password is required for login";
            }
        } 


            $stmt = $db->query('SELECT * FROM users WHERE role = 1 or 2'); //stmt object
            // while($row = $stmt->fetch()){ //here stmt return array

            while($row = $stmt->fetch(PDO::FETCH_OBJ)){ //pram returns static class object
                echo "<pre>";
                if($row->user_email == $this->adminFormdata['email']
                    && $row->user_password == $this->adminFormdata['password']){
                        $_SESSION['admin'] = $admin;
                        $_SESSION['sub_admin'] = $sub_admin;
                    header('location:admin_panel.php');
                }else{    

                    header('admin_login.php');
                        
                }
               
        }
}
}

class subAdmin{
    private $db;

    function __construct($db){
        $this->db = $db;
    }

    function subAdmin_data_view($query){
        $stmt = $this->db->prepare($query); //refrence object
        $stmt->execute(); //to execute prepare statement
        if($stmt->rowCount() > 0){
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        ?>
            <tr>
                <td><?php  if(isset($row['user_id'])){ print_r($row['user_id']);}?></td>
                <td><?php  if(isset($row['user_firstname'])){ print_r($row['user_firstname']);}?></td>
                <td><?php  if(isset($row['user_lastname'])){ print_r($row['user_lastname']);}?></td>
                <td><?php  if(isset($row['user_email'])){ print_r($row['user_email']);}?></td>
                <td><?php  if(isset($row['role'])){ print_r($row['role']);}?></td>
                <td><a href="edit_subAdmin.php?id=<?php echo $row['user_id'];?>">Edit</a></td>
                <td><a href="delete_subAdmin.php?id=<?php echo $row['user_id'];?>">Delete</a></td>        
            </tr>
        <?php

        ?>
        <?php
            }
        }        
    }

    function add_subAdmin($fname, $lname, $email, $password){
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

    public function edit_subAdmin($editedData){
        
        print_r($editedData);
        

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

    public function delete_subAdmin($id){

        $stmt = $this->db->prepare("delete from users where user_id = :user_id");
        $stmt->bindparam(":user_id", $id);
        $stmt->execute();
        return true;
        
    }

}
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

class blogs{
    private $db;
    function __construct($db){
        $this->db = $db;
    }

    public function blogs_data_view($query){
        $stmt = $this->db->prepare($query); //refrence object
        $stmt->execute(); //to execute prepare statement
        if($stmt->rowCount() > 0){
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        ?>
        <?php
            if($row['status'] == 0){
        ?>
            <tr>
                <td><?php  if(isset($row['blog_id'])){ print_r($row['blog_id']);}?></td>
                <td><?php  if(isset($row['blog_tittle'])){ print_r($row['blog_tittle']);}?></td>
                <td><?php  if(isset($row['blog_description'])){ print_r($row['blog_description']);}?></td>
                <td><img  src="<?php  if(isset($row['blog_imgSource'])){ print_r($row['blog_imgSource']);}?>" alt="Blog Image"
                height="50px" width="50px"></td>
                <td><?php  if(isset($row['content'])){ print_r($row['content']);}?></td>               
                <td>Deactivate</td>
                <td><a href="activeBlog.php?id=<?php echo $row['blog_id'];?>">Active</a></td>
                <td><a href="editBlog.php?id=<?php echo $row['blog_id'];?>">Edit</a></td>
                <td><a href="deleteBlog.php?id=<?php echo $row['blog_id'];?>">Delete</a></td>        
            </tr>
        <?php

        ?>
        <?php
            } //if 
            else{

                ?>
                <tr>
                <td><?php  if(isset($row['blog_id'])){ print_r($row['blog_id']);}?></td>
                <td><?php  if(isset($row['blog_tittle'])){ print_r($row['blog_tittle']);}?></td>
                <td><?php  if(isset($row['blog_description'])){ print_r($row['blog_description']);}?></td>
                <td><img  src="<?php  if(isset($row['blog_imgSource'])){ print_r($row['blog_imgSource']);}?>" alt="Blog Image"
                height="50px" width="50px"></td>
                <td><?php  if(isset($row['content'])){ print_r($row['content']);}?></td>               
                <td>Activate</td>
                <td><a href="deactivateBlog.php?id=<?php echo $row['blog_id'];?>">Deactive</a></td>
                <td><a href="editBlog.php?id=<?php echo $row['blog_id'];?>">Edit</a></td>
                <td><a href="deleteBlog.php?id=<?php echo $row['blog_id'];?>">Delete</a></td>        
            </tr>

            <?php
            }

        } 
        }
    }

    public function add_blog($blogFormData){

        $tittle = $blogFormData['tittle'];
        $description = $blogFormData['description'];
        $content = $blogFormData['content'];

        if(isset($_FILES['uploadFile'])){
    
            $filename = $_FILES['uploadFile']['name'];
            $tempname = $_FILES['uploadFile']['tmp_name'];
            $folder = "blogImgs/" . $filename;

            move_uploaded_file($tempname, $folder);
            // echo "<img height='100px' width='100px' src='$folder'>";
        }

        try{
            $stmt = $this->db->prepare("insert into blogs(blog_tittle, blog_description,
            blog_imgSource, content) values(:tittle, :description, :uploadFile, :content)");
            $stmt->bindparam(":tittle", $tittle);
            $stmt->bindparam(":description", $description);
            $stmt->bindparam(":uploadFile", $folder);
            $stmt->bindparam(":content", $content);
            $stmt->execute();
            // header("location:blogs.php");
        }catch(Exception $ex){
            echo $ex->getMessage();
        }
    }

    public function edit_blog($editedBlogData){

        $id = $editedBlogData['id'];
        $tittle = $editedBlogData['tittle'];
        $description = $editedBlogData['description'];

        if(isset($_FILES['uploadFile'])){
    
            $filename = $_FILES['uploadFile']['name'];
            $tempname = $_FILES['uploadFile']['tmp_name'];
            $folder = "blogImgs/" . $filename;

            move_uploaded_file($tempname, $folder);
            // echo "<img height='100px' width='100px' src='$folder'>";
        }        
        $content = $editedBlogData['content']; 
        
        try{
            $query = "UPDATE blogs SET 
            blog_id=:id,
            blog_tittle=:tittle,
            blog_description=:descript,
            blog_imgSource=:folder,
            content=:content WHERE blog_id=:id LIMIT 1";
            $stmt = $this->db->prepare($query);
            $data = [
                ':id'      => $id,
                ':tittle' => $tittle,
                ':descript' => $description,
                ':folder' => $folder,
                ':content' => $content

            ];
            $query_executed = $stmt->execute($data);
            if($query_executed){
                header("location:blogs.php");
            }
            
        }catch(Exception $excep){
            $excep->getMessage();
        }
    }
  
    
    public function delete($id){

        $stmt = $this->db->prepare("delete from blogs where blog_id = :blog_id");
        $stmt->bindparam(":blog_id", $id);
        $stmt->execute();
        return true;
        
    }
}


    ?>



