<?php
session_start();
if ($_SESSION['login'] != true) {
    header("Location:index.php");
}
$liftime = 5 * 60;
setcookie(session_name(), session_id(), time() + $liftime, "/");

$user = $_POST['user'];
$op = $_POST['op'];

include_once "Base.php";
Base::DB_Connect();
if ($op == "show") {
    $sql = "select * from BookRecord where username='" . $user . "' ORDER BY `DepartureTime`";
    $result = mysql_query($sql);
    $i = 1;
    while ($data = mysql_fetch_array($result)) {
        if ($i % 2) {
            echo '<tr class="info">';
        } else {
            echo '<tr >';
        }
        $i = $i + 1;
        echo '<td>' . $data['Departure'] . '(' . $data['DepartureTime'] . ')</td>';
        echo '<td>' . $data['Arrival'] . '(' . $data['ArrivalTime'] . ')</td>';
        echo '<td>' . $data['Duration'] . '</td>';
        echo '<td><button class="btn btn-info" name="del" id="del' . $data['id'] . '">DEL</button></td></tr>';
    }
    return;
}
if ($op == "del") {
    $id = substr($_POST['id'], 3);
    $sql = "DELETE FROM `bookrecord` WHERE `id` = $id";
    $result = mysql_query($sql);
    echo $result;
    return;
}
?>
