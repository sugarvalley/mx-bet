<?php
if (isset($_POST['bet-entity-id'])) {
    $db = mysqli_connect("localhost", "root", "root");
    mysqli_select_db($db, "wprgmxbet");
    $bets = $_POST['bet-entity-id'];
    $counter = count($bets);
    $id_bet_entity = array_keys($bets);
    foreach ($id_bet_entity as $id_bet => $value) {
        $sql_add_result = "UPDATE choices SET has_won='1' WHERE choices.id_choices='" . $bets[$value] . "'";
        if ($db->query($sql_add_result) === TRUE) {
            $sql_change_status = "UPDATE bet_entity SET status='1' WHERE bet_entity.id_bet_entity='". $value ."'";
            if ($db->query($sql_change_status) === TRUE) {
                $counter--;
            }
        }
    }
    if ($counter == 0) {
        echo "<div class='alert alert-success' role='alert'><h3 class='h4 mb-3'>🎈 Pomyślnie dodano wszystkie wyniki
        </h3></div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'><h3 class='h4 mb-3'>❌ Nie udało się dodać wyników
        </h3></div>";
    }
    mysqli_close($db);
}
