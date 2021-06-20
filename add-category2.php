<?php
if (isset($_POST['category-name'])) {
    $category_name = $_POST['category-name'];
    include("select-category.php");
    $counter = count($categories);
    foreach ($categories as $category) {
        foreach ($category as $value) {
            if ($value != $category_name) {
                $counter--;
            }
        }
    }
    if ($counter == 0) {
        include("db-connection.php");
        $sql = "INSERT INTO category(name) VALUES ('". $category_name . "')";
        if ($db->query($sql) === TRUE) {
            echo "<div class='alert alert-success' role='alert'><h3 class='h4 mb-3'>🎈 Pomyślnie dodano kategorię!</h3></div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'><h3 class='h4 mb-3'>❌ Nie udało się dodać kategorii</h3></div>";
        }
        mysqli_close($db);
    } else {
        echo "<div class='alert alert-danger' role='alert'><h3 class='h4 mb-3'>❌ Podana kategoria już istnieje!</h3></div>";
    }
}
