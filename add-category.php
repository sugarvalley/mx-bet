<h3 class="mb-3 h1">📑 DODAJ NOWĄ KATEGORIĘ</h3>
<form action="admin-panel.php" method="post">
    <label for="category-name" class="form-label h3">Nazwa</label>
    <input class="form-control" type="text" name="category-name" placeholder="Wyświetlana nazwa kategorii np. Piłka nożna" required>
    <br />
    <button type="submit" class="btn-lg" style="float: right;">DODAJ</button>
</form>
<br />
<br />
<br />
<h4 class="h3 mb-3">Kategorie istniejące już w bazie danych</h4>
<table class="table">
    <tbody>
    <?php include("select-category.php");
    foreach ($categories as $category) {
        foreach ($category as $item) {
            echo"<tr><th scope='row'>" . $item . "</th></tr>";
        }
    }
    ?>
    </tbody>
</table>
