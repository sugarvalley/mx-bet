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
        <?php  if (isset($_SESSION['username'])) : ?>
            <button type="button" onclick="window.location.href='index_user.php';" class="btn btn-outline-danger">Zalogowano jako <?php echo $_SESSION['username']; ?></button>
            <a role="button" href="index_user.php?logout='1'" class="btn btn-danger">WYLOGUJ</a>
        <?php endif ?>
    </div>
</nav>
