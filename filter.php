<?php
$db = mysqli_connect("localhost", "root", "root");
mysqli_select_db($db, "wprgmxbet");
$choices = $_GET['choice'];
$dumbo = [];
foreach ($choices as $choice => $value) {
    array_push($dumbo, explode("_", $value));
}
foreach ($dumbo as $dumbie => $dummo) {
    $sql = "SELECT bet_entity.name, bet_entity.data FROM bet_entity LEFT JOIN category ON bet_entity.category = category.id_category 
    LEFT JOIN sub_category ON bet_entity.sub_category = sub_category.id_sub_category LEFT JOIN sub_sub_category ON
    bet_entity.sub_sub_category = sub_sub_category.id_sub_sub_category WHERE category.name LIKE '" . $dummo[0] .
        "' AND sub_category.name LIKE '" . $dummo[1] . "' AND sub_sub_category.name LIKE '" . $dummo[2] . "'";
    $result = mysqli_query($db, $sql);
    $dummies = [];
    while ($row = mysqli_fetch_row($result)) {
        $dummies[] = $row;
    }
    echo "<div class='card-body'>";
    echo "<p class='card-text h3'>" . $dummo[0] . ", " . $dummo[1] . "</p>";
    foreach ($dummies as $dummy) {
        echo "<p class='card-text h4'>🌟 " . $dummo[2] . "</p>";
        echo "<p class='card-text h5'>";
        foreach ($dummy as $value) {
            echo " 〰 " . $value;

        }
        echo "</p>";
        echo "<br />";
    }
    echo "</div>";
}