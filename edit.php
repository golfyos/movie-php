<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/index.css">
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        <meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <style>
            .alert {
                padding: 20px;
                background-color: #f44336;
                color: white;
                opacity: 1;
                transition: opacity 0.6s;
                margin-bottom: 15px;
            }

            .alert.success {background-color: #4CAF50;}
            .alert.info {background-color: #2196F3;}
            .alert.warning {background-color: #ff9800;}

            .closebtn {
                margin-left: 15px;
                color: white;
                font-weight: bold;
                float: right;
                font-size: 22px;
                line-height: 20px;
                cursor: pointer;
                transition: 0.3s;
            }

            .closebtn:hover {
                color: black;
            }
        </style>
    </head>

    
    <body>
    
        <div class="bar">
            <div class="inside"> 
                <?php 
                session_start();
                require './config/db_config.php';
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
        <?php

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $fn = $_POST["fname"];
                $ln = $_POST["lname"];
                $em = $_POST["email"];
                $sess = $_SESSION["uname"];
                $sqlUpdate = "UPDATE user SET fname='$fn',lname='$ln',email='$em' WHERE uname='$sess'";
                $result = $con->query($sqlUpdate);
        ?>
                <div class="alert success" >
                    <span class="closebtn">&times;</span>  
                    <strong>Success!</strong> Redirecting To Profile in 3 seconds.
                </div>

                <script>
                    function redirec(){
                        setTimeout(function(){
                            window.location.replace("./profile.php");
                        }, 3000);
                        
                    }
                    redirec();
                </script>
                
        <?php
                //header("Location: ./profile.php");
            }
        ?>
        <div id="profile">
            <form action="./edit.php" method="post">
                <?php
                    
                    if(isset($_SESSION["uname"])){
                        $ses = $_SESSION["uname"];
                        $sql    = "SELECT * FROM user WHERE uname='$ses'";
                        $result = $con->query($sql);
                        if($result->num_rows>0){
                            $row = $result->fetch_assoc();

                            ?>
                
                        <p>  Username: <input type="" name="uname"  value="<?= $row['uname'] ?>" disabled > </p>
                        <p>  First Name:  <input type="" name="fname" required > </p>
                        <p>  Last Name: <input type="" name="lname" required> </p>
                        <p>  Email: <input type="" name="email" required> </p>
                            <?php
                        }
                    }else{
                        echo "<h1> Please Login First </h1>";
                    }
                ?>
                <button type="reset">Reset</button>
                <button type="submit">Save</button>
            </form>

            
        </div>
    </body>

    

    
</html>