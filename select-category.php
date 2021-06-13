<?php
$db = mysqli_connect("localhost", "root", "root");
mysqli_select_db($db, "wprgmxbet");

$sql = "SELECT name FROM category";
$result = mysqli_query($db, $sql);
$categories = [];
while ($row = mysqli_fetch_row($result)) {
    $categories[] = $row;
}

