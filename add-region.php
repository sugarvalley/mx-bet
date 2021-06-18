<h3 class="mb-3 h1">🗺 DODAJ NOWY REGION</h3>
<form action="admin-panel.php" method="post">
    <label for="region-name" class="form-label h3">Nazwa</label>
    <input class="form-control" type="text" name="region-name" placeholder="Wyświetlana nazwa regionu np. Europa" required>
    <br />
    <button type="submit" class="btn-lg" style="float: right;">DODAJ</button>
</form>
<br />
<br />
<br />
<h4 class="h3 mb-3">Regiony istniejące już w bazie danych</h4>
<table class="table">
    <tbody>
    <?php include("select-region.php");
    foreach ($subcategories as $subcategory) {
        foreach ($subcategory as $item) {
            echo"<tr><th scope='row'>" . $item . "</th></tr>";
        }
    }
    ?>
    </tbody>
</table>
