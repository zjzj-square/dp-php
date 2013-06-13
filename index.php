<?php
session_start();
$liftime = 5 * 60;
setcookie(session_name(), session_id(), time() + $liftime, "/");

if ($_SESSION['login'] == true) {
    echo "login";
    var_dump($_SESSION);
    ?>
    <a href="book.php">book a train</a>
    <a href="logout.php">logout</a>
    <?php
} else {
    ?>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <title></title>
        </head>
        <body>
            <form name="login" action="login.php" method=post>
                Username <input type=text name="username">
                <p>
                    Password <input type=password name="password">
                <p>
                    <input name="login" type=submit value="Login">
                    <input name="register" type="button" value="Register" onclick="go_register_page()">
            </form>
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