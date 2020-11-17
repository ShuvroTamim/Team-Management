<?php
    $server_name = "localhost";
    $user_name = "root";
    $password = "";
    $db_name = "team_member";

    // Create connection
    $mySql = new mysqli($server_name, $user_name, $password, $db_name);

    // Check connection
    if ($mySql->connect_error) {
        die("Connection Failed: " . $mySql->connect_error);
    }
?>