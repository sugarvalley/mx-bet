<?php include('server.php'); ?>
<!doctype html>
<html lang="pl">
<head>
<?php include("meta-head.php"); ?>
</head>
<body class="text-center bg-light">
<!-- NAVBAR START-->
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
    </div>
</nav>
<!-- NAVBAR END-->
<main class="form-signin">
    <form method="post" action="register.php">
        <?php include('errors.php');?>
        <img class="mb-4" src="images/logo_mxx.png" alt="logo" width="100" height="100">
        <h1 class="h3 mb-3 fw-normal">Utwórz konto</h1>
        <h3 class="h5 mb-3">i otrzymaj 100zł na start! 💌 </h3>
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" placeholder="tenmaciek12" name="username" value="<?php echo $username; ?>">
            <label for="floatingInput">Nazwa użytkownika</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingPassword" placeholder="Maciej" name="fname">
            <label for="floatingPassword">Imię</label>
        </div>
        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="maciek69@example.com" name="email" value="<?php echo $email; ?>">
            <label for="floatingInput">Adres email</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingInput" placeholder="***** ***" name="password_1">
            <label for="floatingInput">Hasło</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingInput" placeholder="***** ***" name="password_2">
            <label for="floatingInput">Powtórz hasło</label>
        </div>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="bot-check" required> Nie jestem robotem 🤖
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit" name="reg_user">Zarejestruj</button>
        <p class="mt-4 mb-3">Masz już konto?</p>
        <a class="h5 mb-3" href="login.php">ZALOGUJ SIĘ</a>
    </form>
</main>
<!-- FOOTER -->
<?php include("footer.php"); ?>
<!-- FOOTER -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
