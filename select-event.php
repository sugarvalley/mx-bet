<?php
$db = mysqli_connect("localhost", "root", "root");
mysqli_select_db($db, "wprgmxbet");
$sql2 = "SELECT name FROM sub_sub_category";
$result2 = mysqli_query($db, $sql2);
$subsubcategories = [];
while ($row = mysqli_fetch_row($result2)) {
    $subsubcategories[] = $row;
}

mysqli_close($db);