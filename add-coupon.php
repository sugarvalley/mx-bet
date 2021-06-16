<?php
$bets = $_POST['id'];
$stake = $_POST['stake'];
if (empty($stake)) {
    echo "<h3 class='h1 mb-3'>❌ Nie udało się obstawić kuponu</h3>";
    echo "<h3 class='h3 mb-3'>Kwota zakładu nie może być pusta!</h3>";
} else if ($stake <= 0) {
    echo "<h3 class='h1 mb-3'>❌ Nie udało się obstawić kuponu</h3>";
    echo "<h3 class='h3 mb-3'>Kwota zakładu nie może być mniejsza od zera!</h3>";
} else {
    $db = mysqli_connect("localhost", "root", "root");
    mysqli_select_db($db, "wprgmxbet");
    $balance_value = "";
    $balance = "SELECT balance from user WHERE login = '" . $_SESSION['username'] . "'";
    $result_balance = mysqli_query($db, $balance);
    $balances = [];
    while ($row = mysqli_fetch_row($result_balance)) {
        $balances[] = $row;
    }
    foreach ($balances as $balance) {
        foreach ($balance as $money) {
            $balance_value = $money;

        }
    }
    if ($stake > $balance_value) {
        echo "<h3 class='h1 mb-3'>❌ Nie udało się obstawić kuponu</h3>";
        echo "<h3 class='h3 mb-3'>Nie masz wystarczającej ilości pieniędzy na koncie</h3>";
        echo "<h3 class='h3 mb-3'><a href='coupons.php'>Doładuj środki 💸</a></h3>";
    } else {
        $balance_value = $balance_value - $stake;
        $sql = "UPDATE user SET balance = '" . $balance_value . "' WHERE login = '" . $_SESSION['username'] . "'";
        $getuserid = "SELECT id_user FROM user WHERE login = '" . $_SESSION['username'] . "'";
        $result_userid = mysqli_query($db, $getuserid);
        $userid = [];
        while ($row = mysqli_fetch_row($result_userid)) {
            $userid[] = $row;
        }
        if ($db->query($sql) === TRUE) {
            $addcoupon = "INSERT INTO `bet`(`user`, `stake`) VALUES('" . $userid[0][0] . "', '" . $stake . "')";
            if ($db->query($addcoupon) === TRUE) {
                $couponid = mysqli_insert_id($db);
                foreach ($bets as $bet => $odds) {
                    $addbet = "INSERT INTO `users_choice`(`choices`, `bet`) VALUES('" . $odds . "', '" . $couponid . "')";
                    $addbet_result = mysqli_query($db, $addbet);
                    if ($addbet_result == FALSE) {
                        echo "<h3 class='h1 mb-3'>❌ Nie udało się dodać zakładu</h3>";
                        break;
                    }
                }
                echo "<h3 class='h1 mb-3'>🎈 Pomyślnie obstawiono kupon!</h3>";
                echo "<h3 class='h3 mb-3'>Szczegóły twojego kuponu:</h3>";
                include("coupon-details.php");

            } else {
                echo "<h3 class='h1 mb-3'>❌ Nie udało się dodać kuponu</h3>";
            }
        } else {
            echo "<h3 class='h1 mb-3'>❌ Nie udało się obstawić kuponu</h3>";
            echo "<h3 class='h3 mb-3'>Coś poszło nie tak...</h3>";
        }
    }
    mysqli_close($db);
}