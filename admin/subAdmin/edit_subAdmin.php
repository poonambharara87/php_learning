<?php

include '../../config.php';

include '../adminController.php';

if(isset($_SESSION['admin']) && isset($_GET['id'])){

}else{
    header("location:../admin_login.php");
} 
if(isset($_GET['id'])){

    if(isset($_POST['update'])){
        $admin = new admin(null, $db);
        $admin->edit_subAdmin($_POST);
    }
}


//To show data in form
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $admin = new admin(null, $db);
    $query = "select * from users where user_id = :id LIMIT 1";
    $stmt = $db->prepare($query);

    $data = [':id' => $id];
    $stmt->execute($data);
    $result = $stmt->fetch(PDO::FETCH_OBJ);
       
    if($result == false){
        header("location:subAdmins.php");
    }
    //$result = $stmt->fetch(PDO::FETCH_OBJ); 
}


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.1">
        <title>Update Sub-Admin</title>
        <link rel="stylesheet" href="../../css/style.css">

    </head>
    <body>
        <div id="main-container">
            <h1>Update User</h1>
            <form action="edit_subAdmin.php?id=<?php echo $result->user_id; ?>" method="post" id="form-container">

                <input type="hidden" name="id" value="<?php echo $result->user_id; ?>">
                <label for="fname" class="labelStyle text-color">First Name</label>
                <input type="text" name="fname" value="<?php echo $result->user_firstname; ?>" class="inputStyle text-color">
                <?php
                    if(!empty($_SESSION['subAdError']['fname'])){
                        echo "<span class='message'> " . $_SESSION['subAdError']['fname'] . "</span>";
                    }
                ?>

                <label for="lname" class="labelStyle text-color">Second Name</label>
                <input type="text" name="lname" value="<?php echo $result->user_lastname; ?>" class="inputStyle text-color">
                <?php
                    if(!empty($_SESSION['subAdError']['lname'])){
                        echo "<span class='message'> " . $_SESSION['subAdError']['lname'] . "</span>";
                    }
                ?>
                <label for="email" class="labelStyle text-color">Email</label>
                <input type="email" name="email" value="<?php echo $result->user_email; ?>" class="inputStyle text-color">
                <?php
                    if(!empty($_SESSION['subAdError']['email'])){
                        echo "<span class='message'> " . $_SESSION['subAdError']['email'] . "</span>";
                    }
                ?>               
                <label for="passwod" class="labelStyle text-color">Password</label>
                <input type="password" name="password" value="<?php echo $result->user_password; ?>"class="inputStyle text-color passInput">
                <?php
                    if(!empty($_SESSION['subAdError']['password'])){
                        echo "<span class='message'> " . $_SESSION['subAdError']['password'] . "</span>";
                        $_SESSION['subAdError'] = [];
                    }
                ?>
                <button type="submit" name="update" class="btn-submit ">Update</button>
            </form>
        </div>
    </body>
</html>