<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <form name="register" action="do_register.php" method=post>
            Username <input type=text name="username">
            <p>
                Password <input type=password name="password">
            <p>
                FirstName <input type=text name="firstname">                
            <p>
                LastName <input type=text name="lastname">
            <p>
                Email <input type=text name="email">  
            <p>    
                <input name="register" type="button" value="Register" onclick="check_and_submit()">
        </form>
    </body>
</html>
<script>
    function check_and_submit(){
        var username=document.getElementsByName("username")[0].value;
        if (!username){
            alert("Please input the Username.");
            return;
        }
        var password=document.getElementsByName("password")[0].value;
        if (!password){
            alert("Please input the Password.");
            return;
        }
        var firstname=document.getElementsByName("firstname")[0].value;
        if (!firstname){
            alert("Please input the Firstname.");
            return;
        }    
        var lastname=document.getElementsByName("lastname")[0].value;
        if (!lastname){
            alert("Please input the Lastname.");
            return;
        }
        var email=document.getElementsByName("email")[0].value;
        if (!email){
            alert("Please input the Email");
            return;
        }
        var reMail = /[a-z0-9-]{1,25}@[a-z0-9-]{1,10}.[a-z]{3}/;
        if(!reMail.test(email)){
            alert("Invalid Email address.");
            return;
        }
        document.getElementsByName("register")[0].submit();
    }
</script>