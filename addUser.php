<?php if($_SERVER['REQUEST_METHOD'] == 'POST'){ ?>

<?php
    require './config/db_config.php';
    session_start();

    $fname      = $_POST["fname"];
    $lname      = $_POST["lname"];
    $email      = $_POST["email"];
    $username   = $_POST["username"];
    $pwd        = $_POST["password"];
    $options    = ['cost' => 12,];
    
    /**  Store password in DB  **/
    $pass   = password_hash("$pwd", PASSWORD_BCRYPT, $options);
    $sql    = "INSERT INTO user (uname,pwd,email,fname,lname) VALUES('$username','$pass','$email','$fname','$lname')";
    $result = $con->query($sql);

    if($result !== FALSE){
        $_SESSION["fname"] = $fname;
        $_SESSION["lname"] = $lname;
        $_SESSION["email"] = $email;
        $_SESSION["uname"] = $username;

        header("Location: ./success.php");
    }
?>

<?php } else header('Location: index.php');?>