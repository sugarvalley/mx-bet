<?php
if (isset($_POST['money'])) {
    $amount = $_POST['money'];
    if ($amount >= 0) {
        $currentbalance = "";
        include("db-connection.php");
        foreach ($balances as $id => $balance) {
            foreach ($balance as $value) {
                $currentbalance = $value;
            }
        }
        if ($currentbalance < 500) {
            $currentbalance += $amount;
            $sql = "UPDATE user SET balance = '" . $currentbalance . "' WHERE login = '" . $_SESSION['username'] . "'";
            if ($db->query($sql) === TRUE) {
                echo "<div class='alert alert-success' role='alert'><h3 class='h4 mb-3'>🎈 Pomyślnie dodano środki!</h3></div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'><h3 class='h4 mb-3'>❌ Nie udało się dodać środków</h3></div>";
            }
        } else {
            echo "<div class='alert alert-danger' role='alert'><h3 class='h4 mb-3'>❌ Nie możesz już dodać więcej środków!</h3></div>";
        }
        mysqli_close($db);
    } else {
        echo "<div class='alert alert-danger' role='alert'><h3 class='h4 mb-3'>❌ Nie możesz dodać ujemnych środków!</h3>";
        echo "<h3 class='h5 mb-3'>📌 Wprowadź kwotę > 0</h3></div>";
        echo "<br />";
    }
}
