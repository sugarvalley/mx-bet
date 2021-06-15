<?php
if (isset($_POST['money'])) {
    $amount = $_POST['money'];
    if ($amount > 0) {
        $currentbalance = "";
        $db = mysqli_connect("localhost", "root", "root");
        mysqli_select_db($db, "wprgmxbet");
        foreach ($balances as $id => $balance) {
            foreach ($balance as $value) {
                $currentbalance = $value;
            }
        }
        $currentbalance += $amount;
        $sql = "UPDATE user SET balance = '" . $currentbalance . "' WHERE login = '" . $_SESSION['username'] . "'";
        $result_sql = mysqli_query($db, $sql);
        if ($db->query($sql) === TRUE) {
            echo "<h3 class='h4 mb-3'>🎈 Pomyślnie dodano środki!</h3>";
        } else {
            echo "<h3 class='h4 mb-3'>❌ Nie udało się dodać środków</h3>";
        }
        mysqli_close($db);
    } else {
        echo "<h3 class='h4 mb-3'>❌ Nie możesz dodać ujemnych środków!</h3>";
        echo "<h3 class='h5 mb-3'>📌 Wprowadź kwotę > 0</h3>";
        echo "<br />";
    }
}
