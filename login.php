<?php 

include 'authentication.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Learn HTML & CSS</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UI-Compatible" content="IE-Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">      

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
                        <a class="nav-link" href="#">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Log Out</a>
                    </li>
                </ul>
            </nav>
        </header>
        
        <main>
            <article class="form-container" style="height: 600px; padding-top: 0px;">

                <form action="authentication.php" method="post">
                    <h2>Login</h2>
                    <div>
                        <label class="text-gray text-size21" for="email">Email</label>
                        <input class="text-size21" type="email" id="email" name="email" placeholder="exp:@gmail.com">
                        <?php

                            if(!empty($_SESSION['loginError']['email'])){
                                echo $_SESSION['loginError']['email'];
                            }
                            if(!empty($_SESSION['inValidError']['email_pass'])){
                                echo $_SESSION['inValidError']['email_pass'];
                            }
                        ?>
                    </div>

                    <div>
                        <label class="text-gray text-size21" for="password">Password</label>
                        <input class="text-size21" type="password" id="password" name="password" placeholder="exp:123$%abc">
                        <?php
                            if(!empty($_SESSION['loginError']['password'])){
                                    echo $_SESSION['loginError']['password'];
                            }
                                if(!empty($_SESSION['inValidError']['email_pass'])){
                                    echo $_SESSION['inValidError']['email_pass'];
                                }
                        ?>                   
                    </div>

                    <div>
                        <label class="text-gray text-size21" for="remember_me" class="text-checkbox">Remember me</label>
                        <input class="text-size21" type="checkbox" id="remember_me">
                    </div>

                    <button id="btnsignUp" type="submit" name="submit">Login</button>
                    
                    <p><a class="text-center text-Montserrat text-size21"  href="./signup/signup.php">Don't have an account? Sign Up</a></p>
                </form>

            </article>
        </main>

        <footer>
            <!-- hexacode of @ -->
            <p class="copyright text-gray">&copy;Copyright 2022 by Poonam All Rights Reserved.</p>
        </footer>
        <script>
        </script>
    </body>
</html>