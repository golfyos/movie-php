    <html>
    <head>
            <link rel="stylesheet" type="text/css" href="./css/index.css">
            <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
            <meta charset="utf-8">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
             <style>
.bar .inside .dropbtn {
    background-color: black;
    color: white;
   height : 70%;
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

.header{
    text-align: center;
    margin-top: 3%;
    margin-bottom: 2%;
    font-size: 50px;
    font-weight: bold;
    font-family: Courier New, Courier, monospace;
    text-shadow: 2px 2px 2px gray;
}
</style>
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
                        ?>
                        <div class="header">
                            <?php
                        echo "<div>" .strtoupper($cate). " &nbsp;MOVIES</div>";
                        ?>
                        </div>
                        <?php
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