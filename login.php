<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/index.css">
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        <meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="./js/login.js"> </script>

        <style>
            p#errMsg{
                color   : red;
                display : none;
            }
        </style>
    </head>
    
    <body>
        <?php session_start() ?>
        <form action="./" onsubmit="return verify()" method="post">
            Username: <input type="text" id="username" name="uname" value=""><br>
            Password: <input type="password" id="password" name="password" value=""><br>
            <p id="errMsg">Username OR Password Incorrect!</p><br>
            <input type="submit" value="Login">
        </form>
    </body>

    <script>
        function verify(){
            var uname    = document.getElementById("username");
            var password = document.getElementById("password");
            var ok       = false;
            $.ajax({
                url     : "./phpajax/check_login.php",
                type    : "POST",
                async   : false,
                data    : {uname:uname.value,password:password.value},
                success : function(res){
                    if(res==1){ 
                        ok = true;
                        //alert("SESSION Start");
                    }
                    if(res==0){
                        ok = false;
                        document.getElementById("errMsg").style.display = "inline";
                        //alert("WRONG USERNMAE OR PASS");
                    }
                }
            });
            return ok; 
        }
    </script>
</html>