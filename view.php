<?php

  
    if(isset($_GET['id'])){
        $g_id = $_GET['id'];
        session_start();
        if(isset($_SESSION['user'])){
            foreach($_SESSION['user'] as $key => $value){
                if($value['id'] == $g_id){
                    $userIndexData = $_SESSION['user'][$key];
                    break;
                }
            }
        }
    }else{
        header('location:index.php');
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>View</title>
        <meta charset="utf=8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            article{
                width:500px;
                height:500px;
                margin:auto;
                backgroun-color:green;
            }
            <style>
            caption{
                font-size:21px;
                font-weight:600;
                margin-bottom:20px;
            }            
            table, th, td{
                border:1px solid gray;
                margin:2% 20% 10% 20%;
            }
            table{
                margin-bottom:50px;
            }
            td, th{
                text-align: center;
                padding:8px 16px;
                font-family: Montserrat;
                font-weight: 500;
            }
            tr:nth-child(even), thead{
                background-color: #8fcfc7;;
            }
            .table{
                margin-bottom: 50px;   
            }
        </style>
    </head>
    <body>
    <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $userIndexData['add_title']; ?></td>
                    <td><?php echo $userIndexData['add_desc']; ?></td>
                </tr>
            </tbody>
        </table>
    </body>
</html>