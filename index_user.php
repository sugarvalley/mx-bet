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

if (isset($_GET['id'])) {
    $bets = [];
    $bets[] = $_GET['id'];
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
    <div class="flex-shrink-0 p-3" style="width: 400px;" id="list-colors">
        <form action="index_user.php" method="get">
        <ul class="list-unstyled ps-0">
            <li class="mb-1">
                <h3 class="h3 mb-3">AKTUALNE ZAKŁADY ✨</h3>
            </li>
            <?php include("select-category.php"); ?>
            <?php foreach ($categories as $category) : ?>
            <?php foreach ($category as $columnvalue) : ?>
            <li class="mb-1">
                <a class="btn btn-toggle align-items-center rounded collapsed" data-toggle="collapse" data-target="<?php echo "#" . $columnvalue . "-collapse"; ?>" aria-expanded="false" aria-controls="<?php echo $columnvalue . "-collapse"; ?>">
                    <?php echo $columnvalue; ?>
                </a>
                <div class="collapse" id="<?php echo $columnvalue . "-collapse"; ?>">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <?php include("select-sub-category.php")?>
                        <?php foreach ($subcategories as $subcategory) : ?>
                        <?php foreach ($subcategory as $labelvalue) : ?>
                            <a class="btn-sm btn-sub-toggle align-items-center rounded collapsed" data-toggle="collapse" data-target="<?php echo "#" . $columnvalue . '-' . $labelvalue . "-collapse"; ?>" aria-expanded="false" aria-controls="<?php echo $labelvalue . "-collapse"; ?>" style="color: #474747">
                            <?php echo $labelvalue; ?>
                            </a>
                                <div class="collapse" id="<?php echo $columnvalue . '-' . $labelvalue . "-collapse"; ?>">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                                        <?php include("select-sub-sub-category.php"); ?>
                                                <div class="checkbox mb-3" id="values-list">
                                                        <?php foreach ($subsubcategories as $subsubcategory) : ?>
                                                        <?php foreach ($subsubcategory as $value) : ?>
                                                            <li>
                                                                <input type="checkbox" name="choice[]" value="<?php echo $columnvalue . '_' . $labelvalue . '_' . $value; ?>"><?php echo " " . $value; ?>
                                                            </li>
                                                            <?php endforeach; ?>
                                                            <?php endforeach; ?>
                                                </div>
                                    </ul>
                            </div>
                        <?php endforeach; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </li>
            <?php endforeach; ?>
            <?php endforeach; ?>
            </ul>
            <button type="submit" class="btn-dark btn-sm">POKAŻ</button>
            </form>
        </div>
        </main>
            <main class="main-results">
        <div class="flex-shrink-0 p-3" style="width: 1200px;">
            <?php
            if (isset($_GET['choice'])) {
                echo "<form action='index_user.php' method='get'>
                <div class='align-items-center'>";
                include("filter.php");
                echo "</div></form>";
            } else { if (isset($_GET['id'])) {
                include_once("isbalance.php");
            } else {
                echo "<h3 class='h1 mb-3'>🥇 POLECANE</h3>";
                echo "<form action='index_user.php' method='get'>
                <div class='align-items-center'>";
                include("sponsored.php");
                echo "</div></form>";
            }
            }
            ?>
        </div>
            </main>
    <main class="main-results" style="width: 800px;">
        <div class="flex-shrink-0 p-3">
            <h3 class="h4 mb-3">✔ Wybierz rodzaj zakładu</h3>
            <h3 class="h4 mb-3">✔ Ustal stawkę</h3>
            <h3 class="h4 mb-3">✔ Obstaw kupon</h3>
            <h3 class="h4 mb-3">✔ Wygrywaj!</h3>
            <br />
            <br />
            <h3 class="h3 mb-3 fw-normal">MULTIKOZAK</h3>
            <h3 class="h4 mb-3">💥 4 zakłady na kuponie = dodatkowe 7.5% do wygranej kwoty!</h3>
            <h3 class="h4 mb-3">💥 5 zakładów = dodatkowe 10%</h3>
            <h3 class="h4 mb-3">💥 6 zakładów = dodatkowe 15%</h3>
            <h3 class="h4 mb-3">💥 7 zakładów = dodatkowe 20%</h3>
            <h3 class="h4 mb-3">💥 8 i więcej zakładów = dodatkowe 25%</h3>
            <br />
            <br />
            <h3 class="h3 mb-3 fw-normal">TWOJE KONTO</h3>
            <?php include("account.php") ?>
        </div>
    </main>
    </main>
    <?php include("footer.php"); ?>
    <?php include("scripts.php"); ?>
</body>
</html>