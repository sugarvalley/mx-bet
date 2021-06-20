<?php
include("db-connection.php");
$sql1 = "SELECT name FROM sub_category";
$result1 = mysqli_query($db, $sql1);
$subcategories = [];
while ($row = mysqli_fetch_row($result1)) {
    $subcategories[] = $row;
}

mysqli_close($db);