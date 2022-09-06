<?php 

    print_r($_POST);
    $result = $_POST;
    // print_r($result);
    
    echo "<pre>";   
   
    if(isset($result['submit'])){
        // print_r($_FILES['uploadFile']); 
    }

    session_start();
    
    echo "</pre>";  
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Learn HTML & CSS</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UI-Compatible" content="IE-Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">       

    </head>

    <body>
        <main>
            <h2>Sign Up</h2>
            <h3 class="text-center text-size21 text-Montserrat text-gray">Create your own Account</h3>
                <form action="" method="post" id="form"  enctype="multipart/form-data" >
                    <article class="form-container article-margin">
                        <div>
                            <label class="text-gray text-size21" for="Fname">First Name</label>
                            <input class="text-size21 input-ml" required type="text" id="fname" name="fname" placeholder="exp:First Name">
    
                            <label class="text-gray text-size21" for="Lname">Last Name</label>
                            <input class="text-size21 input-ml" required type="text" id="Lname" name="Lname" placeholder="exp:Last Name">
                        </div>
                        
                        <div>
                            <label class="text-gray text-size21" for="Phone">Phone Number</label>
                            <input class="text-size21 ml54" type="tel" id="Phone" name="Phone" pattern="[0-9]{10}" placeholder="exp:8934899878" required>
    
                            <label class="text-gray text-size21" for="email">E-mail</label>
                            <input class="text-size21 ml145" type="email" id="email" name="email" placeholder="exp:your@gmail.com" required>
                        </div>

                        <div>
                            <input type="checkbox" id="vehicle1" name="checklist[]" value="Bike" >
                            <label for="vehicle1"> I have a bike</label><br>
                            <input type="checkbox" id="vehicle2" name="checklist[]" value="Car">
                            <label for="vehicle2"> I have a car</label><br>
                            <input type="checkbox" id="vehicle3" name="checklist[]" value="Boat">
                            <label for="vehicle3"> I have a boat</label><br>    
                        </div>

                        <div>
                        <label>Fav Car</label><br> 
                            <select name="cars[]" id="cars" multiple>
                                <option name="cars[]">Volvo</option>
                                <option name="cars[]">Saab</option>
                                <option name="cars[]">Mercedes</option>
                                <option name="cars[]">Audi</option>
                            </select>                        
                        </div>

                        <div>
                            <label class="text-gray text-size21">file</label>
                            <input class="text-size21 ml54" type="file" name="uploadFile">
                        </div>

                        <div class="text-center">
                            <button  class="" id="btnsignUp" name="submit" type="submit" value="submit" class="">Create Account</button>                   
                            <!-- <p><a class="text-Montserrat text-size21 text-blue" href="login.html" >Don't have an account? Log in</a></p> -->
                        </div>
                    </article>

        
                </form>
        </main>
    </body>

    <?php
    if(count($result) > 0){

        if(isset($result) && isset($_FILES['uploadFile']) && isset($result['checklist']) && isset($result['cars'])){

            $filename = $_FILES['uploadFile']['name'];
            $tempname = $_FILES['uploadFile']['tmp_name'];
            $folder = "upload_file/".$filename;
            move_uploaded_file($tempname, $folder);
            $check = $result['checklist'];
        }
        ?>
        <ul style="text-align:left;">
           <li style='list-style-type:none;'> Firstname: <?php echo $result['fname']?$result['fname']:null?></li>
           <li style='list-style-type:none;'>LastName: <?php echo $result['Lname']?$result['Lname']:null?></li>
           <li style='list-style-type:none;' >Phone:  <?php echo $result['Phone']?$result['Phone']:null?></li>
           <li style='list-style-type:none;'>Email: <?php echo $result['email']?$result['email']:null?></li>
           <li style='list-style-type:none;'>Vehicle: <?php echo $result['checklist']?implode( ",  ",$result['checklist']):null?></li>
           <li style='list-style-type:none;'>Fav Car: <?php  echo $result['cars']?implode(" , ", $result['cars']):null?></li>
           <li style='list-style-type:none;'>Uploaded File:<img src="upload_file/table1stInnerJoin.png" alt="uploaded_image"></li>

        </ul>



     <?php
     
     
    }

    ?>
</html>