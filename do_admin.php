<?php

session_start();
if ($_SESSION['login'] != true) {
    header("Location:index.php");
}
$liftime = 5 * 60;
setcookie(session_name(), session_id(), time() + $liftime, "/");

$user = $_POST['user'];
$op = $_POST['op'];
if ($user != "admin") {
    header("Location:book.php");
}
include_once 'Base.php';
Base::DB_Connect();
if ($op == "show") {
    $sql = "select * from Trains ";
    $result = mysql_query($sql);
    $i = 1;
    while ($data = mysql_fetch_array($result)) {
        if ($i % 2) {
            echo '<tr class="info">';
        } else {
            echo '<tr >';
        }
        $i = $i + 1;
        $ArrivalTime = strtotime($data['DepartureTime']) + strtotime($data['Duration']) - strtotime("00:00");
        echo '<td>' . $data['id'] . '</td>';
        echo '<td>' . $data['Departure'] . '(' . $data['DepartureTime'] . ')</td>';
        echo '<td>' . $data['Arrival'] . '(' . date("H:i", $ArrivalTime) . ')</td>';
        echo '<td>' . $data['Duration'] . '</td>';
        echo '<td><button class="btn btn-info" name="del" id="del' . $data['id'] . '" other="' . $data['Departure'] . '&' . $data['DepartureTime'] . '&' . $data['Arrival'] . '&' . date("H:i", $ArrivalTime) . '&' . $data['Duration'] . '">Del</button></td></tr>';
    }
}
if ($op == "del") {
    $id = substr($_POST['id'], 3);
    $sql = "DELETE FROM `Trains` WHERE `id` = $id";
    $result = mysql_query($sql);
    echo $result;
    if ($result) {
        $sql = "select * from `BookRecord` where `TrainId`=$id";
        $result = mysql_query($sql);
        while ($data = mysql_fetch_array($result)) {
            $u=$data['UserName'];
            $sql = "UPDATE `users` SET `msg` = 'There is a change about your booked train!' WHERE `UserName` ='$u';";
            mysql_query($sql);
        }
    }
    return;
}
?>
