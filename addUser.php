<?php if($_SERVER['REQUEST_METHOD'] == 'POST'){ ?>



<?php
    require './config/db_config.php';
    
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $pwd = $_POST["password"];

    
    $options = ['cost' => 12,];


    /**  Store password in DB  **/
    $pass = password_hash("$pwd", PASSWORD_BCRYPT, $options);

    $sql = "INSERT INTO user (uname,pwd,email,fname,lname) VALUES('$username','$pass','$email','$fname','$lname')";
    $result = $con->query($sql);

    if($result !== FALSE){
        header("Location: index.php");
    }


    
    /** check password when login **/
    /*if(password_verify($pwd,$hash)){

    }*/

?>



<?php } else header('Location: index.php');?>