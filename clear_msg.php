<?php

unset($_SESSION['msg']);
$user = $_POST['user'];
include_once 'Base.php';
Base::DB_Connect();
$sql = "UPDATE `users` SET `msg` = NULL WHERE `UserName` ='$user';";
mysql_query($sql);
?>
