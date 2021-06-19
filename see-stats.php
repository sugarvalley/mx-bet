<?php
$db = mysqli_connect("localhost", "root", "root");
mysqli_select_db($db, "wprgmxbet");
$sql_allcoupons = "SELECT COUNT(id_bet) FROM bet";
$result_allcoupons = mysqli_query($db, $sql_allcoupons);
$allcoupons = [];
while ($row = mysqli_fetch_row($result_allcoupons)) {
    $allcoupons[] = $row;
}

$sql_finishedcoupons = "SELECT COUNT(id_bet) FROM bet WHERE bet.status ='1'";
$result_finishedcoupons = mysqli_query($db, $sql_finishedcoupons);
$finishedcoupons = [];
while ($row = mysqli_fetch_row($result_finishedcoupons)) {
    $finishedcoupons[] = $row;
}

$sql_notfinishedcoupons = "SELECT COUNT(id_bet) FROM bet WHERE bet.status ='0'";
$result_notfinishedcoupons = mysqli_query($db, $sql_notfinishedcoupons);
$notfinishedcoupons = [];
while ($row = mysqli_fetch_row($result_notfinishedcoupons)) {
    $notfinishedcoupons[] = $row;
}

$sql_money = "SELECT SUM(stake) FROM bet";
$result_money = mysqli_query($db, $sql_money);
$money = [];
while ($row = mysqli_fetch_row($result_money)) {
    $money[] = $row;
}

$sql_admin = "SELECT balance FROM user WHERE user.login ='admin'";
$result_admin = mysqli_query($db, $sql_admin);
$admin = [];
while ($row = mysqli_fetch_row($result_admin)) {
    $admin[] = $row;
}

$reader = file_get_contents('highest-win.txt');
$reader = explode("\n", $reader);
?>
<h3 class="mb-3 h1">STATYSTYKI</h3>
<h3 class="mb-3 h3">WSZYSTKICH OBSTAWIONYCH KUPONÓW</h3>
<h3 class="mb-3 h4"><?php echo $allcoupons[0][0]; ?></h3>
<br />
<h3 class="mb-3 h3">KUPONY ZAKOŃCZONE</h3>
<h3 class="mb-3 h4"><?php echo $finishedcoupons[0][0]; ?></h3>
<br />
<h3 class="mb-3 h3">KUPONY TRWAJĄCE</h3>
<h3 class="mb-3 h4"><?php echo $notfinishedcoupons[0][0]; ?></h3>
<br />
<h3 class="mb-3 h3">PIENIĄDZE ZAINWESTOWANE PRZEZ UŻYTKOWNIKÓW</h3>
<h3 class="mb-3 h4"><?php echo $money[0][0]; ?>zł</h3>
<br />
<h3 class="mb-3 h3">NAJWIĘKSZA WYGRANA</h3>
<h3 class="mb-3 h4"><?php echo $reader[0] . " " . $reader[1];?>zł</h3>
<br />
<h3 class="mb-3 h3">PIENIĄDZE ZYSKANE, DZIĘKI PRZEGRANYM</h3>
<h3 class="mb-3 h4"><?php echo $admin[0][0]; ?>zł</h3>
<br />