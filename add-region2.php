<?php
if (isset($_POST['region-name'])) {
    $region_name = $_POST['region-name'];
    include("select-region.php");
    $counter = count($subcategories);
    foreach ($subcategories as $subcategory) {
        foreach ($subcategory as $value) {
            if ($value != $region_name) {
                $counter--;
            }
        }
    }
    if ($counter == 0) {
        $db = mysqli_connect("localhost", "root", "root");
        mysqli_select_db($db, "wprgmxbet");
        $sql = "INSERT INTO sub_category(name) VALUES ('". $region_name . "')";
        if ($db->query($sql) === TRUE) {
            echo "<div class='alert alert-success' role='alert'><h3 class='h4 mb-3'>🎈 Pomyślnie dodano region!</h3></div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'><h3 class='h4 mb-3'>❌ Nie udało się dodać regionu</h3></div>";
        }
        mysqli_close($db);
    } else {
        echo "<div class='alert alert-danger' role='alert'><h3 class='h4 mb-3'>❌ Podany region już istnieje!</h3></div>";
    }

}