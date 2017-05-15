<?php

    $options = ['cost' => 12,];
    $pwd = "1234";
    $pass = password_hash($pwd,PASSWORD_BCRYPT,$options);
    echo $pass;

    if(password_verify("1234",$pass)){
        echo "<br>valid";
    }else echo "invalid";
   

?>