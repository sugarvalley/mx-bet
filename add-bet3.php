<?php
include("db-connection.php");
$sql_category = "SELECT id_category FROM category WHERE category.name = '" . $category_name . "'";
$result_category = mysqli_query($db, $sql_category);
$id_categories = [];
while ($row = mysqli_fetch_row($result_category)) {
    $id_categories[] = $row;
}
$sql_region = "SELECT id_sub_category FROM sub_category WHERE sub_category.name = '" . $region_name . "'";
$result_region = mysqli_query($db, $sql_region);
$id_regions = [];
while ($row = mysqli_fetch_row($result_region)) {
    $id_regions[] = $row;
}
$sql_event = "SELECT id_sub_sub_category FROM sub_sub_category WHERE sub_sub_category.name = '" . $event_name . "'";
$result_event = mysqli_query($db, $sql_event);
$id_events = [];
while ($row = mysqli_fetch_row($result_event)) {
    $id_events[] = $row;
}
$sql_bet = "INSERT INTO bet_entity(name, category, sub_category, sub_sub_category, data) VALUES('"
    . $bet_name ."', '". $id_categories[0][0] ."', '". $id_regions[0][0] ."', '". $id_events[0][0] ."', '".
    $event_date ."')";
if ($db->query($sql_bet) === TRUE) {
    $id_bet_entity = mysqli_insert_id($db);
    echo "<div class='alert alert-success' role='alert'><h3 class='h4 mb-3'>🎈 Pomyślnie dodano zakład!</h3></div>";
    include("add-bet4.php");
} else {
    echo "<div class='alert alert-danger' role='alert'><h3 class='h4 mb-3'>❌ Nie udało się dodać zakładu</h3></div>";
}
mysqli_close($db);
