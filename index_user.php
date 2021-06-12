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
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="logo_mxx.png">
    <title>🏆 MX BET: Zakłady bukmacherskie</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark" id="navbar-color">
        <a class="navbar-brand" href="index.php" id="nav-brand">MX BET</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#" id="a-sport">SPORTY<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="a-live">NA ŻYWO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="a-esport">ESPORT</a>
                </li>
            </ul>
            <?php  if (isset($_SESSION['username'])) : ?>
                <button type="button" class="btn btn-outline-danger" disabled>Zalogowano jako <?php echo $_SESSION['username']; ?></button>
                <a role="button" href="index_user.php?logout='1'" class="btn btn-danger">WYLOGUJ</a>
            <?php endif ?>
        </div>
    </nav>
</body>
</html>