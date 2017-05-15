<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/index.css">
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        <meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <?php
    session_start();
       /* session_start();
        if(isset($_SESSION["uname"])){
            echo "<script>
                    var no = document.getElementById('noSes');
                    no.style.display = 'none';
                    var ses = document.getElementById('ses');
                    ses.style.display = 'inline';
                </script>";
        }
        else{
             echo "<script>
                    var no = document.getElementById('noSes');
                    no.style.display = 'inline';
                    var ses = document.getElementById('ses');
                    ses.style.display = 'none';
                </script>";
        }*/
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

                <a href="#" id="home"> Home</a>
                <a href="#" id="category"> Category</a> 
            </div>
        </div>

        <div class="movie">
            
        </div>
    </body>

    <script>
        window.onload = function(){
            $.ajax({
                url     : './phpajax/load_data.php',
                type    : 'GET',
                async   : false,
                success : function(res){

                }
            });
        }
    </script>

    
</html>