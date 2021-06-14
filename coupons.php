<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "Najpierw musisz się zalogować!";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}

if (isset($_GET['choice'])) {
    $choices = [];
    $choices[] = $_GET['choice'];
}

if (isset($_GET['coupon'])) {
    $bets = [];
    $bets[] = $_GET['coupon'];
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <?php include("meta-head.php"); ?>
</head>
<body>
<?php include("navbar-logged.php"); ?>
<main class="main-content">
    <main class="main-filter">
        <div class="flex-shrink-0 p-3" style="width: 400px;" id="list-colors">
            <div class="flex-shrink-0 p-3">
                <h3 class="h3 mb-3 fw-normal">TWOJE KONTO</h3>
                <?php include("account.php"); ?>
                <br />
                <br />
                <br />
                <br />
                <h3 class="h3 mb-3 fw-normal">STATYSTYKI</h3>
                <h3 class="h5 mb-3">🎉 Obstawione kupony: </h3>
                <h3 class="h5 mb-3">🎉 Wygrane kupony: </h3>
                <h3 class="h5 mb-3">🎉 Łącznie już wygrałeś: </h3>
            </div>
        </div>
    </main>
    <main class="main-results">
        <div class="flex-shrink-0 p-3" style="width: 1200px;">
            <?php

            ?>
        </div>
    </main>
    <main class="main-results" style="width: 800px;">

    </main>
</main>
<?php include("footer.php"); ?>
<?php include("scripts.php"); ?>
</body>
</html>
