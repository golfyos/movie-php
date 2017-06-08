<html>
    <head>
          <link rel="stylesheet" type="text/css" href="./css/profile.css">
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        <meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="bar">
            <div class="inside"> 
                <?php 
                session_start();
                if(isset($_SESSION["uname"])){
                    echo ' <a href="./profile.php">' .$_SESSION["fname"]."  ".$_SESSION["lname"].'</a> &nbsp;|&nbsp; 
                    (<a href="./logout.php">Logout</a>)';
                }else{
                    echo ' <a id="login" href="./login.php"> Login</a> &nbsp;|&nbsp; 
                    <a id="register" href="./register.php"> Register </a>';
                }
                ?>
                <a href="./" id="home"> Home</a>
                <a href="#" id="category"> Category</a> 
            </div>
        </div>
        <div class="header"> Profile </div>
        <div id="profile">
            <?php
                require './config/db_config.php';

                if(isset($_SESSION["uname"])){
                    $ses = $_SESSION["uname"];
                    $sql    = "SELECT * FROM user WHERE uname='$ses'";
                    $result = $con->query($sql);
                    if($result->num_rows>0){
                        $row = $result->fetch_assoc();

                        ?>
            
                    <p>   Username: <?=$row["uname"]?> </p>
                    <p>   First Name:  <?=$row["fname"]?> </p>
                    <p>   Last Name: <?=$row["lname"]?> </p>
                    <p>   Email: <?=$row["email"]?> </p>
                        <?php
                    }
                }else{
                    echo "<h1> Please Login First </h1>";
                }
            ?>

            <a href="./edit.php"> <button type="text">Edit</button> </a>
            

        </div>
    </body>

    
</html>