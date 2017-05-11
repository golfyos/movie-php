<?php
    require 'db_config.php';
    $username = $_POST["username"];
    $sql = "SELECT * FROM user WHERE username = '$username'";
    $result = $con->query($sql);

    if($result === FALSE){
        echo "0";
        exit;   
    }else{
        if($result->num_rows>0)
            echo "0";
        else
            echo "1";
    }
?>