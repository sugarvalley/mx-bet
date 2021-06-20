<?php
include("db-connection.php");
$sql_select_odds = "SELECT odds from choices LEFT JOIN users_choice ON users_choice.choices = choices.id_choices 
                WHERE users_choice.bet = '" . $couponid . "'";
$result_select_odds = mysqli_query($db, $sql_select_odds);
$select_odds = [];
while ($row = mysqli_fetch_row($result_select_odds)) {
    $select_odds[] = $row;
}
$multiplier = 1;
foreach ($select_odds as $cols) {
    foreach ($cols as $odds) {
        $multiplier = $multiplier * $odds;
    }
}
$sql_select_balance = "SELECT balance FROM user WHERE user.login ='". $_SESSION['username'] . "'";
$result_select_balance = mysqli_query($db, $sql_select_balance);
$balance = [];
while ($row = mysqli_fetch_row($result_select_balance)) {
    $balance[] = $row;
}
$userbalance = $balance[0][0];
$sql_select_admin_balance = "SELECT balance FROM user WHERE user.login ='admin'";
$result_select_admin_balance = mysqli_query($db, $sql_select_admin_balance);
$admin_balance = [];
while ($row = mysqli_fetch_row($result_select_admin_balance)) {
    $admin_balance[] = $row;
}
$adminbalance = $admin_balance[0][0];
$sql_count_bets = "SELECT COUNT(id_users_choice) FROM users_choice WHERE users_choice.bet='" . $couponid . "'";
$result_count_bets = mysqli_query($db, $sql_count_bets);
$count_bets = [];
while ($row = mysqli_fetch_row($result_count_bets)) {
    $count_bets[] = $row;
}
$prize = $stake * $multiplier;
if ($count_bets[0][0] < 4) {
    $additional_prize = 0;
} else {
    switch ($count_bets[0][0]) {
        case 4:
            $additional_prize = 7.5;
            break;
        case 5:
            $additional_prize = 10;
            break;
        case 6:
            $additional_prize = 15;
            break;
        case 7:
            $additional_prize = 20;
            break;
        default:
            $additional_prize = 25;
    }
}
$prize += (($prize * $additional_prize)/100);
$prize_format_francais = number_format($prize, 2, ',', ' ');
$sql_status = "SELECT bet.status FROM bet WHERE id_bet='" . $couponid . "'";
$result_status = mysqli_query($db, $sql_status);
$status = [];
while ($row = mysqli_fetch_row($result_status)) {
    $status[] = $row;
}
$flag = true;
$counter = $count_bets[0][0];
if ($status[0][0] == 0) {
    echo "<table class='table'>
    <thead class='thead-dark'>
    <tr>
        <th scope='col'>KUPON #" . $couponid .  "</th>
        <th scope='col'></th>
        <th scope='col'></th>
        <th scope='col'></th>
    </tr>";
    foreach ($select_odds as $odd) {
        foreach ($odd as $value) {
            $sql_select_names = "SELECT name, choices.choice, choices.has_won, bet_entity.status FROM bet_entity LEFT JOIN choices ON 
            choices.bet_entity = bet_entity.id_bet_entity LEFT JOIN users_choice ON users_choice.choices = 
            choices.id_choices WHERE choices.odds LIKE '" . $value . "' AND users_choice.bet = '" . $couponid . "'";
            $result_select_names = mysqli_query($db, $sql_select_names);
            $select_names = [];
            while ($row = mysqli_fetch_row($result_select_names)) {
                $select_names[] = $row;
            }
            echo "<tr>
                    <th scope='row'>" . $select_names[0][0] . "</th>
                    <th scope='row'>" . $select_names[0][1] . "</th>
                    <th scope='row'>" . $value . "</th>
                    <th scope='row'>";
            if ($select_names[0][3] == 0) {
                echo "🔮";
            } else {
                if ($select_names[0][2] == 0) {
                    echo "❌";
                    $flag = false;
                } else {
                    echo "✔";
                    $counter--;
                }
            }
            echo "</th>
                  </tr>";
        }
    }

    echo "<tr>
        <th scope='col'>STAWKA 💸 " . $stake . "zł</th>
        <th scope='col'>POTENCJALNA WYGRANA 💰 ". $prize_format_francais . "zł</th>
        <th scope='col'>" . round($multiplier, 2);
    if ($additional_prize != 0) {
        echo " + " . $additional_prize . "%";
    }
    echo "</th>
        <th scope='col'>";
    $userinfo = "SELECT name, email FROM user WHERE user.login='". $_SESSION['username'] . "'";
    $resultinfo = mysqli_query($db, $userinfo);
    $userinfos = [];
    while ($row = mysqli_fetch_row($resultinfo)) {
        $userinfos[] = $row;
    }
    if ($flag) {
        if ($counter == 0) {
            $sql_set_status = "UPDATE bet SET status = '1' WHERE bet.id_bet = '". $couponid . "'";
            if ($db->query($sql_set_status) === TRUE) {
                $reader = file_get_contents('highest-win.txt');
                $reader = explode("\n", $reader);
                $help = 1;
                $record = "";
                foreach ($reader as $row) {
                    if ($help = 1) {
                        $help++;
                    } else {
                        $record = $row;
                    }
                }
                if (round($prize) > $record) {
                    $txt = $_SESSION['username']."\n".$prize_format_francais;
                    file_put_contents('highest-win.txt', $txt);
                }
                $userbalance += round($prize, 2);
                $sql_add_prize = "UPDATE user SET balance = '". $userbalance ."' 
                WHERE user.login = '". $_SESSION['username'] . "'";
                if ($db->query($sql_add_prize) === TRUE) {
                    echo "🏆";
                    $to_email = $userinfos[0][0] . " <" . $userinfos[0][1] . ">";
                    $subject = "Wygrany kupon #" . $couponid . "! Gratulacje!";
                    $message = "Gratulujemy, właśnie dodaliśmy do twojego konta " . $prize_format_francais . "zł, 
                    ponieważ twój kupon o numerze " . $couponid . " został oznaczony jako wygrany!\nTwój stan konta: ". $userbalance ." zł. \nDziękujemy za 
                    korzystanie z naszej strony.\nPozdrawiamy, zespół MXBET";
                    $headers = "From: mxbet@gmail.com";
                    mail($to_email, $subject, $message, $headers);
                }
            }
        } else {
            echo "🔮";
        }
    } else {
        $sql_set_status = "UPDATE bet SET bet.status = '1' WHERE id_bet = '". $couponid . "'";
        if ($db->query($sql_set_status) === TRUE) {
            $adminbalance += $stake;
            $sql_add_admin = "UPDATE user SET balance = '". $adminbalance ."' 
                WHERE user.login = 'admin'";
            if ($db->query($sql_add_admin) === TRUE) {
                echo "❌";
                $to_email = $userinfos[0][0] . " <" . $userinfos[0][1] . ">";
                $subject = "Przegrany kupon #" . $couponid . "!";
                $message = "Przykro nam, ale właśnie oznaczyliśmy twój kupon o numerze " . $couponid . " jako przegrany.\n
                 Twój stan konta: ". $balance[0][0] ." zł. \nŻyczymy powodzenia w następnych zakładach! \nDziękujemy za korzystanie z naszej strony.\nPozdrawiamy, zespół MXBET";
                $headers = "From: mxbet@gmail.com";
                mail($to_email, $subject, $message, $headers);
            }
            }
        }
    echo "</th>
    </tr>
    </thead>
    </table>";
} else {
    echo "<table class='table'>
    <thead class='thead-dark'>
    <tr>
        <th scope='col'>KUPON #" . $couponid .  "</th>
        <th scope='col'></th>
        <th scope='col'></th>
        <th scope='col'></th>
    </tr>";
    foreach ($select_odds as $odd) {
        foreach ($odd as $value) {
            $sql_select_names = "SELECT name, choices.choice, choices.has_won, bet_entity.status FROM bet_entity LEFT JOIN choices ON 
            choices.bet_entity = bet_entity.id_bet_entity LEFT JOIN users_choice ON users_choice.choices = 
            choices.id_choices WHERE choices.odds LIKE '" . $value . "' AND users_choice.bet = '" . $couponid . "'";
            $result_select_names = mysqli_query($db, $sql_select_names);
            $select_names = [];
            while ($row = mysqli_fetch_row($result_select_names)) {
                $select_names[] = $row;
            }
            echo "<tr>
                    <th scope='row'>" . $select_names[0][0] . "</th>
                    <th scope='row'>" . $select_names[0][1] . "</th>
                    <th scope='row'>" . $value . "</th>
                    <th scope='row'>";
            if ($select_names[0][3] == 0) {
                echo "🔮";
            } else {
                if ($select_names[0][2] == 0) {
                    echo "❌";
                    $flag = false;
                } else {
                    echo "✔";
                    $counter--;
                }
            }
            echo "</th>
                  </tr>";
        }
    }

    echo "<tr>
        <th scope='col'>STAWKA 💸 " . $stake . "zł</th>";
    if ($flag) {
        if ($counter == 0) {
            echo "<th scope='col'>WYGRANA 💰 ". $prize_format_francais . "zł</th>
        <th scope='col'>" . round($multiplier, 2);
            if ($additional_prize != 0) {
                echo " + " . $additional_prize . "%";
            }
            echo "</th>
        <th scope='col'>";
        }
    } else {
        echo "<th scope='col'>PRZEGRANA</th>
        <th scope='col'></th>
        <th scope='col'>";
    }
    if ($flag) {
        if ($counter == 0) {
            echo "🏆";
        }
    } else {
        echo "❌";
    }
    echo "</th>
    </tr>
    </thead>
    </table>";
}