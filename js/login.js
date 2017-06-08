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
                setTimeout(function(){
                    document.getElementById("errMsg").style.display = "none";
                }, 2000);
                //alert("WRONG USERNMAE OR PASS");
            }
        }
    });
    return ok; 
}