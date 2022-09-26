<?php

session_start();

unset($_SESSION['admin']);
unset($_SESSION['sub_admin']);
header("location:admin_login.php");