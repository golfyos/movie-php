<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/index.css">
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        <meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    </head>
    <?php
        session_start();
    ?>
    <body>
        <div class="bar">
            <div class="inside"> 
                <?php 
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

        <div class="allMovie">
            <?php
                require './config/db_config.php';

                $sql    = "SELECT id,mname,poster FROM movie_detail";
                $result = $con->query($sql);
                if($result->num_rows>0){
                    $i=0;
                    $num_column = 1;
            ?>
            <table>
                <?php
                    while($row = $result->fetch_assoc()){
                          if($num_column == 1)
                            {
                ?>
                        <tr>
                            <?php } ?>
                                    <td class="movie">   
                                        <a href="./detail.php?id=<?=$row["id"]?>">
                                        <img src="<?= $row["poster"] ?>"> </img>
                                        <p>   <?= $row["mname"] ?></p>
                                        </a>
                                    </td>
                            <?php
                            if($num_column == 4){
                            ?>
                                </tr>
                            <?php
                                // reset num_column
                                 $num_column = 0;
         
                                }     
                                    $num_column++;
                                        }
                                ?>
                            </table>
                        
                   
            <?php   
                    
                }
            ?>
        </div>
    </body>  
</html>