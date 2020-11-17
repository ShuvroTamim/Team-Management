<?php
    include_once('resources/connection.php');
    $id = $_GET['id'];
    $data = $mySql->query("SELECT* FROM member_info WHERE ID= $id");
    while ($dt = $data->fetch_assoc()) {
        $oldImage = $dt['Image'];
    }
    unlink("images/$oldImage");
    $mySql->query("DELETE FROM member_info WHERE ID= $id");
    header('location:info.php');
?>