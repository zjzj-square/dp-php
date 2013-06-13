<?php

include_once 'Base.php';
$username = $_POST['username'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
Base::DB_Connect();
$sql = "select * from `Users` where username='" . mysql_real_escape_string($username) . "'";
$result = mysql_query($sql);
$data = mysql_fetch_array($result);
if ($data == FALSE) {
    $sql = "insert into `Users` values (null,'" . mysql_real_escape_string($username) . "','" . mysql_real_escape_string($password) . "','" . mysql_real_escape_string($firstname) . "','" . mysql_real_escape_string($lastname) . "','" . mysql_real_escape_string($email) . "')";
    mysql_query($sql);
    session_start();
    $liftime = 5 * 60;
    setcookie(session_name(), session_id(), time() + $liftime, "/");
    $_SESSION['login'] = true;
    $_SESSION['user'] = $username;
    echo "<script>alert('Thanks for register.');location.href='index.php';</script>";
    exit;
} else {
    echo "<script>alert('Sorry , the Username already exist.');location.href='register.php';</script>";
    exit;
}
?>
