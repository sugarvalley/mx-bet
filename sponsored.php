<?php
include("db-connection.php");
$sql = "SELECT bet_entity.name, bet_entity.data FROM bet_entity LEFT JOIN category ON bet_entity.category = category.id_category 
    LEFT JOIN sub_category ON bet_entity.sub_category = sub_category.id_sub_category LEFT JOIN sub_sub_category ON
    bet_entity.sub_sub_category = sub_sub_category.id_sub_sub_category WHERE category.name LIKE 'Piłka nożna' 
    AND sub_category.name LIKE 'Europa' AND sub_sub_category.name LIKE 'EURO 2020' AND bet_entity.data >= '". date('Y/m/d H:i:s') ."'";
$result = mysqli_query($db, $sql);
$euros = [];
while ($row = mysqli_fetch_row($result)) {
    $euros[] = $row;
}
echo "<div class='card-body'>";
echo "<p class='card-text h3'>Piłka nożna, Europa</p>";
echo "<p class='card-text h4'>🌟 EURO 2020</p>";
foreach ($euros as $euro) {
    echo "<p class='card-text h5'>";
    foreach ($euro as $value) {
        echo " 〰 " . $value;
    }
    echo "</p>";
    echo "<table class='table'>
                <thead class='thead-dark'><tr>";
    $sqlhelper = "SELECT id_bet_entity FROM bet_entity LEFT JOIN category ON bet_entity.category = category.id_category 
                LEFT JOIN sub_category ON bet_entity.sub_category = sub_category.id_sub_category LEFT JOIN sub_sub_category ON
                bet_entity.sub_sub_category = sub_sub_category.id_sub_sub_category WHERE category.name LIKE 'Piłka nożna' 
                AND sub_category.name LIKE 'Europa' AND sub_sub_category.name LIKE 'EURO 2020' AND bet_entity.name LIKE '" . $euro[0] . "'";
    $resulthelper = mysqli_query($db, $sqlhelper);
    $ids_bet_entity = [];
    while ($row = mysqli_fetch_row($resulthelper)) {
        $ids_bet_entity[] = $row;
    }
    foreach ($ids_bet_entity as $cols => $ids) {
        foreach ($ids as $values) {
            $sql3 = "SELECT choice FROM choices LEFT JOIN bet_entity ON choices.bet_entity = bet_entity.id_bet_entity
                        WHERE choices.bet_entity = '" . $values . "' AND bet_entity.name = '" . $euro[0] . "'";
            $result3 = mysqli_query($db, $sql3);
            $bet_choices = [];
            while ($row = mysqli_fetch_row($result3)) {
                $bet_choices[] = $row;
            }
            foreach ($bet_choices as $choice) {
                foreach ($choice as $value) {
                    echo "<th scope='col'>" . $value . "</th>";
                }
            }
        }
    }
    echo "</tr></thead>";
    echo "<tbody>
                <tr>";
    foreach ($ids_bet_entity as $cols => $ids) {
        foreach ($ids as $values) {
            $sql4 = "SELECT id_choices, odds FROM choices LEFT JOIN bet_entity ON choices.bet_entity = bet_entity.id_bet_entity
                        WHERE choices.bet_entity = '" . $values . "'";
            $result4 = mysqli_query($db, $sql4);
            $bet_odds = [];
            while ($row = mysqli_fetch_row($result4)) {
                $bet_odds[] = $row;
            }
            foreach ($bet_odds as $odd) {
                    echo "<th scope='row'><input type='radio' 
                        name='id[" . $values . "]' value='" . $odd[0] . "'>&nbsp" . $odd[1] . "</th>";
            }
        }
    }
    echo "</tr>
                </tbody>
                </table>";
}
echo "</div>";
echo "<div class='card-body' style='float: right;'>
      <div class='input-group mb-2'>
      <label for='stake-input' class='h3 fw-normal'>KWOTA&nbsp</label>
            <input type='number' name='stake' min='1' value='10' id='stake-input'>
        <div class='input-group-prepend'>
          <div class='input-group-text'>zł</div>
        </div>
      <button type='submit' class='btn-dark btn'>OBSTAW</button></div>";
mysqli_close($db);
