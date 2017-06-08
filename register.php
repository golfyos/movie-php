<html>

    <head>
        <link rel="stylesheet" type="text/css" href="./css/register.css">
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        <meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="./js/register.js"> </script>
    </head>
    <body>
       
 <div class="detail_reg">
        <form action="addUser.php" onsubmit="return validatePassword()" method="post">
           <div class="info">
                <h1>Register</h1>
                <input type="text" name="fname" placeholder="First Name" required/>
                <input type="text" name="lname" placeholder="Last Name" required/>
                <input type="text" name="email" id="e" placeholder="Email" onchange="emailChange()" required/>
                <input type="text" id="username" name="username" placeholder="Username" onchange="usernameChange()" required> 
                <input type="password" id="p1" name="password" placeholder="Password" required> 
                <input type="password" id="p2" name="cpassword" placeholder="Confirm Password" required>
                <input type="submit" value="submit">
            </div>
        </form>
    </div>
</html>