<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/edit.css">
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        <meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

 
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
                $_SESSION["fname"] = $fn;
                $_SESSION["lname"] = $ln;
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

