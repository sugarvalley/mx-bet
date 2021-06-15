<?php
$db = mysqli_connect("localhost", "root", "root");
mysqli_select_db($db, "wprgmxbet");
$name = "SELECT name from user WHERE login = '" . $_SESSION['username'] . "'";
$email = "SELECT email from user WHERE login = '" . $_SESSION['username'] . "'";
$balance = "SELECT balance from user WHERE login = '" . $_SESSION['username'] . "'";
$coupon = "SELECT COUNT(user) FROM bet LEFT JOIN user on user.id_user = bet.user WHERE
            user.name = '" . $_SESSION['username'] . "'";
$result_name = mysqli_query($db, $name);
$result_email = mysqli_query($db, $email);
$result_balance = mysqli_query($db, $balance);
$result_coupons = mysqli_query($db, $coupon);
$names = [];
$emails = [];
$balances = [];
$coupons = [];
while ($row = mysqli_fetch_row($result_name)) {
    $names[] = $row;
}
while ($row = mysqli_fetch_row($result_email)) {
    $emails[] = $row;
}
while ($row = mysqli_fetch_row($result_balance)) {
    $balances[] = $row;
}
while ($row = mysqli_fetch_row($result_coupons)) {
    $coupons[] = $row;
}
echo "<h3 class='h4 mb-3'>🎊 Imię: "; foreach ($names as $id => $name) { foreach ($name as $value) {
    echo $value;
} }
    echo "</h3>
       <h3 class='h4 mb-3'>📨 Email: "; foreach ($emails as $id => $email) { foreach ($email as $value) {
    echo $value;
} }
echo "</h3>
        <h3 class='h4 mb-3'>💰 Stan konta: "; foreach ($balances as $id => $balance) { foreach ($balance as $value) {
    echo $value;
} }
echo "zł</h3>";
foreach ($coupons as $id => $coupon) {foreach ($coupon as $value) {
   if ($value > 0) {
       echo "<h3 class='h4 mb-3'>🏷 Ilość kuponów: " . $value . "</h3><a href='coupons.php' class='h5 mb-3'>Zobacz swoje kupony</a>";
   }
} }
echo "<h3 class='h4 mb-3'><a href='coupons.php' class='h5 mb-3'>Doładuj środki</a></h3>";
mysqli_close($db);