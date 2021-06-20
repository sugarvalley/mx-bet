<?php
include("db-connection.php");
$sql = "SELECT name FROM bet_entity";
$result = mysqli_query($db, $sql);
$bets = [];
while ($row = mysqli_fetch_row($result)) {
    $bets[] = $row;
}
mysqli_close($db);