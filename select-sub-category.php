<?php
$db = mysqli_connect("localhost", "root", "root");
mysqli_select_db($db, "wprgmxbet");
$sql1 = "SELECT DISTINCT (sub_category.name) FROM bet_entity LEFT JOIN sub_category ON 
    bet_entity.sub_category = sub_category.id_sub_category LEFT JOIN category ON 
        bet_entity.category = category.id_category WHERE category.name LIKE '" . $columnvalue . "' AND bet_entity.data >= '". date('Y/m/d H:i:s') ."'";
$result1 = mysqli_query($db, $sql1);
$subcategories = [];
while ($row = mysqli_fetch_row($result1)) {
    $subcategories[] = $row;
}

mysqli_close($db);