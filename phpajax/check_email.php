<?php
    require 'db_config.php';
    $email = $_POST["email"];
    $sql = "SELECT * FROM user WHERE email = '$email'";
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