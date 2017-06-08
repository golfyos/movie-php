<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/edit.css">
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        <meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <style>
        .bar .inside .dropbtn {
        height : 70%;
            background-color: black;
            color: white;
            padding: 16px;
            padding-top: 1%;
            padding-right: 1%;
            font-size: 28px;
            font-weight: bold;
            font-family: Courier New, Courier, monospace;
            border: none;
            cursor: pointer;
        }

        .bar .inside .dropdown {
            position: relative;
            display: inline-block;
        }

        .bar .inside .dropdown-content {
            display: none;
            position: absolute;
            color : white;
            background-color: black;
            min-width: 200px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .bar .inside .dropdown-content a {
            background-color: black;
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .bar .inside .dropdown-content a:hover {
            color : yellowgreen;
        }

        .bar .inside .dropdown:hover .dropdown-content {
            display: block;
            background-color: black;
        }

        .bar .inside .dropdown:hover .dropbtn {
            color : yellowgreen;
            background-color: black;    
        }
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
                 <div class="dropdown" id="category">
                    <button class="dropbtn">Categories</button>
                    <div class="dropdown-content">
                <a href="./category.php?c=sci-fi"> <span id="sci"> Sci-Fi  </span> </a>
                <a href="./category.php?c=adventure"> <span id="adventure"> Adventure  </span> </a>
                <a href="./category.php?c=drama"> <span id="drama"> Drama  </span> </a>
                <a href="./category.php?c=fantasy"> <span id="fantasy"> Fantasy  </span> </a>
                <a href="./category.php?c=action"> <span id="action"> Action  </span> </a>
                <a href="./category.php?c=comedy"> <span id="comedy"> Comedy  </span> </a>
                <a href="./category.php?c=animation"> <span id="animation"> Animation  </span> </a>
                <a href="./category.php?c=horror"> <span id="horror"> Horror  </span> </a>
                <a href="./category.php?c=thriller"> <span id="thriller"> Thriller  </span> </a>
                <a href="./category.php?c=romance"> <span id="romance"> Romance  </span> </a>
                <a href="./category.php?c=crime"> <span id="crime"> Crime  </span> </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header"> Edit Profile </div>
        <div class="edit">
            
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
        </div>
        <?php
                //header("Location: ./profile.php");
            }
            else{
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
                
                        <p>  Username: <input style="background-color:rgb(179,179,173);" type="" name="uname"  value="<?= $row['uname'] ?>" disabled > </p>
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

            <?php } ?>
        </div>
    </body>

    

    
</html>