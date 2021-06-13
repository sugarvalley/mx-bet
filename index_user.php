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

    <!-- FOOTER -->
    <div class="card-footer text-center" id="footer-color">
        <div class="card-body">
            <p class="card-text"><small class="text-muted">• © MX BET 2021 • WSZYSTKIE PRAWA ZASTRZEŻONE •</small></p>
            <p class="card-text"><small class="text-muted"><a href="#">KIM JESTEŚMY?</a>&nbsp&nbsp&nbsp<a href="#">REGULAMIN</a>
                    &nbsp&nbsp&nbsp<a href="#">JAK GRAĆ?</a>&nbsp&nbsp&nbsp<a href="#">FAQ</a>&nbsp&nbsp&nbsp<a href="#">
                        ODPOWIEDZIALNA GRA</a>&nbsp&nbsp&nbsp<a href="#">DLA PRASY</a>&nbsp&nbsp&nbsp
                    <a href="#">POLITYKA PRYWATNOŚCI</a>&nbsp&nbsp&nbsp<a href="#">PRACA</a>&nbsp&nbsp&nbsp
                    <a href="#">OFERTA HANDLOWA</a>&nbsp&nbsp&nbsp<a href="#">WYNIKI</a></small></p>
        </div>
    </div>
    <!-- FOOTER -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>