<?php
include("db-connection.php");

$sql = "SELECT id_category FROM category";
$result = mysqli_query($db, $sql);
$idcategories = [];
while ($row = mysqli_fetch_row($result)) {
    $idcategories[] = $row;
}

mysqli_close($db);