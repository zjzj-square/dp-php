<?php
session_start();
$liftime = 5 * 60;
setcookie(session_name(), session_id(), time() + $liftime, "/");

if ($_SESSION['login'] == true) {
    header("Location:book.php");
} else {
    ?>
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
                #btn_login {
                    width: 80px
                }
                #btn_login_div {
                    width:100px
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
            <div class="span10">
                <form name="login" action="login.php" method=post>
                    <div class="row offset4"><span class="form_text">Username</span><input type=text name="username"></div>
                    <div class="row offset4"><span class="form_text">Password</span><input type=password name="password"></div>
                    <div class="row offset4">
                        <div class="span1" id="btn_login_div">
                            <input class="btn btn-info" id="btn_login" name="login" type=submit value="Login"> 
                        </div>
                        <div class="span1">
                            <input class="btn btn-info" name="register" type="button" value="Register" onclick="go_register_page()">
                        </div>
                    </div>
                </form>
            </div>
        </body>
    </html>   
    <?php
}
?>

<script>
    function go_register_page(){
        location.href="register.php";
    }
</script>