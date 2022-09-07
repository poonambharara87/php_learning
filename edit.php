<?php
session_start(); 

    if(isset($_GET['id'])){
        $g_id = $_GET['id'];           
        $userdata = array();
        foreach($_SESSION['user'] as $key => $val){
            if($val['id'] == $_GET['id']){
                $userdata = $_SESSION['user'][$key];
                break;             
            }

        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>ToDoList</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            form{
                text-align: left;
                width: 400px;
                margin: 50px;
            }
            input{
                margin-bottom: 20px;
            }
            textarea{
                margin-bottom: 35px;
            }
            button{
                margin: auto;
                margin-left: 0px;
            }
            .title_error{
                color:red;
                text-align:right;
            }
        </style>
    </head>
    <body>
        <form action="update.php?id=<?php echo $userdata['id']; ?>" method="post">
            <input name="add_title" type="text" value="<?php echo $userdata['add_title']; ?>" placeholder="Enter the Title: exp:food"/>
            
            <textarea rows="15" cols="40" name="add_desc" placeholder="add_desciption:"><?php echo $userdata['add_desc']; ?></textarea>
            
            <div>
                <button name="submit" value="submit" type="submit">Submit</button>
            </div>
        </form>
    </body>
</html>




