<?php
include("db-connection.php");

$sql = "SELECT name FROM category";
$result = mysqli_query($db, $sql);
$categories = [];
while ($row = mysqli_fetch_row($result)) {
    $categories[] = $row;
}

mysqli_close($db);

