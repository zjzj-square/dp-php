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
                            <li><a href="book.php">book a trip</a></li>
                            <li class="active"><a href="mytrips.php">show my trips</a></li>
                        </ul>
                    </div><!--/.well -->
                </div>
                <div class="span10">
                    <table class="table">
                        <thead id="trip_head">
                            <tr>
                                <th>Departure</th>
                                <th>Arrival</th>
                                <th>Duration</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody id="trip_body">
                        </tbody>
                    </table>
                    <div class="span2 offset9">
                        <p><button class="btn btn-info" id="validate" type="button" >Validate Journey</button></p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<script>
    $(function(){
        user="<?php echo $_SESSION['user']; ?>";
        op="show";
        $.post("do_mytrip.php",{user:user,op:op},
        function(data){
            if(data){                    
                $('#trip_body')[0].innerHTML=data;
            }
        })
    })
    $(document.body).delegate('[name=del]','click',function(e){
        user="<?php echo $_SESSION['user']; ?>";
        op="del";
        id=e.target.getAttribute('id');
        $.post("do_mytrip.php",{user:user,op:op,id:id},
        function(data){
            if(data=='1'){
                alert("Deleted");
                window.location.reload();
            }else{
                alert(data);
            }
        })
    })
    $("#validate").click(function(){    
        arr=$('#trip_body')[0].children;
        valid=1;
        for(var i=0;i<arr.length-1;i++){
            to=arr[i].children[1].innerHTML.split("(")[0];
            from=arr[i+1].children[0].innerHTML.split("(")[0];
            if(to!=from){
                alert("There is some problem about your journey, please check it carefully.");
                valid=0;
            }
        }
        if(valid){
            alert("The journey is ok , please enjoy it.");
        }
    })
</script>