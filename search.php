<?php

include_once 'Base.php';
$from = $_POST['from'];
$to = $_POST['to'];
$time = $_POST['time'];

Base::DB_Connect();
$sql = "select * from Trains where Departure='" . mysql_real_escape_string($from) . "' and Arrival='" . mysql_real_escape_string($to) . "'";
$result = mysql_query($sql);
while ($data = mysql_fetch_array($result))
    if (strtotime($data['DepartureTime']) >= strtotime($time)) {       
        if ($data['id'] % 2) {
            echo '<tr class="info">';
        } else {
            echo '<tr >';
        }
        $ArrivalTime=strtotime($data['DepartureTime'])+strtotime($data['Duration'])-strtotime("00:00");
        echo '<td>' . $data['id'] . '</td>';
        echo '<td>' . $data['Departure'] . '('.$data['DepartureTime'].')</td>';
        echo '<td>' . $data['Arrival'] .  '('.date("H:i",$ArrivalTime).')</td>';
        echo '<td>' . $data['Duration'] . '</td>';
        echo '<td><button class="btn btn-info" name="book" id="book'.$data['id'].'" other="'.$data['Departure'].'&'.$data['DepartureTime'].'&'.$data['Arrival'].'&'.date("H:i",$ArrivalTime).'&'.$data['Duration'].'">book</button></td>';
    }
?>
