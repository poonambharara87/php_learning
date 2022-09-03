<?php 
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Learn PHP, HTML & CSS</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UI-Compatible" content="IE-Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">        
        
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
        <header>
            <a id="logo" href="index.html">
                <svg class="w-64 h-64 logo-align" width="60px" xmlns="http://www.w3.org/2000/svg" 
                    viewBox="0 0 20 20" fill="currentColor">
                    <path d="M3.33 8L10 12l10-6-10-6L0 6h10v2H3.33zM0 8v8l2-2.22V9
                    .2L0 8zm10 12l-5-3-2-1.2v-6l7 4.2 7-4.2v6L10 20z">
                    </path>
                </svg>
                <span id="logo-text">Logo</span>
            </a>
            <nav>
                <ul id="navlist">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Logout</a>
                    </li>

                </ul>
            </nav>
        </header>
        
        <main>
            <article class="flex-container">   
                  <table>
                        <caption>User Data</caption>

                        <thead>                        
                                <tr>
                                    <th colspan="1">Firstname</th> 
                                    <th colspan="1">Lastname</th>
                                    <th colspan="1">E-mail</th>
                                    <th colspan="1">Password</th>                                
                                    <th colspan="1">ID</th>     
                                    <th colspan="2">Action</th>                               
                                 </tr>                       
                        </thead>
                        <tbody>                           
                                <?php      
                                    if(isset($_SESSION['user'])){                                          
                                    foreach($_SESSION['user'] as $key => $value){   
                                                                   
                                        echo"<tr>";                                                                                                                                                             
                                            echo"<td>" . $value['fname'] . "</td>";
                                            echo"<td>" . $value['lname'] . "</td>";
                                            echo"<td>" . $value['email'] . "</td>";
                                            echo"<td>" . $value['password'] . "</td>";
                                            echo "<td>" . $value['id'] . "</td>"; 

                                            ?>                                          
                                            <td><a href="edit.php?id=<?php echo $value['id']?>">Edit</a></td>
                                            <td><a href="delete.php?id=<?php echo $value['id']?>">Delete</a></td>
                                            <?php                       
                                        echo"</tr>";                                                                            
                                    }
                                }
                                
                                ?>                           
                          
                        </tbody>
                    </table> 
            </article>
        </main>

        <footer class="addposi">
            <!-- unicode of @ -->
            <p class="copyright text-gray">@Copyright 2022 by Poonam All Rights Reserved.</p>
        </footer>
    </body>
</html>