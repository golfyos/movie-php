<html>

    <head>
         <link rel="stylesheet" type="text/css" href="./css/register.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
       
 <div class="detail_reg">
        <form action="addUser.php" onsubmit="return validatePassword()" method="post">
           <div class="info">
                <h1>Register</h1>
                <input type="text" name="fname" placeholder="First Name" required/>
                <input type="text" name="lname" placeholder="Last Name" required/>
                <input type="text" name="email" id="e" placeholder="Email" required/>
                <input type="text" id="username" name="username" placeholder="Username" required> 
                <input type="password" id="p1" name="password" placeholder="Password" required> 
                <input type="password" id="p2" name="cpassword" placeholder="Confirm Password" required>
                <input type="submit" value="submit">
            </div>
        </form>
    </div>

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
                alert("Pasword Not Match");
                pwd.style.border = "1px solid red";
                cpwd.style.border = "1px solid red";
                ok = false;
            }else{
                pwd.style.border = "none";
                cpwd.style.border = "none";
                //alert("Match");
            }
            var tmp = ok;
            var tmp2 = validateEmail() &&  protectSQLInjection() && checker() && tmp;
            return tmp2;
        }   

        function checker(){
            var a = checkUsernameExist();
            var b = checkEmailExist();
            return a&&b;

        }

        function checkUsernameExist(){
            var username = document.getElementById('username');
            var ok = false;
            var jqXHR  = $.ajax({ 
                url : "./phpajax/check_username.php", 
                type : "POST",
                async : false,
                data : {username: username.value},        
                success:  function (response){						
                    if (response==0){
                        ok = false;
                        username.style.border = "1px solid red";
                        alert("Username is used");
                    }
                    if (response==1){
                        ok = true;
                        username.style.border = "1px solid #ccc";
                        //console.log("Username Pass");
                    }         
                }
            });	 

            
            return ok;
            
        }

        function checkEmailExist(){
            var email = document.getElementById('e');
            var ok = false;
            $.ajax({ 
                url : "./phpajax/check_email.php", 
                type : "POST",
                async : false,
                data : {email: email.value},        
                success:  function (response){						
                    if (response==0){
                        ok = false;
                        email.style.border = "1px solid red";
                        alert("Email is used");
                    }
                    if (response==1){
                        email.style.border = "1px solid #ccc";
                        ok = true;
                        //console.log("Email Pass");
                    }      
                }
            });	 

            return ok;
            
        }
    </script>
</html>