    <html>
    <head>
            <link rel="stylesheet" type="text/css" href="./css/index.css">
            <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
            <meta charset="utf-8">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        </head>

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
            <a href="#" id="category"> Category</a> 
        </div>
    </div>

    <div class="allMovie">

            <?php
                require './config/db_config.php';
                $sql    = "SELECT id,mname,poster,category FROM movie_detail";
                $result = $con->query($sql);
                if($result->num_rows>0){
                    $i=0;
                    $num_column = 1;
            ?>
            <table>
                <?php
                    $cate;
                    if(isset($_GET["c"])){
                        $cate = $_GET["c"];
                        echo "<h1>" .strtoupper($cate). " &nbsp;&nbsp;Movies</h1>";
                    }
                    while($row = $result->fetch_assoc()){
                        $row["category"] = preg_replace('/\s+/', '', $row["category"]);
                        $arrow = explode(",",$row["category"]);
                        $check = false;
                        for($i=0;$i<count($arrow);$i++){
                            if(strcasecmp($arrow[$i],$cate)==0){
                                $check = true;
                                break;
                            }
                        }

                        if($check==true){
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
                        }
                                ?>
                            </table>
                        
                   
            <?php   
                    
                }
            ?>
        </div>
</body>

</html>