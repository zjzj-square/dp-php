<?php
session_start();
$liftime = 5 * 60;
setcookie(session_name(), session_id(), time() + $liftime, "/");
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <script src="js/bootstrap.min.js"></script>
        
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
                            Logged in as <a href="#" class="navbar-link"><?php echo " <b>".$_SESSION['user']."</b>"; ?></a>
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
                            <li><a href="book.php">book a trip</a></li>
                            <li class="active"><a href="mytrips.php">show my trips</a></li>
                        </ul>
                    </div><!--/.well -->
                </div>
                <div class="span10">
                    <form name="register" action="do_register.php" method=post>
                        Departure Station <input type=text name="username">
                        <p>
                            Arrival Station <input type=password name="password">
                        <p>
                            Departure Time <input type=text name="firstname">                
                        <p>    
                            <input name="register" type="button" value="Register" onclick="search()">
                    </form>
                </div>
            </div>
        </div>

    </body>
</html>

<script>
function search(){
    alert(111);
}
</script>