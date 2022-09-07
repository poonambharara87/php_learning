<?php
session_start();
include 'insert.php';

?>


<!DOCTYPE html>
<html>
    <head>
        <title>ToDoList</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            form{
                /* text-align: left; */
                width: 520px;
                margin: 50px 20px 20px 50px;
            }
            input{
                margin-bottom: 40px;
            }
            textarea{
                margin-bottom: 28px;
            }
            button{
                margin: auto;
                margin-left: 0px;
            }
            .title_error{
                color:red;
                text-align:right;
            }
            /* .title{
                position: absolute;
                margin-top: -24px;
            }
            .desc{
                position: absolute;
                margin-top: 37px;
                margin-left: -277px;
            } */

            .desc{
                position: absolute;
                margin-top: -21px;
            }
        </style>
    </head>
    <body>
        <form action="insert.php" method="post">
            <div>
                <label class="title">Title</label>
                <input name="add_title" type="text" placeholder="Enter the Title: exp:food"/>
                <?php
                    if(!empty($_SESSION['error']['title_err'])){
                        echo "<span class='title_error'>" . $_SESSION['error']['title_err'] . "</span>";
                    }
                ?>
            </div>
            <div>
                <label class="desc">Description</label>
                <textarea rows="15" cols="40" name="add_desc" placeholder="add_desciption: "></textarea>
                <?php
                    if(!empty($_SESSION['error']['desc_err'])){
                            echo "<span class='title_error'>" . $_SESSION['error']['desc_err'] . "</span>";
                        }
                ?> 
            </div>  
            
            <div>
                <button name="submit" value="submit" type="submit">Submit</button>
            </div>
        </form>
    </body>
</html>