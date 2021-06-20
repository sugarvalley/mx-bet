<?php
include("db-connection.php");
$sql2 = "SELECT DISTINCT (sub_sub_category.name) FROM bet_entity LEFT JOIN sub_sub_category 
    ON bet_entity.sub_sub_category = sub_sub_category.id_sub_sub_category LEFT JOIN sub_category 
        ON bet_entity.sub_category = sub_category.id_sub_category LEFT JOIN category ON 
        bet_entity.category = category.id_category WHERE category.name LIKE '" . $columnvalue . "' AND sub_category.name LIKE '" . $labelvalue . "'";
$result2 = mysqli_query($db, $sql2);
$subsubcategories = [];
while ($row = mysqli_fetch_row($result2)) {
    $subsubcategories[] = $row;
}

mysqli_close($db);