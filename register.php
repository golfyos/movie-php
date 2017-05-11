<html>

    <head>
        
    </head>
    <body>
        <form action="checkRegister.php" onsubmit="return validatePassword()" method="post">
            First Name: <input type="text" name="fname" required> <br>
            Last Name: <input type="text" name="lname" required> <br>
            Email: <input type="text" id="e" name="email" required> <br>
            Username: <input type="text" name="username" required> <br>
            Password: <input type="password" id="p1" name="password" required> <br>
            Confirm Password: <input type="password" id="p2" name="cpassword" required> <br>

            <input type="submit" value="submit">
        </form>
    </body>

    <script>
        window.addEventListener("load", function(){
        });

        function protectSQLInjection(){
            var input = document.querySelectorAll("form input");

            for(var i=0;i<input.length;i++){
                var str = input[i].value;
                for(var j=0;j<str.length;j++){
                    if(str[j]==="'" || str[j]==="\""){
                        alert("Not Pass SQL");
                        return false;
                    }
                }
            }
            alert("pass SQL");
            return true;
        }

        function validateEmail(){
            var email = document.getElementById("e");
            var regex = /[\S]+@[\S]+\.[\S]+/;
            var ok = true;
            if(!regex.test(email.value)){
                alert("email not true");
                ok = false;
            }

            return ok;
        }

        function validatePassword(){
            var pwd = document.getElementById("p1");
            var cpwd = document.getElementById("p2");
            var ok = true;
            if(pwd.value != cpwd.value){
                alert("Not Match");
                pwd.style.border = "2px solid red";
                cpwd.style.border = "2px solid red";
                ok = false;
            }else{
                alert("Match");
            }
            return ok && validateEmail() &&  protectSQLInjection();
        }
        
    </script>
</html>