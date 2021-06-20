<?php
if (isset($_POST['bet-entity-id'])) {
    include("db-connection.php");
    $bets = $_POST['bet-entity-id'];
    $counter = count($bets);
    $id_bet_entity = array_keys($bets);
    foreach ($id_bet_entity as $id_bet => $value) {
        $sql_add_result = "UPDATE choices SET has_won='1' WHERE choices.id_choices='" . $bets[$value] . "'";
        if ($db->query($sql_add_result) === TRUE) {
            $sql_change_status = "UPDATE bet_entity SET status='1' WHERE bet_entity.id_bet_entity='". $value ."'";
            if ($db->query($sql_change_status) === TRUE) {
                $counter--;
                $sql_valid_users = "SELECT DISTINCT bet.user FROM bet LEFT JOIN user ON user.id_user = bet.user 
                LEFT JOIN users_choice ON users_choice.bet = bet.id_bet LEFT JOIN choices ON 
                    choices.id_choices = users_choice.choices LEFT JOIN bet_entity ON 
                        bet_entity.id_bet_entity = choices.bet_entity WHERE bet_entity.id_bet_entity = '". $value . "'";
                $result_valid_users = mysqli_query($db, $sql_valid_users);
                $valid_users = [];
                while ($row = mysqli_fetch_row($result_valid_users)) {
                    $valid_users[] = $row;
                }
                $sql_bet_entity_name = "SELECT name FROM bet_entity WHERE bet_entity.id_bet_entity='". $value . "'";
                $result_bet_entity_name = mysqli_query($db, $sql_bet_entity_name);
                $bet_entity_names = [];
                while ($row = mysqli_fetch_row($result_bet_entity_name)) {
                    $bet_entity_names[] = $row;
                }
                $sql_winner_bet = "SELECT choice FROM choices LEFT JOIN bet_entity ON bet_entity.id_bet_entity=
                                            choices.bet_entity WHERE choices.has_won='1' AND bet_entity.id_bet_entity='". $value ."'";
                $result_winner_bet = mysqli_query($db, $sql_winner_bet);
                $winners_bet = [];
                while ($row = mysqli_fetch_row($result_winner_bet)) {
                    $winners_bet[] = $row;
                }
                foreach ($valid_users as $valid_user) {
                    foreach ($valid_user as $user) {
                        $userinfo = "SELECT name, email FROM user WHERE user.id_user='". $user . "'";
                        $resultinfo = mysqli_query($db, $userinfo);
                        $userinfos = [];
                        while ($row = mysqli_fetch_row($resultinfo)) {
                            $userinfos[] = $row;
                        }
                        $to_email = $userinfos[0][0] . " <" . $userinfos[0][1] . ">";
                        $subject = "Nowy wynik zakładu #" . $value . "!";
                        $message = "Właśnie dodaliśmy nowy wynik zakładu i myślimy, że może to cię interesować!\n
                        ". $bet_entity_names[0][0] ." - WYNIK/WYGRANY: ". $winners_bet[0][0] ."\n\nDziękujemy za korzystanie z naszej strony.
                        \nPozdrawiamy, zespół MXBET";
                        $headers = "From: mxbet@gmail.com";
                        mail($to_email, $subject, $message, $headers);
                    }
                }
            }
        }
    }
    if ($counter == 0) {
        echo "<div class='alert alert-success' role='alert'><h3 class='h4 mb-3'>🎈 Pomyślnie dodano wszystkie wyniki
        </h3></div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'><h3 class='h4 mb-3'>❌ Nie udało się dodać wyników
        </h3></div>";
    }
    mysqli_close($db);
}
