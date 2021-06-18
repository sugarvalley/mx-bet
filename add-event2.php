<?php
if (isset($_POST['event-name'])) {
    $event = $_POST['event-name'];
    include("select-event.php");
    $counter = count($subsubcategories);
    foreach ($subsubcategories as $subsubcategory) {
        foreach ($subsubcategory as $value) {
            if ($value != $event) {
                $counter--;
            }
        }
    }
    if ($counter == 0) {
        $db = mysqli_connect("localhost", "root", "root");
        mysqli_select_db($db, "wprgmxbet");
        $sql = "INSERT INTO sub_sub_category(name) VALUES ('". $event . "')";
        if ($db->query($sql) === TRUE) {
            echo "<div class='alert alert-success' role='alert'><h3 class='h4 mb-3'>🎈 Pomyślnie dodano wydarzenie!</h3></div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'><h3 class='h4 mb-3'>❌ Nie udało się dodać wydarzenia</h3></div>";
        }
        mysqli_close($db);
    } else {
        echo "<div class='alert alert-danger' role='alert'><h3 class='h4 mb-3'>❌ Podane wydarzenie już istnieje!</h3></div>";
    }
}
