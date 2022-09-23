<?php
$DB_host = "localhost";
$DB_user  = "root";
$db_pass = "";
$DB_name = "bloggingdb";


try{
    $db = new PDO("mysql:host={$DB_host};dbname={$DB_name}", $DB_user, $db_pass);
} catch( Exeption $ex){
    echo $ex->getMessage(); 
}

?>