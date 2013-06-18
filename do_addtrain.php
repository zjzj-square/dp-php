<?php
session_start();
if ($_SESSION['login'] != true) {
    header("Location:index.php");
}
$liftime = 5 * 60;
setcookie(session_name(), session_id(), time() + $liftime, "/");
$departure=$_POST['departure'];
$arrival=$_POST['arrival'];
$departuretime=$_POST['departuretime'];
$duration=$_POST['duration'];
include_once 'Base.php';
Base::DB_Connect();
$sql = "insert into `Trains` values (null,'" . mysql_real_escape_string($departure) . "','" . mysql_real_escape_string($arrival) . "','" . mysql_real_escape_string($departuretime) . "','" . mysql_real_escape_string($duration) .  "')";
mysql_query($sql);
header("Location:admin_fun2.php");
?>
