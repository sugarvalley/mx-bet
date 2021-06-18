<?php
if (isset($_POST['bet-name']) && isset($_POST['category']) && isset($_POST['sub-category']) && isset($_POST['sub-sub-category']) && isset($_POST['date'])) {
    $bet_name = $_POST['bet-name'];
    $category_name = $_POST['category'];
    $region_name = $_POST['sub-category'];
    $event_name = $_POST['sub-sub-category'];
    $event_date = $_POST['date'];
    include("select-bet.php");
    $counter_bet = count($bets);
    foreach ($bets as $bet) {
        foreach ($bet as $value) {
            if ($value != $bet_name) {
                $counter_bet--;
            }
        }
    }
    if ($counter_bet != 0) {
        $db = mysqli_connect("localhost", "root", "root");
        mysqli_select_db($db, "wprgmxbet");
        $sql_cat = "SELECT category.name FROM category LEFT JOIN bet_entity ON category.id_category = bet_entity.category
                   WHERE bet_entity.name = '" . $bet_name . "'";
        $result_sql_cat = mysqli_query($db, $sql_cat);
        $warnings = [];
        while ($row = mysqli_fetch_row($result_sql_cat)) {
            $warnings[] = $row;
        }
        mysqli_close($db);
        if (empty($warnings)) {
            include("add-bet3.php");
        } else {
            echo "<div class='alert alert-danger' role='alert'><h3 class='h4 mb-3'>❌ W kategorii " . $category_name .
                " istnieje już wydarzenie o takiej nazwie</h3></div>";
        }
    } else {
        include("add-bet3.php");
    }
}
