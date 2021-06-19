<?php
$db = mysqli_connect("localhost", "root", "root");
mysqli_select_db($db, "wprgmxbet");
$sql_count_coupons_finished = "SELECT COUNT(id_bet) FROM bet LEFT JOIN user ON user.id_user = bet.user 
WHERE user.login ='". $_SESSION['username'] . "' AND status = '1'";
$sql_count_coupons_not_finished = "SELECT COUNT(id_bet) FROM bet LEFT JOIN user ON user.id_user = bet.user 
WHERE user.login ='". $_SESSION['username'] . "' AND status = '0'";
$result_finished = mysqli_query($db, $sql_count_coupons_finished);
$finished = [];
while ($row = mysqli_fetch_row($result_finished)) {
    $finished = $row;
}
$result_not_finished = mysqli_query($db, $sql_count_coupons_not_finished);
$notfinished = [];
while ($row = mysqli_fetch_row($result_not_finished)) {
    $notfinished = $row;
}
mysqli_close($db);