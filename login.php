<?php

include_once 'Base.php';

$login_username = $_POST['username'];
$login_password = $_POST['password'];
Base::DB_Connect();
$sql = "select * from Users where username='" . mysql_real_escape_string($login_username) . "' and password='" . md5(mysql_real_escape_string($login_password)) . "'";
$result = mysql_query($sql);
$data = mysql_fetch_array($result);
if ($data != FALSE) {
    session_start();
    $liftime = 5 * 60;
    setcookie(session_name(), session_id(), time() + $liftime, "/");
    $_SESSION['login'] = true;
    $_SESSION['user'] = $login_username;
    header("Location:index.php");
    exit;
} else {
    echo "<script>alert('Incorrect username or password.');location.href='index.php';</script>";
    exit;
}
?>
