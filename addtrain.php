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
            .form_box{
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
                            <a href="logout.php" class="navbar-link"><?php echo " Logout <b>" . $_SESSION['user'] . "</b>"; ?></a>
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
                            <li><a href="mytrips.php">show my trips</a></li>
                            <li><a href="admin_fun1.php">display a user's trip</a></li>
                            <li class="active"><a href="admin_fun2.php">display all trains</a></li>
                        </ul>
                    </div><!--/.well -->
                </div>
                <div class="span10">
                    <div class="span5 form_box">
                        <h1><span>Add A New Train</span></h1>
                        <form name="addtrain" action="do_addtrain.php" method=post>
                            <p>
                                <span class="form_text">Departure</span> <input type=text name="departure" id="departure">
                            </p>
                            <p>
                                <span class="form_text">Arrival</span> <input type=text name="arrival" id="arrival">
                            </p>
                            <p>
                                <span class="form_text">Time</span> <input type=text name="departuretime" id="departuretime">                
                            </p>
                            <p>
                                <span class="form_text">Duration</span> <input type=text name="duration" id="duration">
                            </p>
                            <p>    
                                <input class="btn btn-info" name="addtrain" type="button" value="Add" id="add_train">
                            </p>
                        </form>

                    </div>
                </div>
            </div>
    </body>
</html>

<script>
    $("#add_train").click(function(){
        departure=$("#departure").val();
        arrival=$("#arrival").val();
        departuretime=$("#departuretime").val();
        duration=$("#duration").val();
        re = /^([01][0-9]|2[0-3])\:[0-5][0-9]$/;
        if(!re.test(departuretime)){
            alert('Departure Time Form illegal.');
        }
        if(!re.test(duration)){
            alert('Duration Form illegal.');
        }
        document.getElementsByName("addtrain")[0].submit();
    })
</script>