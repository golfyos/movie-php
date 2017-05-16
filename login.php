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
            body {
                color: #606468;
                font: 24px 'Open Sans', sans-serif;
                margin: 0;
            }
            .detail_login{
                padding-top: 10%;
	            margin: auto;
            }
            .info{
    font: 95% Arial, Helvetica, sans-serif;
    max-width: 525px;
    margin: 10px auto;
    padding: 16px;
    background: #F7F7F7;
	-webkit-box-shadow: 0px 10px 20px 15px rgba(217,208,217,0.71);
	-moz-box-shadow: 0px 10px 20px 15px rgba(217,208,217,0.71);
	box-shadow: 0px 10px 20px 15px rgba(217,208,217,0.71);
}
.info h1{
    background: #43D1AF;
    padding: 20px 0;
    font-size: 45px;
    font-weight: bold;
    text-align: center;
    color: #fff;
    margin: -16px -16px 16px -16px;
}
.info input[type="text"],
.info input[type="password"],
.info select 
{
    -webkit-transition: all 0.30s ease-in-out;
    -moz-transition: all 0.30s ease-in-out;
    -ms-transition: all 0.30s ease-in-out;
    -o-transition: all 0.30s ease-in-out;
    outline: none;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    background: #fff;
    margin-bottom: 4%;
    border: 1px solid #ccc;
    padding: 3%;
    color: #555;
    font: 95% Arial, Helvetica, sans-serif;
}
.info input[type="text"]:focus,
.info input[type="password"]:focus,
.info select:focus
{
    box-shadow: 0 0 5px #43D1AF;
    padding: 3%;
    border: 1px solid #43D1AF;
}

.info input[type="submit"]{
    box-sizing: border-box;
	font-size: 24px;
	font-weight: bold;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    padding: 3%;
    background: #43D1AF;
    border-bottom: 2px solid #30C29E;
    border-top-style: none;
    border-right-style: none;
    border-left-style: none;    
    color: #fff;
}
.info input[type="submit"]:hover{
    cursor : pointer;
    background: #2EBC99;
}
        </style>
    </head>
    
    <body>
        <?php session_start() ?>
        <div class="detail_login">
        <form action="./" onsubmit="return verify()" method="post">
        <div class="info">
         <h1>Login</h1>
           <input type="text" id="username" name="uname" value="" placeholder="Username"><br>
            <input type="password" id="password" name="password" value="" placeholder="Password"><br>
            <p id="errMsg">Username OR Password Incorrect!</p><br>
            <input type="submit" value="Login">
            </div>
        </form>
        </div>
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