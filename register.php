<html>

    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    </head>
    <body>
        <form action="addUser.php" onsubmit="return validatePassword()" method="post">
            First Name: <input type="text" name="fname" required> <br>
            Last Name: <input type="text" name="lname" required> <br>
            Email: <input type="text" id="e" name="email" required> <br>
            Username: <input type="text" id="username" name="username" required> <br>
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
            //alert("pass SQL");
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
                pwd.style.border = "none";
                cpwd.style.border = "none";
                //alert("Match");
            }
            return ok && validateEmail() &&  protectSQLInjection() && checkUsernameExist() && checkEmailExist();
        }

        function checkUsernameExist(){
            var username = document.getElementById('username').value;
            var ok = false;
            $.ajax({ 
                url : "./phpajax/check_username.php", 
                type : "POST",
                async : false,
                data : {username: username},        
                success:  function (response){						
                    if (response==0){
                        ok = false;
                        alert("Change username");
                    }
                    if (response==1){
                        ok = true;
                        alert("Username Pass");
                    }                    
                }
            });	 
            return ok;
        }

        function checkEmailExist(){
            var email = document.getElementById('e').value;
            var ok = false;
            $.ajax({ 
                url : "./phpajax/check_email.php", 
                type : "POST",
                async : false,
                data : {email: email},        
                success:  function (response){						
                    if (response==0){
                        ok = false;
                        alert("Change Email");
                    }
                    if (response==1){
                        ok = true;
                        alert("Email Pass");
                    }                    
                }
            });	 
            return ok;
        }
    </script>
</html>