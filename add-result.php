<h3 class="mb-3 h1">🎆 DODAJ WYNIK ZAKŁADU</h3>
<h3 class='mb-3 h4'>(Zaznacz zwycięzcę lub remis  🥇)</h3>
<?php
$db = mysqli_connect("localhost", "root", "root");
mysqli_select_db($db, "wprgmxbet");
$sql_old_bets = "SELECT DISTINCT bet_entity.id_bet_entity, bet_entity.name, bet_entity.data FROM bet_entity LEFT JOIN
    choices ON choices.bet_entity = bet_entity.id_bet_entity WHERE bet_entity.data < '" . date('Y/m/d H:i:s') . "' AND
 bet_entity.status = '0'";
$result_old_bets = mysqli_query($db, $sql_old_bets);
$old_bets = [];
while ($row = mysqli_fetch_row($result_old_bets)) {
    $old_bets[] = $row;
}
if (empty($old_bets)) {
    echo "<div class='alert alert-success' role='alert'><h3 class='h3 mb-3'>Sukces! Nie ma żadnych zakładów
 do rozstrzygnięcia 🧹</h3></div>";
} else {
    echo "<div><h3 class='mb-3 h3'>ZAKŁADY, KTÓRE NIE ZOSTAŁY JESZCZE ROZSTRZYGNIĘTE:</h3>
    <form action='admin-panel.php' method='post'>";
    foreach ($old_bets as $old_bet => $bet) {
        echo "<table class='table'><thead class='thead-dark'><tr><th scope='col'>". $bet[1] . "</th>
                <th scope='col'>". $bet[2] ."</th><th scope='col'></th></tr></thead><tbody><tr>";
        $sql_choices = "SELECT id_choices, choice FROM choices LEFT JOIN bet_entity ON choices.bet_entity = bet_entity.id_bet_entity
                        WHERE choices.bet_entity = '" . $bet[0] . "'";
        $result_choices = mysqli_query($db, $sql_choices);
        $bet_choices = [];
        while ($row = mysqli_fetch_row($result_choices)) {
            $bet_choices[] = $row;
        }
        foreach ($bet_choices as $bet_choice => $choice) {
            echo "<th scope='row'><input type='radio' 
                        name='bet-entity-id[" . $bet[0] . "]' value='" . $choice[0]. "'>&nbsp" . $choice[1] . "</th>";
        }
        echo "</tr></tbody></table>";
    }
    echo "<button type='submit' class='btn-lg' style='float: right;'>DODAJ WYNIK</button>
</form></div>";
}
mysqli_close($db);