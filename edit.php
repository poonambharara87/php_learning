<?php
session_start(); //where ever we use loaded sesion //start session first 

$userId = $_GET['id'];
$result = [];
if (!empty($userId)) {
    if(isset($_SESSION['user'])){
        foreach($_SESSION['user'] as $key => $value){            
            if($value['id'] == $userId){             
                $result = $_SESSION['user'][$key];  //user whole index                     
                break;           
            }
        }
    }
}

   
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
        <main>
            <h2>Edit</h1>
            <h3 class="text-center text-size21 text-Montserrat text-gray">Edit Account</h3>
                <form action="update.php?id=<?php echo $result['id'];?>" method="post" id="form"  enctype="multipart/form-data" >
                    <article class="form-container article-margin">
                        <div>
                            <label class="text-gray text-size21" for="Fname">First Name</label>                   
                            <input class="text-size21 input-ml" type="text" id="fname" value="<?php echo $result['fname']; ?>" name="fname" placeholder="exp:First Name"/ >

                            <label class="text-gray text-size21" for="Lname">Last Name</label>
                            <input class="text-size21 input-ml"  type="text" id="lname" value="<?php echo $result['lname']; ?>" name="lname" placeholder="exp:Last Name"/>
                        </div>
                        
                        <div>
                            <label class="text-gray text-size21" for="email">E-mail</label>
                            <input class="text-size21 ml145" type="email" id="email" value="<?php echo $result['email'];; ?>" name="email" placeholder="exp:your@gmail.com"/>
                        </div>

                        <div>    
                            <label class="text-gray text-size21" style="margin-right: 88px;">Password</label>
                            <input class="text-size21 leftto" type="password" value="<?php echo $result['password']; ?>" name="password" placeholder="exp:sdflll"/>
                        </div>

                        <div class="text-center">
                            <button  class="" id="btnsignUp" name="submit" type="submit">Submit</button>                   
                            <p><a class="text-Montserrat text-size21 text-blue" href="login.html" >Don't have an account? Log in</a></p>
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