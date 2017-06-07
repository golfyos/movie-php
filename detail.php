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
                $check = false;
                    if(isset($_SESSION["uname"])){
                        echo ' <a href="./profile.php">' .$_SESSION["fname"]."  ".$_SESSION["lname"].'</a> &nbsp;|&nbsp; 
                                (<a href="./logout.php">Logout</a>)';
                        $check = true;
                                
                    }else{
                        echo ' <a id="login" href="./login.php"> Login</a> &nbsp;|&nbsp; 
                                <a id="register" href="./register.php"> Register </a>';
                        $check = false;
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
                $sql2   = "SELECT caster FROM cast WHERE id ='$id'";
                $result = $con -> query($sql);
                $result2= $con -> query($sql2);
                $row2     = $result2->fetch_assoc();
                if($result->num_rows>0){
                    $row = $result->fetch_assoc();
        ?>
           <div class="detailmovie">
               
                <div id="header"> <?= $row["mname"] ?>  </div>
                <div class="headmovie">
                <p><img src="http://clipart.pd4pic.com/images/3d-gold-star-clipart-no-background-9.jpg"
                style=" width : 25px; height : 25px;">
                <span id="rating" style="font-size : 30px;"><span style="color: blue;"> Rating : </span><?= $row["rating"] ?> </span><p>
                <img id="movie_poster" src="<?= $row["poster"] ?>" alt="$row["id"]"> </img>
                <p> Release Date : <?= $row["release_date"] ?> </p>
                <p> Category : <?= $row["category"] ?> </p>
                </div>
                <div class="traileranddes">
                <iframe src="https://www.youtube.com/embed/<?= $row["trailer"] ?>" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="des">
                <p><span style="color: blue;">Storyline : </span> <?= $row["description"] ?> </p>  
        
             


        <?php
                }

           
        ?>
        <div class="caster">
        <p style="color: blue;">Casts:</p>
        <?php 
            $str = explode(",",$row2["caster"]);
            for($k=0;$k<count($str);$k++){
                echo $str[$k]."<br><br>";
            }

        ?>
        </div>
      
        <?php
            if(isset($_POST["comment"]) && !empty(isset($_POST["comment"]))){
                $strr = $_SESSION["fname"]."  ".$_SESSION["lname"];
                $com = $_POST["comment"];
                
                $timezone  = 7; //(GMT -5:00) EST (U.S. & Canada) 
                $date = gmdate("j/m/Y H:i:s", time() + 3600*($timezone)); 

                $sql4 = "INSERT INTO review (id,uname,comment,dated) VALUES ('$id','$strr','$com','$date') ";
                $result4 = $con->query($sql4);


                //header("Location: ./detail.php?id=$id");
            }
        ?>
        <div class="review">
        <p style="color: blue;"> Review: </p>
            <form action="?id=<?= $id ?>" method="post">
                <?php if($check) { ?>
                    <textarea rows="8" cols="100" id="comment" name="comment" value=""></textarea>
                <?php } else {?>
                    <textarea rows="8" cols="100" placeholder="Please Login " disabled></textarea>
                <?php } ?>
                <button type="submit">Send</button>            
            </form>

        <?php
            $sql3 = "SELECT * FROM review WHERE id = '$id'";
            $result3 = $con->query($sql3);
            if($result3->num_rows>0){

                while($row3 = $result3->fetch_assoc()){
                    echo $row3['uname']."  ";
                    echo $row3['dated']."<br>";
                    echo $row3['comment']."<br><br>";
                }

            }
        ?>
        </div>
        </div>

        <?php
             } #close if
        ?>

    </body>

</html>
