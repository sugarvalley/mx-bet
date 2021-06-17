<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "Najpierw musisz się zalogować!";
    header('location: login.php');
}
if ($_SESSION['username'] != 'admin') {
    header("location: index_user.php");
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
    <?php include("meta-head.php");?>
</head>
<body>
<?php include("navbar-logged.php"); ?>
<main class="main-content">
    <main class="main-filter">
        <div class="flex-shrink-0 p-3" style="width: 350px;" id="list-colors">
            <form method="post" action="admin-panel.php">
                <ul class="list-unstyled ps-0">
                    <li class="mb-1">
                        <h3 class="h2 mb-3">ADMIN PANEL 🧰</h3>
                    </li>
                    <li class="mb-1">
                        <button type="submit" value="1" name="event" class="btn-lg btn-toggle" style="color: #14213d;">💳 Zmień stan konta</button>
                    </li>
                    <li class="mb-1">
                        <button type="submit" value="2" name="event" class="btn-lg btn-toggle" style="color: #14213d;">🎪 Stwórz nowe wydarzenie</button>
                    </li>
                    <li class="mb-1">
                        <button type="submit" value="3" name="event" class="btn-lg btn-toggle" style="color: #14213d;">🔮 Dodaj wynik zakładu</button>
                    </li>
                    <li class="mb-1">
                        <button type="submit" value="4" name="event" class="btn-lg btn-toggle" style="color: #14213d;">📈 Zobacz statystyki</button>
                    </li>
                </ul>
            </form>
        </div>
    </main>
    <main class="main-results">
        <div class="flex-shrink-0 p-3">
            <?php
            if(!isset($_POST['event'])) {
               echo "<h3 class='mb-3 h1 fw-normal'>🎈 Miło Cię widzieć, " . $_SESSION['username'] . "!</h3>
               <h3 class='mb-3 h3 fw-normal'>⬅ Wybierz z listy, co chciałbyś zrobić</h3>";
            } else {
              include("switch-events.php");
            }
            ?>
        </div>
    </main>
    <main class="main-results" style="width: 800px;">
        <div class="flex-shrink-0 p-3">

        </div>
    </main>
</main>
<?php include("footer.php"); ?>
<?php include("scripts.php"); ?>
</body>
</html>
