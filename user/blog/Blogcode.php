<?php

include '../../database/config.php';

class blog{

    private $db_conn;

    function __construct($db){
        $this->db_conn = $db;
    }

    function blog_like($id){
        $userIdey = $_SESSION['user_id'];       
        $blog_id = $id;

        $query = "SELECT * FROM likes WHERE user_id = $userIdey and blog_id = $blog_id";
        $stmt = $this->db_conn->query($query);
        $stmt=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $stmt;
    }
}
