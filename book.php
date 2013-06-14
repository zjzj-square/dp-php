<?php
session_start();
if ($_SESSION['login'] != true) {
    header("Location:index.php");
}
$liftime = 5 * 60;
setcookie(session_name(), session_id(), time() + $liftime, "/");
?>

<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <script type="text/javascript" src="bootstrap/js/jquery.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>

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
                            Logged in as <a href="#" class="navbar-link"><?php echo " <b>" . $_SESSION['user'] . "</b>"; ?></a>
                        </p>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span2">
                    <div class="well sidebar-nav">
                        <ul class="nav nav-list">
                            <li class="nav-header">functions</li>
                            <li class="active"><a href="book.php">book a trip</a></li>
                            <li><a href="mytrips.php">show my trips</a></li>
                        </ul>
                    </div><!--/.well -->
                </div>

                <div class="span10">
                    <div class="row-fluid">
                        <form name="register" action="do_register.php" method=post>
                            <div class="row">
                                <div class="span3 offset1">
                                    <p>Departure Station <input type=text name="username"></p>
                                </div><!--/span-->
                                <div class="span3">
                                    <p>Arrival Station <input type=text name="password"></p>
                                </div><!--/span-->    

                                <div class="span3">
                                    <p>Departure Time <input type=text name="password"></p>
                                </div><!--/span-->  
                            </div>
                            <div>
                                <div class="span3 offset1">
                                    <p><button class="btn btn-info" id="search" type="button" >Search</button></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </body>
    <script type="text/javascript">
        $('#search').on('click',function(){
            alert(222);
        })

    </script>    
</html>

