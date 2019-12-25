<?php
    session_start();
    

    $config_opt['db_host'] = "localhost";
    $config_opt['db_username'] = "root";
    $config_opt['db_password'] = "";
    $config_opt['db_name'] = "blog";

    $conn = mysqli_connect($config_opt['db_host'], $config_opt['db_username'], $config_opt['db_password'], $config_opt['db_name']) or die("Something Went Wrong to Connect Database !");


?>