<?php
if (isset($_POST['id']) && isset($_POST['stake'])) {
    $stake = $_POST['stake'];
    if ($stake >= 0) {
        echo "<h3 class='h1 mb-3'>❌ Nie udało się obstawić kuponu</h3>";
        echo "<h3 class='h3 mb-3'>Nie możesz postawić mniej niż 1zł!</h3>";
    } else {
        $bets = $_POST['id'];
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
}

