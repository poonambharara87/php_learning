<?php

require 'config.php';
include 'class.php';
if(isset($_SESSION['admin']) && isset($_SESSION['sub_admin'])){

}else{
    header("location:admin_login.php");
} 
if(isset($_GET['id'])){

    if(isset($_POST['update'])){
        $users = new users($db);
        print_r($_POST);
        $users->edit($_POST);
    }
}


//To show data in form
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $users = new users($db);
    $query = "select * from users where user_id = :id LIMIT 1";
    $stmt = $db->prepare($query);
    $data = [':id' => $id];
    $stmt->execute($data);

    $result = $stmt->fetch(PDO::FETCH_OBJ); 
    // $result = $stmt->fetch(PDO::FETCH_ASSOC); echo $result['user_firstname'] 
}


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.1">
        <title>Update User</title>
        <style>
            body{
                box-sizing:border-box;
                margin:0px;
                padding:0px;
            }

            .text-color{
                color: #212221;
            }
            #main-container{
                margin-top: 20px;
                margin-bottom: 20px;
            }
            #form-container{
                width: 339px;
                height: 416px;
                background-color: #cfdddc;
                display: flex;
                flex-direction: column;
                padding: 40px;
                margin: auto;
            }
            .inputStyle{
                width: 300px;
                padding: 8px 12px;
                border-radius: 8px;
                margin-bottom: 20px;
                font-size: 18px;
                color:#363535;
            }
            .labelStyle{
                font-size: 18px;
                margin-left: 16px;
                margin-bottom: 8px;
                font-family: sans-serif;
            }
            .passInput{
                margin-bottom: 31px;
            }
            .btn-submit{
                width: 331px;
                padding: 9px 14px;
                border-radius: 3px;
                font-size: 18px;
                background-color:#212221;
                color: white;
                letter-spacing: 0px;
            }

            h1{
                text-align: center;
                font-family: sans-serif;
                font-weight: 600;
                color: #212221;
                margin: 5px;
                font-size: 25px;
            }
        </style>
    </head>
    <body>
        <div id="main-container">
            <h1>Update User</h1>
            <form action="edit.php?id=<?php echo $result->user_id; ?>" method="post" id="form-container">

                <input type="hidden" name="id" value="<?php echo $result->user_id; ?>">
                <label for="fname" class="labelStyle text-color">First Name</label>
                <input type="text" name="fname" value="<?php echo $result->user_firstname; ?>" class="inputStyle text-color">

                <label for="lname" class="labelStyle text-color">Second Name</label>
                <input type="text" name="lname" value="<?php echo $result->user_lastname; ?>" class="inputStyle text-color">
                <?php   
                ?> 
                <label for="email" class="labelStyle text-color">Email</label>
                <input type="email" name="email" value="<?php echo $result->user_email; ?>" class="inputStyle text-color">
                <?php   
                ?>                
                <label for="passwod" class="labelStyle text-color">Password</label>
                <input type="password" name="password" value="<?php echo $result->user_password; ?>"class="inputStyle text-color passInput">
                <button type="submit" name="update" class="btn-submit text-color">Update</button>
            </form>
        </div>
    </body>
</html>