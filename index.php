<?php
session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>All Added Topic </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                background-color: #8fcfc7;
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
                    <th>ID</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    if(isset($_SESSION['user'])){
                        foreach($_SESSION['user'] as $key => $value){
                            echo "<tr>";
                            echo "<pre>";
                            echo "<td>" . $value['add_title']. "</td>";
                            echo "<td>" . $value['id']. "</td>";
                            ?>
                            <td><a href="edit.php?id=<?php echo $value['id']?>">Edit</a></td>
                            <td><a href="view.php?id=<?php echo $value['id']?>">View</a></td>
                            <td><a href="delete.php?id=<?php echo $value['id']?>">Delete</a></td>
                            <?php
                            "</tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>