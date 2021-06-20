<?php
if (isset($_POST['choice-name1']) && isset($_POST['choice-name2'])
    && isset($_POST['odd1']) && isset($_POST['odd2'])) {
    $db = mysqli_connect("localhost", "root", "root");
    mysqli_select_db($db, "wprgmxbet");
    $id_bet_entity = $_POST['id_bet_entity'];
    $choices = [];
    $odds = [];
    $choice_name1 = $_POST['choice-name1'];
    $choices[] = $choice_name1;
    $choice_name2 = $_POST['choice-name2'];
    $choices[] = $choice_name2;
    $odd1 = $_POST['odd1'];
    $odds[] = $odd1;
    $odd2 = $_POST['odd2'];
    $odds[] = $odd2;
    if (!empty($_POST['choice-name3']) && !empty($_POST['odd3'])) {
        $choice_name3 = $_POST['choice-name3'];
        $odd3 = $_POST['odd3'];
        $choices[] = $choice_name3;
        $odds[] = $odd3;
    }
    for ($i = 0; $i < count($choices); $i++) {
        $sql = "INSERT INTO choices(`bet_entity`, `choice`, `odds`) VALUES ('" . $id_bet_entity . "', '" . $choices[$i] . "', '" .
            $odds[$i] . "')";
        if ($db->query($sql) === TRUE) {
            echo "<div class='alert alert-success' role='alert'><h3 class='h4 mb-3'>🎈 Pomyślnie dodano wybór!</h3></div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'><h3 class='h4 mb-3'>❌ Nie udało się dodać wyboru</h3></div>";
        }
    }
    mysqli_close($db);
}