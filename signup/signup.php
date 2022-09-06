<?php
session_start();  

include 'registration.php';
  
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Learn HTML & CSS</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UI-Compatible" content="IE-Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">       
    </head>

    <body>
        <main>
            <h2>Sign Up</h1>
            <h3 class="text-center text-size21 text-Montserrat text-gray">Create your own Account</h3>
                <form action="registration.php" method="post" id="form"  enctype="multipart/form-data" >
                    <article class="form-container article-margin">
                        <div>
                            <label class="text-gray text-size21" for="Fname">First Name</label>                            
                            <input class="text-size21 input-ml" type="text" id="fname" name="fname" placeholder="exp:First Name"/>
                            <?php  
                                if(!empty($_SESSION['error_validation']['fname'])){
                                    echo "<div>" .$_SESSION['error_validation']['fname']. "</div>";
                                    
                                }
                            ?>

                            <label class="text-gray text-size21" for="Lname">Last Name</label>
                            <input class="text-size21 input-ml"  type="text" id="lname" name="lname" placeholder="exp:Last Name"/>
                            <?php
                                if(!empty($_SESSION['error_validation']['lname'])){
                                    echo "<div>". $_SESSION['error_validation']['lname'] . "</div>";
                                }
                            ?>
                        </div>
                        
                        <div>
                            <label class="text-gray text-size21" for="email">E-mail</label>
                            <input class="text-size21 ml145" id="email" name="email" placeholder="exp:your@gmail.com"/>
                            <?php
                                if(!empty($_SESSION['error_validation']['email'])){
                                    echo $_SESSION['error_validation']['email'];
                                }                              
                            ?>
                        </div>

                        <div>    
                            <label class="text-gray text-size21" style="margin-right: 88px;">Password</label>
                            <input class="text-size21 leftto" type="password" name="password" placeholder="exp:sdflll"/>
                            
                            <?php
                                if(!empty($_SESSION['error_validation']['password'])){
                                    echo $_SESSION['error_validation']['password'];
                                } 
                               
                            ?>
                        </div>

                        <div class="text-center">
                            <button  class="" id="btnsignUp" name="submit" type="submit">Create Account</button>                   
                            <p><a class="text-Montserrat text-size21 text-blue" href="../login.php" >Don't have an account? Log in</a></p>
                        </div>
                    </article>

        
                </form>

        </main>

        <footer>
            <!-- hexacode of @ -->
            <p class="copyright text-gray">@Copyright 2022 by Poonam All Rights Reserved.</p>
        </footer>

    </body> 
</html>