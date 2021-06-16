<?php
session_start();

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}

?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="logo_mxx.png">
    <title>🏆 MX BET: Zakłady bukmacherskie</title>
</head>
<body>
<!-- NAVBAR START-->
<nav class="navbar navbar-expand-lg navbar-dark" id="navbar-color">
    <a class="navbar-brand" href="index.php" id="nav-brand">MX BET</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index_user.php" id="a-sport">SPORTY<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" id="a-live">NA ŻYWO</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" id="a-esport">ESPORT</a>
            </li>
        </ul>
        <?php if(!isset($_SESSION['username'])) : ?>
        <a role="button" href="login.php" class="btn btn-outline-primary" id="btn-log">LOGOWANIE</a>
        <a role="button" href="register.php" class="btn btn-info">REJESTRACJA</a>
        <?php endif ?>
        <?php  if(isset($_SESSION['username'])) : ?>
            <button type="button" onclick="window.location.href='index_user.php';" class="btn btn-outline-danger">Zalogowano jako <?php echo $_SESSION['username']; ?></button>
            <a role="button" href="index_user.php?logout='1'" class="btn btn-danger">WYLOGUJ</a>
        <?php endif ?>
    </div>
</nav>
<!-- NAVBAR END-->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="images/sport.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>EURO: ŁĄCZY NAS PASJA</h2>
                        <p>EMOCJE AŻ DO FINAŁU</p>
                        <a role="button" href="#" class="btn btn-info">Pokaż więcej</a>
                    </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/2.jpg" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>PAKIET POWITALNY 2000PLN</h2>
                        <p>ZACZNIJ JUŻ TERAZ</p>
                        <a role="button" href="#" class="btn btn-info">Pokaż więcej</a>
                    </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/esport.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>ESPORT</h2>
                        <p>DAJ SIĘ PORWAĆ</p>
                        <a role="button" href="#" class="btn btn-info">Pokaż więcej</a>
                    </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
<?php include("footer.php"); ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="function.js"></script>
</body>
</html>
