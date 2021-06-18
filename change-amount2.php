<?php
if (isset($_POST['user']) && isset($_POST['money'])) {
    $db = mysqli_connect("localhost", "root", "root");
    mysqli_select_db($db, "wprgmxbet");
    $sql = "SELECT DISTINCT(login) FROM user ORDER BY login";
    $sql_result = mysqli_query($db, $sql);
    $usernames = [];
    while ($row = mysqli_fetch_row($sql_result)) {
        $usernames[] = $row;
    }
    $counter = count($usernames);
    foreach ($usernames as $username) {
        foreach ($username as $user) {
            if ($user == $_POST['user']) {
                if ($_POST['money'] >= 0) {
                    $sql_balance = "UPDATE user SET balance = '" . $_POST['money'] . "' WHERE login = '" . $_POST['user'] . "'";
                    if ($db->query($sql_balance) === TRUE) {
                        echo "<div class='alert alert-success' role='alert'><h3 class='h4 mb-3'>🎈 Pomyślnie zmieniono balans!</h3></div>";
                    } else {
                        echo "<div class='alert alert-danger' role='alert'><h3 class='h4 mb-3'>❌ Nie udało się zmienić balansu</h3></div>";
                    }
                } else {
                    echo "<div class='alert alert-danger' role='alert'><h3 class='mb-3 h3'>❌ Nie można wprowadzić ujemnego balansu</h3></div>";
                }
            } else {
                $counter--;
            }
        }
    }
    if ($counter == 0) {
        echo "<div class='alert alert-danger' role='alert'><h3 class='mb-3 h3'>❌ Taka nazwa użytkownika nie istnieje</h3></div>";
    }
    mysqli_close($db);
}