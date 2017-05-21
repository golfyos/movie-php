<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/detail.css">
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


        <?php
            
            require './config/db_config.php';

            if(isset($_GET["id"])){
                $id     = $_GET["id"];
                $sql    = "SELECT * FROM movie_detail WHERE id = '$id'";
                $result = $con -> query($sql);

                if($result->num_rows>0){
                    $row = $result->fetch_assoc();
        ?>

                <h1> <?= $row["mname"] ?>  </h1>
                <img src="<?= $row["poster"] ?>" alt="$row["id"]"> </img>
                <p> <?= $row["release_date"] ?> </p>
                <p> <?= $row["category"] ?> </p>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $row["trailer"] ?>" frameborder="0" allowfullscreen></iframe>
                <p> <?= $row["description"] ?> </p>
                <p> <?= $row["rating"] ?> </p>
                


        <?php
                }

            }
        ?>


    </body>

</html>
