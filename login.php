<?php include('server.php'); ?>
<!doctype html>
<html lang="pl">
<head>
    <?php include("view-resources/meta-head.php");?>
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
    <form method="post" action="login.php">
        <?php include('errors.php'); ?>
        <?php if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        <img class="mb-4" src="images/logo_mxx.png" alt="logo" width="100" height="100">
        <h1 class="h3 mb-3 fw-normal">Zaloguj się</h1>
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" placeholder="Login" name="username">
            <label for="floatingInput">Nazwa użytkownika</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Hasło" name="password">
            <label for="floatingPassword">Hasło</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit" name="login_user">Zaloguj</button>
        <p class="mt-4 mb-3">Nie masz konta?</p>
        <a class="h5 mb-3" href="register.php">ZAREJESTRUJ SIĘ</a>
        <p class="mt-5 mb-3 text-muted">&copy; MX BET 2021</p>
    </form>
</main>
<?php include("view-resources/footer.php");?>
<?php include("view-resources/scripts.php");?>
</body>
</html>
