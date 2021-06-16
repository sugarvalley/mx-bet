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
                <?php
                foreach ($coupons as $id => $coupon) {foreach ($coupon as $value) {
                    if ($value > 0) {
                        echo "<h3 class='h3 mb-3 fw-normal'>STATYSTYKI</h3>
                            <h3 class='h5 mb-3'>🎉 Obstawione kupony: " . $value . "</h3>
                            <h3 class='h5 mb-3'>🎉 Wygrane kupony: 0</h3>
                            <h3 class='h5 mb-3'>'🎉 Łącznie już wygrałeś: 0zł</h3>";
                    }
                } }
                ?>
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
        <div class="flex-shrink-0 p-3">
            <form action="coupons.php" method="POST">
            <h5 class="h2 mb-3">DOŁADUJ ŚRODKI</h5>
            <br />
            <h3 class="h4 mb-3">💰 Podaj kwotę</h3>
                <div class='input-group mb-2'>
                    <input type='number' name='money' value='50'>
                    <div class='input-group-prepend'>
                        <div class='input-group-text'>zł</div>
                    </div>
                </div>
                <br />
            <h3 class="h4 mb-3">➕ Kliknij doładuj</h3>
                <div class="input-group mb-2">
                    <button type='submit' class='btn-outline-dark btn-lg'>DOŁADUJ</button>
                </div>
                <br />
                <?php
                include("addbalance.php");
                ?>
            <h3 class="h4 mb-3"><a href="index_user.php" class="h4 mb-3">🕹 Wróć do gry!</a></h3>
            </form>
        </div>
    </main>
</main>
<?php include("footer.php"); ?>
<?php include("scripts.php"); ?>
</body>
</html>
