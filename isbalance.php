<?php
$bets = $_POST['id'];
$stake = $_POST['stake'];
var_dump($bets);
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
    foreach ($balances as $id => $balance) { foreach ($balance as $value) {
        $balance_value = $value;
    } }
    if ($stake > $balance_value) {
        echo "<h3 class='h1 mb-3'>❌ Nie udało się obstawić kuponu</h3>";
        echo "<h3 class='h3 mb-3'>Nie masz wystarczającej ilości pieniędzy na koncie</h3>";
        echo "<h3 class='h3 mb-3'><a href='coupons.php'>Doładuj środki 💸</a></h3>";
    } else {
        $balance_value = $balance_value - $stake;
        $sql = "UPDATE user SET balance = '" . $balance_value . "' WHERE login = '" . $_SESSION['username'] . "'";
        $result_sql = mysqli_query($db, $sql);
        if ($db->query($sql) === TRUE) {
            echo "<h3 class='h1 mb-3'>🎈 Pomyślnie obstawiono kupon!</h3>";
            echo "<h3 class='h3 mb-3'>Szczegółowy opis kuponu:</h3>";
        } else {
            echo "<h3 class='h1 mb-3'>❌ Nie udało się obstawić kuponu</h3>";
            echo "<h3 class='h3 mb-3'>Coś poszło nie tak...</h3>";
        }
    }
    mysqli_close($db);
}