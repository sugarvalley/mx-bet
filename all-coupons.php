<?php
$db = mysqli_connect("localhost", "root", "root");
mysqli_select_db($db, "wprgmxbet");
$sql_select_coupons = "SELECT id_bet from bet LEFT JOIN user ON bet.user = user.id_user 
                    WHERE user.login ='" . $_SESSION['username'] . "'";
$result_select_coupons = mysqli_query($db, $sql_select_coupons);
$select_coupons = [];
while ($row = mysqli_fetch_row($result_select_coupons)) {
    $select_coupons[] = $row;
}
foreach ($select_coupons as $coupons) {
    foreach ($coupons as $couponid) {
        $sql_select_stakes = "SELECT stake from bet LEFT JOIN user ON bet.user = user.id_user 
                    WHERE user.login ='" . $_SESSION['username'] . "' AND bet.id_bet = '" . $couponid . "'";
        $result_select_stakes = mysqli_query($db, $sql_select_stakes);
        $select_stakes = [];
        while ($row = mysqli_fetch_row($result_select_stakes)) {
            $select_stakes[] = $row;
        }
        $stake = $select_stakes[0][0];
        include ("coupon-details.php");
    }
}