<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
         <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
            <link href="bootstrap/css/datetimepicker.css" rel="stylesheet" media="screen">
            <script type="text/javascript" src="bootstrap/js/jquery.js"></script>
            <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
            <script type="text/javascript" src="bootstrap/js/bootstrap-datetimepicker.min.js"></script>
            <style type="text/css">
                body {
                    padding-top: 60px;
                    padding-bottom: 40px;
                    text-align: center;
                }
                .sidebar-nav {
                    padding: 9px 0;
                }

                @media (max-width: 980px) {
                    /* Enable use of floated navbar text */
                    .navbar-text.pull-right {
                        float: none;
                        padding-left: 5px;
                        padding-right: 5px;
                    }
                }
                .form_text {
                    width: 70px;
                    display: inline-block;
                }
                .form_box{
                    margin:40px auto;
                    width:100%;
                }
            </style>
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" href="#">Enjoy your trip</a>
                    <div class="nav-collapse collapse">
                        <p class="navbar-text pull-right">
                            <a href="#" class="navbar-link">Register</a>
                        </p>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="span5 form_box">
            <form name="register" action="do_register.php" method=post>
            <p>
                <span class="form_text">Username</span> <input type=text name="username">
            </p>
            <p>
                <span class="form_text">Password</span> <input type=password name="password">
            </p>
            <p>
                <span class="form_text">FirstName</span> <input type=text name="firstname">                
            </p>
            <p>
                <span class="form_text">LastName</span> <input type=text name="lastname">
            </p>
            <p>
                <span class="form_text">Email</span> <input type=text name="email">  
            </p>
            <p>    
                <input class="btn btn-info" name="register" type="button" value="Register" id="check_and_submit"/>
            </p>
        </form>
        </div>
    </body>
</html>
<script>
    $("#check_and_submit").click(function(){
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
    })
</script>