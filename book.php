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
                            <li class="active"><a href="book.php">book a trip</a></li>
                            <li><a href="mytrips.php">show my trips</a></li>
                            <?php if($_SESSION['user']=='admin'){ ?>
                            <li><a href="admin_fun1.php">display a user's trip</a></li>
                            <li><a href="admin_fun2.php">display all trains</a></li>
                            <?php }?>
                        </ul>
                    </div><!--/.well -->
                </div>

                <div class="span10">
                    <div class="row-fluid">
                        <form name="register" action="do_register.php" method=post>
                            <div class="row">
                                <div class="span3 offset1">
                                    <p>Departure Station <input type=text name="Departure_Station"></p>
                                </div><!--/span-->
                                <div class="span3">
                                    <p>Arrival Station <input type=text name="Arrival_Station"></p>
                                </div><!--/span-->    

                                <div class="span3">
                                    <p>Departure Time <input id="datepicker" data-date-format="yyyy-mm-dd hh:ii" type=text name="Departure_Time"></p>
                                </div><!--/span-->  
                            </div>
                            <div>
                                <div class="span3 offset1">
                                    <p><button class="btn btn-info" id="search" type="button" >Search</button></p>
                                </div>
                            </div>
                        </form>
                    </div>
                    <table class="table">
                        <thead id="search_head">
                        </thead>
                        <tbody id="search_result">
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </body>
    <script type="text/javascript">
        $('#search').click(function(){
            ds=$('[name=Departure_Station]').val();
            as=$('[name=Arrival_Station]').val();
            time=$('[name=Departure_Time]').val();
            $.post("search.php",{from:ds,to:as,time:time},
            function(data){
                if(data){
                    $('#search_head')[0].innerHTML="<tr><th>#</th><th>Departure</th><th>Arrival</th><th>Duration</th><th>Operation</th></tr>";
                    $('#search_result')[0].innerHTML=data;
                }
            })
        })
        $('#datepicker').datetimepicker({
            format: "yyyy-mm-dd hh:ii",
            autoclose: true
        });
        $(document.body).delegate('[name=book]','click',function(e){
            //alert(e.target.getAttribute('other'));
            other=e.target.getAttribute('other');
            id=e.target.getAttribute('id');
            user="<?php echo $_SESSION['user'];?>";
            date=$('#datepicker').val();
            $.post("do_book.php",{other:other,user:user,date:date,id:id},
            function(data){
                if(data=='true'){
                    alert("Sucessful.");
                }else{
                    alert("Time conflicts , please choose another train.");
                }
            })
        }) 
        $(function(){
            msg="<?php echo $_SESSION['msg'];?>";
            if(msg){
                alert(msg);
                user="<?php echo $_SESSION['user'];?>";
                $.post("clear_msg.php",{user:user},function(data){
                    if(data){
                        alert(data);
                    }
                })
            }
        })
    </script> 
</html>

