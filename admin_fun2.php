<?php
session_start();
if ($_SESSION['login'] != true || $_SESSION['user']!='admin') {
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
                    <div class="span2 offset9">
                        <p><a class="btn btn-info" href="addtrain.php">Add A Train</a></p>
                    </div>
                    <table class="table">
                        <thead id="train_head">
                        </thead>
                        <tbody id="train_body">
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </body>
</html>

<script>
    $(function(){
        user="<?php echo $_SESSION['user']; ?>";
        op="show";
        $.post("do_admin.php",{user:user,op:op},
        function(data){  
            $('#train_head')[0].innerHTML="<tr><th>#</th><th>Departure</th><th>Arrival</th><th>Duration</th><th>Operation</th></tr>";
            $('#train_body')[0].innerHTML=data;
        })
    })
    $(document.body).delegate('[name=del]','click',function(e){
        user="<?php echo $_SESSION['user']; ?>";
        op="del";
        id=e.target.getAttribute('id');
        $.post("do_admin.php",{user:user,op:op,id:id},
        function(data){
            if(data=='1'){
                alert("Deleted");
                window.location.reload();
            }else{
                alert(data);
            }
        })
    })
</script>