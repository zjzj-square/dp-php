<?php
session_start();
if ($_SESSION['login'] != true) {
    header("Location:index.php");
}
$liftime = 5 * 60;
setcookie(session_name(), session_id(), time() + $liftime, "/");

$user = $_POST['user'];
$other = $_POST['other'];
$id = substr($_POST['id'],4);
$date = date("Y-m-d", strtotime($_POST['date']));
$info = explode("&", $other);

$from = $info[0];
$to = $info[2];
$departureTime = $date . " " . $info[1];
$arrivalTime = $date . " " . $info[3];
$duration = $info[4];

include_once "Base.php";
Base::DB_Connect();
$sql = "select * from BookRecord where username='" . $user . "'";
$result = mysql_query($sql);
while ($data = mysql_fetch_array($result)) {
    if ((strtotime($data['DepartureTime']) <= strtotime($departureTime)) && (strtotime($departureTime) <= strtotime($data['ArrivalTime']))) {
        echo "false";
        return;
    }
    if ((strtotime($data['DepartureTime']) <= strtotime($arrivalTime)) && (strtotime($arrivalTime) <= strtotime($data['ArrivalTime']))) {
        echo "false";
        return;
    }
}
$sql = "INSERT INTO `BookRecord` VALUES (null,'$user','$from','$to','$departureTime','$arrivalTime','$duration','$id')";
mysql_query($sql);
echo "true";
return;
?>
