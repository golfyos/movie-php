<?php 
    session_start();
    require '../config/db_config.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $uname      = $_POST["uname"];   
        $password   = $_POST["password"];
        
        $sql        = "SELECT * FROM user WHERE uname = '$uname'";
        $result     = $con->query($sql);

        if($result->num_rows==1){
            $row        = $result->fetch_assoc();
            $secretPass = $row["pwd"];
            
            if(password_verify($password,$secretPass)===true){
                $_SESSION["fname"] = $row["fname"];
                $_SESSION["lname"] = $row["lname"];
                $_SESSION["email"] = $row["email"];
                $_SESSION["uname"] = $row["uname"];
                echo "1";
                
            }else{
                echo "0";
            }
        }else{
            echo "0";
        }

        

    }else
        header("Location: ../index.php");


?>