<?php
$db = mysqli_connect("localhost", "root", "root");
mysqli_select_db($db, "wprgmxbet");
$sql = "SELECT bet_entity.name, bet_entity.data FROM bet_entity LEFT JOIN category ON bet_entity.category = category.id_category 
    LEFT JOIN sub_category ON bet_entity.sub_category = sub_category.id_sub_category LEFT JOIN sub_sub_category ON
    bet_entity.sub_sub_category = sub_sub_category.id_sub_sub_category WHERE category.name LIKE 'Piłka nożna' 
    AND sub_category.name LIKE 'Europa' AND sub_sub_category.name LIKE 'EURO 2020' AND bet_entity.data >= '". date('Y/m/d H:i:s') ."'";
$result = mysqli_query($db, $sql);
$dummies = [];
while ($row = mysqli_fetch_row($result)) {
    $dummies[] = $row;
}
