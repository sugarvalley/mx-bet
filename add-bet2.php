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
        include("db-connection.php");
        $sql_val = "SELECT bet_entity.category, bet_entity.sub_category, bet_entity.sub_sub_category, bet_entity.data FROM bet_entity 
            WHERE bet_entity.name = '" . $bet_name . "'";
        $result_sql_val = mysqli_query($db, $sql_val);
        $values = [];
        while ($row = mysqli_fetch_row($result_sql_val)) {
            $values[] = $row;
        }
        $sql_cat = "SELECT category.name FROM category WHERE category.id_category = '" . $values[0][0] . "'";
        $result_sql_cat = mysqli_query($db, $sql_cat);
        $cats = [];
        while ($row = mysqli_fetch_row($result_sql_cat)) {
            $cats[] = $row;
        }
        $sql_subcat = "SELECT sub_category.name FROM sub_category WHERE sub_category.id_sub_category = '" . $values[0][1] . "'";
        $result_sql_subcat = mysqli_query($db, $sql_subcat);
        $subcats = [];
        while ($row = mysqli_fetch_row($result_sql_subcat)) {
            $subcats[] = $row;
        }
        $sql_subsubcat = "SELECT sub_sub_category.name FROM sub_sub_category WHERE sub_sub_category.id_sub_sub_category = '" . $values[0][2] . "'";
        $result_sql_subsubcat = mysqli_query($db, $sql_subsubcat);
        $subsubcats = [];
        while ($row = mysqli_fetch_row($result_sql_subsubcat)) {
            $subsubcats[] = $row;
        }
        if ($cats[0][0] = $category_name && $subcats[0][0] = $region_name && $subsubcats[0][0] = $event_name
                    && $values[0][3] = $event_date) {
            echo "<div class='alert alert-danger' role='alert'><h3 class='h4 mb-3'>❌ Dokładnie takie samo 
            wydarzenie juz istnieje!</h3></div>";
        } else {
            include("add-bet3.php");
        }
    } else {
        include("add-bet3.php");
    }
}
